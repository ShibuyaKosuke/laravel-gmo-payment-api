<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Config\Repository;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoApiMember;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoCreditCard;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoCvs;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoEdy;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoNetid;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoSuica;
use ShibuyaKosuke\LaravelGmoPaymentApi\Concerns\GmoWebmoney;
use ShibuyaKosuke\LaravelGmoPaymentApi\Enums\GmoApiErrType;
use ShibuyaKosuke\LaravelGmoPaymentApi\Enums\GmoApiResponseType;
use ShibuyaKosuke\LaravelGmoPaymentApi\Exceptions\GmoApiException;

/**
 * Class GmoPaymentApi
 * @package ShibuyaKosuke\LaravelGmoPaymentApi
 */
class GmoPaymentApi
{
    use GmoApiMember;
    use GmoCreditCard;
    use GmoCvs;
    use GmoSuica;
    use GmoEdy;
    use GmoNetid;
    use GmoWebmoney;

    /**
     * @var array|mixed
     */
    protected int $access_type;

    /**
     * Timeout seconds
     */
    protected int $timeout = 10;

    /**
     * @var Http
     */
    protected Http $http;

    /**
     * @var string Base URL
     */
    protected string $baseUrl;

    /**
     * @var string SiteID
     */
    protected string $site_id;

    /**
     * @var string SitePass
     */
    protected string $site_password;

    /**
     * @var string ShopID
     */
    protected string $shop_id;

    /**
     * @var string ShopPass
     */
    protected string $shop_password;

    /**
     * @var array|mixed
     */
    protected bool $exception_mode;

    /**
     * @var array|null
     */
    protected ?array $errors;

    /**
     * GmoPaymentApi constructor.
     *
     * @param Repository $config
     * @param Http $http
     */
    public function __construct(Repository $config, Http $http)
    {
        $this->http = $http;

        $this->errors = null;

        $this->timeout = $config->get('gmo_api.timeout', 10);

        $this->access_type = $config->get('gmo_api.access_type', 1);

        // exception_mode
        $this->exception_mode = $config->get('gmo_api.exception_mode', true);

        $this->baseUrl = $config->get('gmo_api.base_url', '');
        $this->site_id = $config->get('gmo_api.gmo_site_id', '');
        $this->site_password = $config->get('gmo_api.gmo_site_password', '');
        $this->shop_id = $config->get('gmo_api.gmo_shop_id', '');
        $this->shop_password = $config->get('gmo_api.gmo_shop_password', '');
    }

    /**
     * @param array|null $fake
     * @return $this
     * @throws GmoApiException
     */
    public function setFake(array $fake = null): GmoPaymentApi
    {
        if (is_null($fake)) {
            return $this;
        }

        foreach ($fake as $response) {
            if ($response instanceof PromiseInterface === false) {
                throw new GmoApiException('パラメータに誤りがあります。');
            }
        }

        $this->http::fake($fake);
        return $this;
    }

    /**
     * Show settings
     * @return array
     */
    public function showParams(): array
    {
        return [
            'baseUrl' => $this->baseUrl,
            'access_type' => $this->access_type,
            'site_id' => $this->site_id,
            'site_password' => $this->site_password,
            'shop_id' => $this->shop_id,
            'shop_password' => $this->shop_password,
        ];
    }

    /**
     * Check parameters
     *
     * @param array $fillable
     * @param array $data
     * @return array
     * @throws GmoApiException
     */
    protected function checkParams(array $fillable, array $data): array
    {
        foreach (array_keys($data) as $key) {
            if (!in_array($key, $fillable, true)) {
                throw new GmoApiException(sprintf('不明なパラメータ[:%s]が設定されました', $key));
            }
        }

        if (Arr::has($fillable, 'SiteID')) {
            $data['SiteID'] = $this->site_id;
        }
        if (Arr::has($fillable, 'SitePass')) {
            $data['SitePass'] = $this->site_password;
        }
        if (Arr::has($fillable, 'ShopID')) {
            $data['ShopID'] = $this->shop_id;
        }
        if (Arr::has($fillable, 'ShopPass')) {
            $data['ShopPass'] = $this->shop_password;
        }

        return $data;
    }

    /**
     * Http request method post
     *
     * @param string $endpoint
     * @param array $data
     * @return array|mixed|void
     * @throws GmoApiException
     */
    protected function postHttp(string $endpoint, array $data = [])
    {
        $url = $this->makeUrl($endpoint);

        /** @var Response $response */
        $response = $this->http::timeout($this->timeout)
            ->asForm()
            ->post($url, $data);

        return $this->parseResponse($response);
    }

    /**
     * Parse response body
     *
     * @param Response $response
     * @return array|mixed
     * @throws GmoApiException
     */
    protected function parseResponse(Response $response)
    {
        parse_str($response->body(), $output);

        if (!array_key_exists('ErrCode', $output)) {
            return $output;
        }

        $errCode = explode('|', $output['ErrCode']);
        $errInfo = explode('|', $output['ErrInfo']);

        $errors = [];
        foreach ($errInfo as $i => $info) {
            $errors[] = [
                'ErrCode' => $errCode[$i] ?? '',
                'ErrInfo' => $info,
                'ErrMessage' => GmoApiErrType::getErrorMessage($info)
            ];
        }
        $this->errors = $errors;

        if ($this->exception_mode) {
            throw new GmoApiException('GMO Payment API returns Errors', 400);
        }
        return $errors;
    }

    /**
     * エラーがあるかを判定
     * @return boolean
     */
    public function hasErrors(): bool
    {
        return count($this->errors);
    }

    /**
     * エラーを取得する
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Build URI
     *
     * @param string $endpoint
     * @return string
     */
    protected function makeUrl(string $endpoint): string
    {
        $url = implode('.', [
            $endpoint,
            GmoApiResponseType::getDescription($this->access_type)
        ]);

        return implode('/', [
            trim($this->baseUrl, '/'),
            trim($url, '/'),
        ]);
    }
}
