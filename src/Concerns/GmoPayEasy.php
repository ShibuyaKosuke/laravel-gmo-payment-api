<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * Trait GmoPayEasy
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoPayEasy
{
    /**
     * 取引登録
     * @param array $data
     * @return array|mixed|void
     */
    public function entryTranPayEasy(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'Amount',
            'Tax'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranPayEasy';
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
            'CustomerName',
            'CustomerKana',
            'TelNo',
            'PaymentTermDay',
            'MailAddress',
            'ShopMailAddress',
            'RegisterDisp1',
            'RegisterDisp2',
            'RegisterDisp3',
            'RegisterDisp4',
            'RegisterDisp5',
            'RegisterDisp6',
            'RegisterDisp7',
            'RegisterDisp8',
            'ReceiptsDisp1',
            'ReceiptsDisp2',
            'ReceiptsDisp3',
            'ReceiptsDisp4',
            'ReceiptsDisp5',
            'ReceiptsDisp6',
            'ReceiptsDisp7',
            'ReceiptsDisp8',
            'ReceiptsDisp9',
            'ReceiptsDisp10',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranEdy';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 支払停止
     * @param array $data
     * @return mixed
     */
    public function payEasyCancel(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'PayEasyCancel';
        return $this->postHttp($endpoint, $data);
    }
}
