<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * コンビニ決済関連メソッド
 * Trait GmoCvs
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoCvs
{
    /**
     * コンビニ決済の取引登録
     * @param array $data
     * @return array
     */
    public function entryTranCvs(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'OrderID',
            'Amount',
            'Tax'
        ];

        $data = $this->checkParams($fillable, $data);

        $endpoint = 'EntryTranCvs';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * コンビニ決済の決済実行
     * @param array $data
     * @return array
     */
    public function execTranCvs(array $data): array
    {
        $fillable = [
            'AccessID',
            'AccessPass',
            'OrderID',
            'Convenience',
            'CustomerName',
            'CustomerKana',
            'TelNo',
            'PaymentTermDay',
            'MailAddress',
            'ShopMailAddress',
            'ReserveNo',
            'MemberNo',
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
            'ReceiptsDisp11',
            'ReceiptsDisp12',
            'ReceiptsDisp13',
            'ClientField1',
            'ClientField2',
            'ClientField3',
            'ClientFieldFlag',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'ExecTranCvs';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 支払い停止
     * @param array $data
     * @return array
     */
    public function cvsCancel(array $data): array
    {
        $fillable = [
            'ShopID',
            'ShopPass',
            'AccessID',
            'AccessPass',
            'OrderID'
        ];

        $data = $this->checkParams($fillable, $data);

        $endpoint = 'CvsCancel';
        return $this->postHttp($endpoint, $data);
    }
}
