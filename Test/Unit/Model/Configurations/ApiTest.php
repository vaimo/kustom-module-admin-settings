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

    public function testGetUserNameUseConfigKeyForAuProduction(): void
    {
        $expectedKey = 'klarna/api_au/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'AUD'));
    }

    public function testGetUserNameUseConfigKeyForCaProduction(): void
    {
        $expectedKey = 'klarna/api_ca/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'CAD'));
    }

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

    public function testGetUserNameUseConfigKeyForMxProduction(): void
    {
        $expectedKey = 'klarna/api_mx/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'MXN'));
    }

    public function testGetUserNameUseConfigKeyForNzProduction(): void
    {
        $expectedKey = 'klarna/api_nz/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'NZD'));
    }

    public function testGetUserNameUseConfigKeyForUsProduction(): void
    {
        $expectedKey = 'klarna/api_us/username_production';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'USD'));
    }

    public function testGetUserNameUseConfigKeyForAuPlayground(): void
    {
        $expectedKey = 'klarna/api_au/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'AUD'));
    }

    public function testGetUserNameUseConfigKeyForCaPlayground(): void
    {
        $expectedKey = 'klarna/api_ca/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'CAD'));
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

    public function testGetUserNameUseConfigKeyForMxPlayground(): void
    {
        $expectedKey = 'klarna/api_mx/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'MXN'));
    }

    public function testGetUserNameUseConfigKeyForNzPlayground(): void
    {
        $expectedKey = 'klarna/api_nz/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'NZD'));
    }

    public function testGetUserNameUseConfigKeyForUsPlayground(): void
    {
        $expectedKey = 'klarna/api_us/username_playground';
        $expectedValue = 'test_username';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getUserName($this->store, 'USD'));
    }

    public function testGetPasswordUseConfigKeyForAuProduction(): void
    {
        $expectedKey = 'klarna/api_au/password_production';
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
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'AUD'));
    }

    public function testGetPasswordUseConfigKeyForCaProduction(): void
    {
        $expectedKey = 'klarna/api_ca/password_production';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'CAD'));
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

    public function testGetPasswordUseConfigKeyForMxProduction(): void
    {
        $expectedKey = 'klarna/api_mx/password_production';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'MXN'));
    }

    public function testGetPasswordUseConfigKeyForNzProduction(): void
    {
        $expectedKey = 'klarna/api_nz/password_production';
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
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'NZD'));
    }

    public function testGetPasswordUseConfigKeyForUsProduction(): void
    {
        $expectedKey = 'klarna/api_us/password_production';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'USD'));
    }

    public function testGetPasswordUseConfigKeyForAuPlayground(): void
    {
        $expectedKey = 'klarna/api_au/password_playground';
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
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'AUD'));
    }

    public function testGetPasswordUseConfigKeyForCaPlayground(): void
    {
        $expectedKey = 'klarna/api_ca/password_playground';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'CAD'));
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

    public function testGetPasswordUseConfigKeyForMxPlayground(): void
    {
        $expectedKey = 'klarna/api_mx/password_playground';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'MXN'));
    }

    public function testGetPasswordUseConfigKeyForNzPlayground(): void
    {
        $expectedKey = 'klarna/api_nz/password_playground';
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
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'NZD'));
    }

    public function testGetPasswordUseConfigKeyForUsPlayground(): void
    {
        $expectedKey = 'klarna/api_us/password_playground';
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
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $password
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getPassword($this->store, 'USD'));
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

    public function testGetRegionCurrencyIsCadAndNaIsEnabledImpliesReturningRegionNa(): void
    {
        $expected = 'na';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'CAD'));
    }

    public function testGetRegionCurrencyIsMxnAndNaIsEnabledImpliesReturningRegionNa(): void
    {
        $expected = 'na';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'MXN'));
    }

    public function testGetRegionCurrencyIsUsdAndNaIsEnabledImpliesReturningRegionNa(): void
    {
        $expected = 'na';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'USD'));
    }

    public function testGetRegionCurrencyIsNzdAndOcIsEnabledImpliesReturningRegionNa(): void
    {
        $expected = 'oc';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'NZD'));
    }

    public function testGetRegionCurrencyIsAudAndOcIsEnabledImpliesReturningRegionNa(): void
    {
        $expected = 'oc';
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu,oc');

        static::assertEquals($expected, $this->api->getRegion($this->store, 'AUD'));
    }

    public function testGetRegionCurrencyIsAudAndOcIsDisabledImpliesThrowingException(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na,eu');

        static::expectException(KlarnaException::class);
        $this->api->getRegion($this->store, 'AUD');
    }

    public function testIsTestModeUseConfigKeyForAu(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertFalse($this->api->isTestMode($this->store, 'AUD'));
    }

    public function testIsTestModeUseConfigKeyForCa(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertTrue($this->api->isTestMode($this->store, 'CAD'));
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

    public function testIsTestModeUseConfigKeyForMx(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertTrue($this->api->isTestMode($this->store, 'MXN'));
    }

    public function testIsTestModeUseConfigKeyForNz(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertFalse($this->api->isTestMode($this->store, 'NZD'));
    }

    public function testIsTestModeUseConfigKeyForUs(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertTrue($this->api->isTestMode($this->store, 'USD'));
    }

    public function testGetClientIdentifierUseConfigKeyForAuProduction(): void
    {
        $expectedKey = 'klarna/api_au/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'AUD'));
    }

    public function testGetClientIdentifierUseConfigKeyForCaProduction(): void
    {
        $expectedKey = 'klarna/api_ca/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'CAD'));
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

    public function testGetClientIdentifierUseConfigKeyForMxProduction(): void
    {
        $expectedKey = 'klarna/api_mx/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'MXN'));
    }

    public function testGetClientIdentifierUseConfigKeyForNzProduction(): void
    {
        $expectedKey = 'klarna/api_nz/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'NZD'));
    }

    public function testGetClientIdentifierUseConfigKeyForUsProduction(): void
    {
        $expectedKey = 'klarna/api_us/client_identifier_production';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'USD'));
    }

    public function testGetClientIdentifierUseConfigKeyForAuPlayground(): void
    {
        $expectedKey = 'klarna/api_au/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'AUD'));
    }

    public function testGetClientIdentifierUseConfigKeyForCaPlayground(): void
    {
        $expectedKey = 'klarna/api_ca/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'CAD'));
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

    public function testGetClientIdentifierUseConfigKeyForMxPlayground(): void
    {
        $expectedKey = 'klarna/api_mx/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'MXN'));
    }

    public function testGetClientIdentifierUseConfigKeyForNzPlayground(): void
    {
        $expectedKey = 'klarna/api_nz/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'oc',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'NZD'));
    }

    public function testGetClientIdentifierUseConfigKeyForUsPlayground(): void
    {
        $expectedKey = 'klarna/api_us/client_identifier_playground';
        $expectedValue = 'test_identifier';

        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->willReturnCallback(fn($path, $scopeType, $scopeCode) =>
                match([$path, $scopeType, $scopeCode]) {
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        'klarna/api/region', 'stores', $this->store
                    ] => 'na',
                    [
                        $expectedKey, 'stores', $this->store
                    ] => $expectedValue
                }
            );

        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals($expectedValue, $this->api->getClientIdentifier($this->store, 'USD'));
    }

    public function testGetClientIdentifierInvalidCurrencyForRegionNa(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');

        $this->expectException(KlarnaException::class);
        $this->api->getClientIdentifier($this->store, 'USDs');
    }

    public function testGetClientIdentifierInvalidCurrencyForRegionOc(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');

        $this->expectException(KlarnaException::class);
        $this->api->getClientIdentifier($this->store, 'AUDs');
    }

    public function testGetClientIdentifierInvalidRegionGiven(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('ocs');

        $this->expectException(KlarnaException::class);
        $this->api->getClientIdentifier($this->store, 'AUDs');
    }

    public function testGetApiUrlUseConfigKeyForEuPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('https://api.playground.klarna.com', $this->api->getApiUrl($this->store, 'EUR'));
    }

    public function testGetApiUrlUseConfigKeyForNaPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('https://api-na.playground.klarna.com', $this->api->getApiUrl($this->store, 'USD'));
    }

    public function testGetApiUrlUseConfigKeyForOcPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('https://api-oc.playground.klarna.com', $this->api->getApiUrl($this->store, 'NZD'));
    }

    public function testGetApiUrlUseConfigKeyForEuProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_eu/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals('https://api.klarna.com', $this->api->getApiUrl($this->store, 'EUR'));
    }

    public function testGetApiUrlUseConfigKeyForNaProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals('https://api-na.klarna.com', $this->api->getApiUrl($this->store, 'USD'));
    }

    public function testGetApiUrlUseConfigKeyForOcProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals('https://api-oc.klarna.com', $this->api->getApiUrl($this->store, 'NZD'));
    }

    public function testGetApiUrlInvalidRegionThrowsException(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('abc');

        $this->expectException(KlarnaException::class);
        $this->api->getApiUrl($this->store, 'NZD');
    }

    public function testGetModeIsTestModeReturnsPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(1);

        static::assertEquals('playground', $this->api->getMode($this->store, 'AUD'));
    }

    public function testGetModeIsNotTestModeReturnsProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn(0);

        static::assertEquals('production', $this->api->getMode($this->store, 'AUD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForAuPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'AUD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForCaPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'CAD'));
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

    public function testGetGlobalApiUrlUseConfigKeyForMxPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'MXN'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForNzPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'NZD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForUsPlayground(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn('1');

        static::assertEquals('https://api-global.test.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'USD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForAuProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_au/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'AUD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForCaProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_ca/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'CAD'));
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

    public function testGetGlobalApiUrlUseConfigKeyForMxProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_mx/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'MXN'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForNzProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_nz/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'NZD'));
    }

    public function testGetGlobalApiUrlUseConfigKeyForUsProduction(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('na');
        $this->dependencyMocks['scopeConfig']->method('isSetFlag')
            ->with('klarna/api_us/api_mode', 'stores', $this->store)
            ->willReturn('0');

        static::assertEquals('https://api-global.klarna.com/', $this->api->getGlobalApiUrl($this->store, 'USD'));
    }

    public function testGetGlobalPartnerUrlUsingUnknownCurrencyForNotEuMarketImpliesThrowingException(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('oc');

        static::expectException(KlarnaException::class);
        $this->api->getGlobalApiUrl($this->store, 'AAAAAAAAA');
    }

    public function testGetAllEnabledRegionsReturnsResult(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('a,b,c');

        $result = $this->api->getAllEnabledRegions($this->store);
        static::assertEquals(['a', 'b', 'c'], $result);
    }

    public function testGetAllEnabledMarketsNoMarketEnabledImpliesReturningEmptyArray(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('');

        $result = $this->api->getAllEnabledMarkets($this->store);
        static::assertEquals([], $result);
    }

    public function testGetAllEnabledMarketsAllMarketsEnabledImpliesReturningFullArray(): void
    {
        $this->dependencyMocks['scopeConfig']->method('getValue')
            ->with('klarna/api/region', 'stores', $this->store)
            ->willReturn('eu,na,oc');

        $result = $this->api->getAllEnabledMarkets($this->store);
        static::assertEquals(
            [
                'eu' => ['eu'],
                'na' => ['us', 'ca', 'mx'],
                'oc' => ['au', 'nz']
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
