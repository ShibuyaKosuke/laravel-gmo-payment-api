<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * Class GmoSuica
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoSuica
{
    /**
     * 取引登録
     * @param array $data
     * @return mixed
     */
    public function entryTranSuica(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'Amount',
            'Tax'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranSuica';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済実行
     * @param array $data
     * @return mixed
     */
    public function execTranSuica(array $data)
    {
        $fillable = [
            'AccessID',
            'AccessPass',
            'OrderID',
            'ItemName',
            'MailAddress',
            'ShopMailAddress',
            'SuicaAddInfo1',
            'SuicaAddInfo2',
            'SuicaAddInfo3',
            'SuicaAddInfo4',
            'PaymentTermDay',
            'PaymentTermSec',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranSuica';
        return $this->postHttp($endpoint, $data);
    }
}
