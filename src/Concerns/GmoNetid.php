<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * iD決済
 * Trait GmoNetid
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoNetid
{
    /**
     * 取引登録
     * @param array $data
     * @return array|mixed|void
     */
    public function entryTranNetid(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'JobCd',
            'Amount',
            'Tax',
            'RetURL',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranNetid';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済実行
     * @param array $data
     * @return array|mixed|void
     */
    public function execTranNetid(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'CustomerName',
            'PaymentTermDay',
            'MailAddress',
            'ShopMailAddress',
            'ItemName',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranEdy';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済キャンセル
     * @param array $data
     * @return array|mixed|void
     */
    public function cancelTranNetid(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'Amount',
            'Tax',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'CancelTranNetid';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 実売上（売上の確定を行う）
     * @param array $data
     * @return array|mixed|void
     */
    public function salesTranNetid(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'Amount',
            'Tax',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SalesTranNetid';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 金額変更（完了した決済に金額の変更を行う）
     * @param array $data
     * @return array|mixed|void
     */
    public function changeTranNetid(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'Amount',
            'Tax',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ChangeTranNetid';
        return $this->postHttp($endpoint, $data);
    }
}
