<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * Trait GmoWebmoney
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoWebmoney
{
    /**
     * 取引登録
     * @param array $data
     * @return array|mixed|void
     */
    public function entryTranWebmoney(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'Amount',
            'Tax',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranWebmoney';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済実行
     * @param array $data
     * @return array|mixed|void
     */
    public function execTranWebmoney(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
            'ItemName',
            'CustomerName',
            'MailAddress',
            'ShopMailAddress',
            'PaymentTermDay',
            'RedirectURL',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranWebmoney';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 支払手続き開始IFの呼び出し
     * @param array $data
     * @return mixed
     */
    public function webmoneyQuickStart(array $data)
    {
        $fillable = [
            'AccessID',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'WebmoneyQuickStart';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * クイックID削除
     * @param array $data
     * @return mixed
     */
    public function deleteWebmoneyQuickId(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'QuickID',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'DeleteWebmoneyQuickId';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * クイックID利用明細URL取得
     * @param array $data
     * @return mixed
     */
    public function historyWebmoneyQuickId(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'QuickID',
            'ReturnUrl',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'HistoryWebmoneyQuickId';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 決済取消
     * @param array $data
     * @return mixed
     */
    public function refundWebmoney(array $data)
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'RefundWebmoney';
        return $this->postHttp($endpoint, $data);
    }
}
