<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Concerns;

/**
 * 会員・カード関連メソッド
 * Trait GmoApiMember
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Concerns
 */
trait GmoApiMember
{
    /**
     * 決済後カード登録
     * @param array $data
     * @return array
     */
    public function tradedCard(array $data): array
    {
        $fillable = [
            'VerSion',
            'ShopID',
            'ShopPass',
            'OrderID',
            'SiteID',
            'SitePass',
            'MemberID',
            'SeqMode',
            'DefaultFlag',
            'CardSeq',
            'HolderName',
            'CardName',
            'CardPass',
            'UseSiteMaskLevel'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'TradedCard';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 会員登録
     * @param array $data
     * @return array
     */
    public function saveMember(array $data)
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
            'MemberName',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SaveMember';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 会員更新
     * @param array $data
     * @return array
     */
    public function updateMember(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
            'MemberName',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'UpdateMember';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 会員照会
     * @param array $data
     * @return array
     */
    public function searchMember(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SearchMember';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * 会員削除
     * @param array $data
     * @return array
     */
    public function deleteMember(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'DeleteMember';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * カード登録／更新
     * @param array $data
     * @return array
     */
    public function saveCard(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
            'SeqMode',
            'CardSeq',
            'DefaultFlag',
            'CardName',
            'HolderName',
            'Token',
            'UpdateType'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SaveCard';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * カード照会
     * @param array $data
     * @return array
     */
    public function searchCard(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
            'SeqMode',
            'CardSeq',
            'UseFloatingMask'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SaveCard';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * カード属性照会
     * @param array $data
     * @return array
     */
    public function searchCardDetail(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'Token',
            'SearchType',
            'UseFloatingMask'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'SearchCardDetail';
        return $this->postHttp($endpoint, $data);
    }

    /**
     * カード削除
     * @param array $data
     * @return array
     */
    public function deleteCard(array $data): array
    {
        $fillable = [
            'SiteID',
            'SitePass',
            'MemberID',
            'SeqMode',
            'CardSeq'
        ];
        $data = $this->checkParams($fillable, $data);

        $endpoint = 'DeleteCard';
        return $this->postHttp($endpoint, $data);
    }
}
