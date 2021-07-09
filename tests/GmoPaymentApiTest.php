<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Test;

use Illuminate\Support\Facades\Http;
use ShibuyaKosuke\LaravelGmoPaymentApi\GmoPaymentApi;
use ShibuyaKosuke\LaravelGmoPaymentApi\Test\Concerns\GmoCvs;

/**
 * Class GmoPaymentApiTest
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Test
 */
class GmoPaymentApiTest extends TestCase
{
    use GmoCvs;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->http = new Http();
        $this->object = new GmoPaymentApi($this->app['config'], $this->http);
    }
}
