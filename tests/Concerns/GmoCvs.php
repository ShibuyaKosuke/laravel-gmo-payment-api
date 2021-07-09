<?php

namespace ShibuyaKosuke\LaravelGmoPaymentApi\Test\Concerns;

use Illuminate\Support\Facades\Http;
use ShibuyaKosuke\LaravelGmoPaymentApi\Exceptions\GmoApiException;

/**
 * Trait GmoCvs
 * @package ShibuyaKosuke\LaravelGmoPaymentApi\Test\Concerns
 */
trait GmoCvs
{
    public function test_entryTranCvs(): void
    {
        $access_id = '0000000000000';
        $access_pass = 'PASS00000000000000';

        $request = http_build_query([
            'AccessID' => $access_id,
            'AccessPass' => $access_pass
        ]);

        $fake = ['*' => Http::response($request)];

        $response = $this->object
            ->setFake($fake)
            ->entryTranCvs([
                'OrderID' => 'ptl0000001',
                'Amount' => 123456,
                'Tax' => 0,
            ]);
        self::assertArrayHasKey('AccessID', $response);
        self::assertArrayHasKey('AccessPass', $response);

        self::assertEquals($access_id, $response['AccessID']);
        self::assertEquals($access_pass, $response['AccessPass']);
    }

    /**
     * @return void
     */
    public function test_entryTranCvsOnError(): void
    {
        $err_code = 'M01';
        $err_info = 'M01004010';

        $request = http_build_query([
            'ErrCode' => $err_code,
            'ErrInfo' => $err_info,
        ]);

        $fake = ['*' => Http::response($request)];

        try {
            $this->object
                ->setFake($fake)
                ->entryTranCvs([]);
        } catch (GmoApiException $e) {
            $errors = $this->object->getErrors();
            self::assertIsArray($errors);
            foreach ($errors as $error) {
                self::assertArrayHasKey('ErrCode', $error);
                self::assertArrayHasKey('ErrInfo', $error);
                self::assertArrayHasKey('ErrMessage', $error);
            }
            self::assertEquals(400, $e->getCode());
            self::assertEquals('GMO Payment API returns Errors', $e->getMessage());
        }
    }
}
