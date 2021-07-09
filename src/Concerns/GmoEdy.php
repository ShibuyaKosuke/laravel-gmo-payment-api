<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * Edy
 * Trait GmoEdy
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoEdy
{
    /**
     * 取引登録
     * @param array $data
     * @return array|mixed|void
     */
    public function entryTranEdy(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'Amount',
            'Tax'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranEdy';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済実行
     * @param array $data
     * @return array|mixed|void
     */
    public function execTranEdy(array $data)
    {
        $fillable = [
            'AccessID',
            'AccessPass',
            'OrderID',
            'MailAddress',
            'ShopMailAddress',
            'EdyAddInfo1',
            'EdyAddInfo2',
            'PaymentTermDay',
            'PaymentTermSec',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranEdy';
        return $this->postHttp($endpoint, $data);
    }
}
