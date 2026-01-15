<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Configurations;

use Klarna\AdminSettings\Model\Configurations\Api;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;
use Klarna\Base\Exception as KlarnaException;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Configurations\Api
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private Api $api;
    /**
     * @var Store
     */
    private Store $store;

    public function testGetUserNameUseConfigKeyForEuProduction(): void
    {
        $expectedKey = 'klarna/api_eu/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'EUR'));
    }

    public function testGetUserNameUseConfigKeyForEuPlayground(): void
    {
        $expectedKey = 'klarna/api_eu/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'EUR'));
    }

    public function testGetPasswordUseConfigKeyForEuProduction(): void
    {
        $expectedKey = 'klarna/api_eu/password_production';
        $password = 'test_password_input';
        $expectedValue = 'test_password_output';
        $this->dependencyMocks['encryptor']->method('decrypt')
            ->with($password)
            ->willReturn($expectedValue);

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'EUR'));
    }


    public function testGetPasswordUseConfigKeyForEuPlayground(): void
    {
        $expectedKey = 'klarna/api_eu/password_playground';
        $password = 'test_password_input';
        $expectedValue = 'test_password_output';
        $this->dependencyMocks['encryptor']->method('decrypt')
            ->with($password)
            ->willReturn($expectedValue);

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'EUR'));
    }

    public function testGetRegionCurrencyEurAndEuIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'EUR'));
    }

    public function testGetRegionCurrencyIsAnythingAndEuIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'EUR'));
    }

    public function testGetRegionCurrencyIsCadAndNaIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'CAD'));
    }

    public function testGetRegionCurrencyIsMxnAndNaIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'MXN'));
    }

    public function testGetRegionCurrencyIsUsdAndNaIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'USD'));
    }

    public function testGetRegionCurrencyIsNzdAndOcIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'NZD'));
    }

    public function testGetRegionCurrencyIsAudAndOcIsEnabledImpliesReturningRegionEu(): void
    {
        $expected = 'eu';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'AUD'));
    }

    public function testIsTestModeUseConfigKeyForEu(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertFalse($this->api->isTestMode($this->store, 'EUR'));
    }

    public function testGetClientIdentifierUseConfigKeyForEuProduction(): void
    {
        $expectedKey = 'klarna/api_eu/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'EUR'));
    }

    public function testGetClientIdentifierUseConfigKeyForEuPlayground(): void
    {
        $expectedKey = 'klarna/api_eu/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'eu',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'EUR'));
    }

    public function testGetApiUrlUseConfigKeyForEuPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('https://api.playground.kustom.co', $this->api->getApiUrl($this->store, 'EUR'));
    }

    public function testGetApiUrlUseConfigKeyForEuProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals('https://api.kustom.co', $this->api->getApiUrl($this->store, 'EUR'));
    }

    public function testGetModeIsTestModeReturnsPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('playground', $this->api->getMode($this->store, 'AUD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForEuPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'EUR'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForEuProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'EUR'));
    }

    public function testGetAllEnabledRegionsReturnsResult(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('a,b,c');

        $result = $this->api->getAllEnabledRegions($this->store);
        static::assertEquals(['eu'], $result);
    }

    public function testGetAllEnabledMarketsNoMarketEnabledImpliesReturningNotEmptyArray(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('');

        $result = $this->api->getAllEnabledMarkets($this->store);
        static::assertNotEmpty($result);
    }

    public function testGetAllEnabledMarketsAllMarketsEnabledImpliesReturningOnlyEuArray(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu,na,oc');

        $result = $this->api->getAllEnabledMarkets($this->store);
        static::assertEquals(
            [
                'eu' => ['eu'],
            ],
            $result
        );
    }

    protected function setUp(): void
    {
        $this->api = parent::setUpMocks(Api::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}
