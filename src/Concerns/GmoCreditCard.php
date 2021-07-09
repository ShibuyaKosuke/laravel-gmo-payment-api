<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * クレジットカード決済関連メソッド
 * Trait GmoCreditCard
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoCreditCard
{
    /**
     * クレジット決済の取引登録
     * @param array $data
     * @return array
     */
    public function entryTran(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'JobCd',
            'ItemCode',
            'Amount',
            'Tax',
            'TdFlag',
            'TdTenantName',
            'Tds2Type'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTran';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * クレジット決済の決済実行
     * @param array $data
     * @return array
     */
    public function execTran(array $data): array
    {
        $fillable = ['AccessID',
            'AccessPass',
            'OrderID',
            'Method',
            'PayTimes',
            'SiteID',
            'SitePass',
            'MemberID',
            'SeqMode',
            'CardSeq',
            'CardPass',
            'SecurityCode',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
            'TokenType',
            'RetUrl'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTran';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS1.0認証後決済実行
     * @param array $data
     * @return array
     * @todo
     */
    public function secureTran(array $data): array
    {
        $fillable = [
            'PaRes',
            'MD'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SecureTran';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS2.0認証後決済実行
     * @param array $data
     * @return array
     */
    public function tds2Auth(array $data): array
    {
        $fillable = [
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'Tds2Auth';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS2.0認証結果取得
     * @param array $data
     * @return array
     */
    public function tds2Result(array $data): array
    {
        $fillable = [
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'Tds2Result';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS2.0認証実行（モバイルアプリ版）
     * @param array $data
     * @return array
     */
    public function tds2AuthApp(array $data): array
    {
        $fillable = [
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'Tds2AuthApp';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS2.0認証結果取得（モバイルアプリ版）
     * @param array $data
     * @return array
     */
    public function tds2ResultApp(array $data): array
    {
        $fillable = [
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'Tds2ResultApp';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 3DS2.0認証後決済実行
     * @param array $data
     * @return array
     */
    public function secureTran2(array $data): array
    {
        $fillable = [
            'AccessID',
            'AccessPass'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SecureTran2';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済変更
     * @param array $data
     * @return array
     */
    public function alterTran(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'JobCd',
            'Amount'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'AlterTran';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 金額変更
     * @param array $data
     * @return array
     */
    public function changeTran(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'JobCd',
            'Amount',
            'Tax'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ChangeTran';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * クレジット決済の取引状態参照
     * @param array $data
     * @return array
     */
    public function searchTrade(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'UseSiteMaskLevel'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SearchTrade';
        return $this->postHttp($endpoint, $data);
    }
}
