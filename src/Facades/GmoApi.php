<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Facades;

use Illuminate\Support\Facades\Facade;
use ShibuyaKosuke\LaravelGmoPaymentApi\GmoPaymentApi;

/**
 * Class GmoApi
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Facades
 *
 * @see GmoPaymentApi::class
 *
 * @method static GmoPaymentApi setFake(array $fake = null)
 * @method static array showParams()
 * @method static boolean hasErrors()
 * @method static array getErrors()
 * @method static array deleteCard(array $data)
 * @method static array deleteMember(array $data)
 * @method static array saveCard(array $data)
 * @method static array saveMember(array $data)
 * @method static array searchCard(array $data)
 * @method static array searchCardDetail(array $data)
 * @method static array searchMember(array $data)
 * @method static array tradedCard(array $data)
 * @method static array updateMember(array $data)
 * @method static array alterTran(array $data)
 * @method static array changeTran(array $data)
 * @method static array entryTran(array $data)
 * @method static array execTran(array $data)
 * @method static array searchTrade(array $data)
 * @method static array secureTran(array $data)
 * @method static array secureTran2(array $data)
 * @method static array tds2Auth(array $data)
 * @method static array tds2AuthApp(array $data)
 * @method static array tds2Result(array $data)
 * @method static array tds2ResultApp(array $data)
 * @method static array cvsCancel(array $data)
 * @method static array entryTranCvs(array $data)
 * @method static array execTranCvs(array $data)
 * @method static array entryTranSuica(array $data)
 * @method static array execTranSuica(array $data)
 * @method static array entryTranEdy(array $data)
 * @method static array execTranEdy(array $data)
 * @method static array cancelTranNetid(array $data)
 * @method static array changeTranNetid(array $data)
 * @method static array entryTranNetid(array $data)
 * @method static array execTranNetid(array $data)
 * @method static array salesTranNetid(array $data)
 * @method static array deleteWebmoneyQuickId(array $data)
 * @method static array entryTranWebmoney(array $data)
 * @method static array execTranWebmoney(array $data)
 * @method static array historyWebmoneyQuickId(array $data)
 * @method static array refundWebmoney(array $data)
 * @method static array webmoneyQuickStart(array $data)
 */
class GmoApi extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'shibuyakosuke.gmo_payment_api';
    }
}
