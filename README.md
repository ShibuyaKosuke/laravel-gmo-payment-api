# laravel-gmo-payment-api

## Install

```bash
composer require shibuyakosuke/laravel-gmo-payment-api
```

## Publish config file.

```bash
php artisan vendor:publish --provider="ShibuyaKosuke\LaravelGmoPaymentApi\Providers\GmoServiceProvider"
```

## Append .env 

```dotenv
GMO_TIMEOUT=10
GMO_API_BASE_URL="https://pt01.mul-pay.jp/payment"
GMO_SITE_ID=tsite00000000
GMO_SITE_PASSWORD={site_password}
GMO_SHOP_ID=tshop00000000
GMO_SHOP_PASSWORD={shop_password}
```

## Usage

メソッド名は、エンドポイント名のキャメルケースに一致します。

```php
GmoApi::saveMember([
    'MemberID' => '0000012345',
    'MemberName' => '鈴木太郎',
]);
```

# How to use fake response in test code.

```php
// On Success
/** @var array $response */
$response = GmoApi::setFake([
        '*' => Http::response('ACS=0&OrderID=SampleOrderID&Forward=2a99662&Method=1&PayTimes=&Approve=040128&TranID=2107071507111111111111813673&TranDate=20210707151900&CheckString=cd5678b1bca0559b36459f3f9dfd4952', 200),
    ])
    ->execTran([
        'AccessID'        => 'SampleAccessID',
        'AccessPass'      => 'SampleAccessPass',
        'OrderID'         => 'SampleOrderID',
        'Method'          => '2',
        'PayTimes'        => '2',
        'Token'           => 'SampleToken',
        'HttpAccept'      => 'SampleHttpAccept',
        'HttpUserAgent'   => 'HttpUserAgent',
        'DeviceCategory'  => '0',
        'ClientField1'    => 'SampleClientField1',
        'ClientField2'    => 'SampleClientField2',
        'ClientField3'    => 'SampleClientField3',
        'ClientFieldFlag' => '0',
        'TokenType'       => '1',
        'RetUrl'          => 'https://example.com/xxxxx'
    ]);

// On Error

$this->expectException(GmoApiException::class);

/** @var array $response */
$response = GmoApi::setFake([
        '*' => Http::response('ErrCode=E01&ErrInfo=E01040001', 200),
    ])
    ->execTran([
        'AccessID'        => 'SampleAccessID',
        'AccessPass'      => 'SampleAccessPass',
        'OrderID'         => 'SampleOrderID',
        'Method'          => '2',
        'PayTimes'        => '2',
        'Token'           => 'SampleToken',
        'HttpAccept'      => 'SampleHttpAccept',
        'HttpUserAgent'   => 'HttpUserAgent',
        'DeviceCategory'  => '0',
        'ClientField1'    => 'SampleClientField1',
        'ClientField2'    => 'SampleClientField2',
        'ClientField3'    => 'SampleClientField3',
        'ClientFieldFlag' => '0',
        'TokenType'       => '1',
        'RetUrl'          => 'https://example.com/xxxxx'
    ]);


```
