<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\AdminSettings\Test\Unit\Model\Update\UxRedesign\Api;

use Klarna\AdminSettings\Model\Update\UxRedesign\Api\Mapper;
use Klarna\Base\Test\Unit\Mock\TestCase;
use Magento\Store\Model\Store;

/**
 * @coversDefaultClass \Klarna\AdminSettings\Model\Update\UxRedesign\Api\Mapper
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class MapperTest extends TestCase
{
    /**
     * @var Mapper
     */
    private Mapper $mapper;
    /**
     * @var Store
     */
    private Store $store;

    public function testGetTargetUserNameRegionIsEuAndCurrencyEurAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('kp_eu', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_eu/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyUsdAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
        ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_us/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyCadAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('CAD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_ca/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyMxnAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('MXN');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_mx/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsOcAndCurrencyAudAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_au/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsOcAndCurrencyNzwAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('NZD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_nz/username_playground', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsEuAndCurrencyEurAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('uk', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_eu/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyUsdAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_us/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyCadAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('CAD');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_ca/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsNaAndCurrencyMxnAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('MXN');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_mx/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsOcAndCurrencyAudAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_au/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameRegionIsOcAndCurrencyNzdAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('NZD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEquals('klarna/api_nz/username_production', $result['key']);
        static::assertEquals('a', $result['value']);
    }

    public function testGetTargetUserNameApiModeIsNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetUserNameMerchantIdIsNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', '', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetUserName();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetPasswordRegionIsEuAndCurrencyEurAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('dach_v3', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_eu/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyUsdAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_us/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyCadAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('CAD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_ca/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyMxnAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('MXN');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_mx/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsOcAndCurrencyAudAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_au/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsOcAndCurrencyNzdAndPlayground(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('NZD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', true);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_nz/password_playground', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsEuAndCurrencyEurAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('dach_v3', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_eu/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyUsdAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_us/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyCadAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('CAD');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_ca/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsNaAndCurrencyMxnAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('MXN');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_mx/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsOcAndCurrencyAudAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_au/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordRegionIsOcAndCurrencyNzdAndProduction(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('NZD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEquals('klarna/api_nz/password_production', $result['key']);
        static::assertEquals('b', $result['value']);
    }

    public function testGetTargetPasswordApiModeIsNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetPasswordSharedSecretIsNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', '', 'c', 'd', false);

        $result = $this->mapper->getTargetPassword();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsNaReturnsNa(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('na', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsKpNaReturnsNa(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('na', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsUkReturnsEu(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('uk', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('eu', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsNlReturnsEu(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('nl', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('eu', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsDachV3ReturnsEu(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('dach_v3', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('eu', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsKpEuReturnsEu(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('kp_eu', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('eu', $result['value']);
    }

    public function testGetTargetRegionLegacyConfigValueIsKpOcReturnsEu(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEquals('klarna/api/region', $result['key']);
        static::assertEquals('oc', $result['value']);
    }

    public function testGetTargetRegionUnknownKeyReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('aaaa', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetRegion();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetClientIdentifierKecIsSetAndNotOsmReturnsKec(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('nl', 'a', 'b', '', 'd', false);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEquals('klarna/api_eu/client_identifier_production', $result['key']);
        static::assertEquals('d', $result['value']);
    }

    public function testGetTargetClientIdentifierKecIsSetAndOsmReturnsKec(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('kp_eu', 'a', 'b', 'c', 'd', false);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEquals('klarna/api_eu/client_identifier_production', $result['key']);
        static::assertEquals('d', $result['value']);
    }

    public function testGetTargetClientIdentifierKecIsNotSetButOsmReturnsOsm(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', '', false);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEquals('klarna/api_au/client_identifier_production', $result['key']);
        static::assertEquals('c', $result['value']);
    }

    public function testGetTargetClientIdentifierIsTestModeImpliesResultKeyIsPlaygroundKey(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', 'c', '', true);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEquals('klarna/api_au/client_identifier_playground', $result['key']);
        static::assertEquals('c', $result['value']);
    }

    public function testGetTargetClientIdentifierApiModeNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('aaaa', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetClientIdentifierKecIsNotSetAndAlsoNotOsmReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetClientIdentifier();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    public function testGetTargetApiModeRegionIsEuReturnsEuApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('EUR');
        $this->mockConfigurationValues('uk', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_eu/api_mode', $result['key']);
        static::assertEquals('0', $result['value']);
    }

    public function testGetTargetApiModeRegionIsNaAndCurrencyUsdReturnsUsApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('USD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_us/api_mode', $result['key']);
        static::assertEquals('0', $result['value']);
    }

    public function testGetTargetApiModeRegionIsNaAndCurrencyCadReturnsUsApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('CAD');
        $this->mockConfigurationValues('kp_na', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_ca/api_mode', $result['key']);
        static::assertEquals('0', $result['value']);
    }

    public function testGetTargetApiModeRegionIsNaAndCurrencyMxnReturnsUsApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('MXN');
        $this->mockConfigurationValues('kp_na', 'a', 'b', '', '', false);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_mx/api_mode', $result['key']);
        static::assertEquals('0', $result['value']);
    }

    public function testGetTargetApiModeRegionIsOcAndCurrencyAudReturnsAuApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', '', '', true);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_au/api_mode', $result['key']);
        static::assertEquals('1', $result['value']);
    }

    public function testGetTargetApiModeRegionIsOcAndCurrencyNzdReturnsAuApiMode(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('NZD');
        $this->mockConfigurationValues('kp_oc', 'a', 'b', '', '', true);

        $result = $this->mapper->getTargetApiMode();
        static::assertEquals('klarna/api_nz/api_mode', $result['key']);
        static::assertEquals('1', $result['value']);
    }

    public function testGetTargetApiModeApiModeNotSetReturnsEmptyKeyAndValue(): void
    {
        $this->dependencyMocks['shopConfiguration']->method('getDefaultCurrencyCode')
            ->willReturn('AUD');
        $this->mockConfigurationValues('aaaa', 'a', 'b', '', '', true);

        $result = $this->mapper->getTargetApiMode();
        static::assertEmpty($result['key']);
        static::assertEmpty($result['value']);
    }

    private function mockConfigurationValues(
        string $apiVersion,
        string $merchantId,
        string $sharedSecret,
        string $osmClientIdentifier,
        string $kecClientIdentifier,
        bool $isTestMode
    ): void {
        $this->dependencyMocks['legacyConfiguration']->method('getApiVersion')->willReturn($apiVersion);
        $this->dependencyMocks['legacyConfiguration']->method('getMerchantId')->willReturn($merchantId);
        $this->dependencyMocks['legacyConfiguration']->method('getSharedSecret')->willReturn($sharedSecret);
        $this->dependencyMocks['legacyConfiguration']->method('getOsmClientIdentifier')->willReturn($osmClientIdentifier);
        $this->dependencyMocks['legacyConfiguration']->method('getKecClientIdentifier')->willReturn($kecClientIdentifier);
        $this->dependencyMocks['legacyConfiguration']->method('isTestModeEnabled')->willReturn($isTestMode);
        $this->mapper->prepareMappingData('scope', 'id');
    }

    protected function setUp(): void
    {
        $this->mapper = parent::setUpMocks(Mapper::class);
        $this->store = $this->mockFactory->create(Store::class);
    }
}