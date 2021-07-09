<?php

return [
    /**
     * idPass タイプのみ対応しています。現在のバージョンでは、 json タイプに対応していません。
     * @type int
     */
    'access_type' => 1, // 1: idPass, 2: json

    /**
     * API リクエストのタイムアウト秒
     * @type int
     */
    'timeout' => env('GMO_TIMEOUT', 10),

    /**
     * エラー時に Exception を発生させる
     * @type boolean
     */
    'exception_mode' => true,

    /**
     * ベースURL
     * @type string
     */
    'base_url' => env('GMO_API_BASE_URL', 'https://pt01.mul-pay.jp/payment'),

    /**
     * サイトID
     * @type string
     */
    'gmo_site_id' => env('GMO_SITE_ID', 'サイトID'),

    /**
     * サイト・パスワード
     * @type string
     */
    'gmo_site_password' => env('GMO_SITE_PASSWORD', 'サイト・パスワード'),

    /**
     * ショップID
     * @type string
     */
    'gmo_shop_id' => env('GMO_SHOP_ID', 'ショップID'),

    /**
     * ショップ・パスワード
     * @type string
     */
    'gmo_shop_password' => env('GMO_SHOP_PASSWORD', 'ショップ・パスワード'),
];
