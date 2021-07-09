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
}
