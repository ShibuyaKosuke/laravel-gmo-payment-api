<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Enums;

use BenSampo\Enum\Enum;

/**
 * Class GmoCvsType
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Enums
 */
final class GmoCvsType extends Enum
{
    public const LAWSON = '10001';
    public const FAMILY_MART = '10002';
    public const MINI_STOP = '10005';
    public const SEVEN_ELEVEN = '00007';
    public const SEIKO_MART = '10008';

    /**
     * @param mixed $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::LAWSON:
                return 'ローソン';
            case self::FAMILY_MART:
                return 'ファミリーマート';
            case self::MINI_STOP:
                return 'ミニストップ';
            case self::SEVEN_ELEVEN:
                return 'セブンイレブン';
            case self::SEIKO_MART:
                return 'セイコーマート';
            default:
                return $value;
        }
    }
}
