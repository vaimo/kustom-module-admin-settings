<?php
/**
 * Copyright © Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */
declare(strict_types=1);

namespace Klarna\AdminSettings\Model\Configurations;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Framework\Encryption\EncryptorInterface;

/**
 * @internal
 */
abstract class AbstractConfiguration
{
    /**
     * @var string
     */
    public string $paymentCode = '';

    /**
     * @var ScopeConfigInterface
     */
    public ScopeConfigInterface $scopeConfig;
    /**
     * @var EncryptorInterface
     */
    public EncryptorInterface $encryptor;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param EncryptorInterface $encryptor
     * @codeCoverageIgnore
     */
    public function __construct(ScopeConfigInterface $scopeConfig, EncryptorInterface $encryptor)
    {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
    }

    /**
     * Decrypt the value
     *
     * @param string $value
     * @return string
     */
    protected function decrypt(string $value): string
    {
        return $this->encryptor->decrypt($value);
    }

    /**
     * Getting back the payment flag value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getPaymentFlagValue(StoreInterface $store, string $key): bool
    {
        return $this->getFlagValue($store, $key, $this->paymentCode, 'payment');
    }

    /**
     * Getting back the checkout flag value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getCheckoutFlagValue(StoreInterface $store, string $key): bool
    {
        return $this->getFlagValue($store, $key, $this->paymentCode, 'checkout');
    }

    /**
     * Getting back the checkout flag value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getKlarnaFlagValue(StoreInterface $store, string $key): bool
    {
        return $this->getFlagValue($store, $key, $this->paymentCode, 'klarna');
    }

    /**
     * Getting back the flag value
     *
     * @param StoreInterface $store
     * @param string $key
     * @param string $paymentCode
     * @param string $scope
     * @return bool
     * @SuppressWarnings(PHPMD.BooleanGetMethodName)
     */
    public function getFlagValue(StoreInterface $store, string $key, string $paymentCode, string $scope): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            sprintf($scope . '/' . $paymentCode . '/%s', $key),
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * Getting back the payment content value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return string
     */
    public function getPaymentContentValue(StoreInterface $store, string $key): string
    {
        return $this->getContentValue($store, 'payment', $this->paymentCode, $key);
    }

    /**
     * Getting back the checkout content value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return string
     */
    public function getCheckoutContentValue(StoreInterface $store, string $key): string
    {
        return $this->getContentValue($store, 'checkout', $this->paymentCode, $key);
    }

    /**
     * Getting back the checkout content value
     *
     * @param StoreInterface $store
     * @param string $key
     * @return string
     */
    public function getKlarnaContentValue(StoreInterface $store, string $key): string
    {
        return $this->getContentValue($store, 'klarna', $this->paymentCode, $key);
    }

    /**
     * Getting back the content value
     *
     * @param StoreInterface $store
     * @param string $key
     * @param string $paymentCode
     * @param string $scope
     * @return string
     */
    private function getContentValue(
        StoreInterface $store,
        string $key,
        string $paymentCode,
        string $scope
    ): string {
        return (string) $this->scopeConfig->getValue(
            sprintf($key . '/' . $paymentCode . '/%s', $scope),
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * Generating a array result based on the string input
     *
     * @param string $input
     * @return array
     */
    public function generateArrayResult(string $input): array
    {
        if ($input === '') {
            return [];
        }

        return explode(',', $input);
    }

    /**
     * Getting back the config value
     *
     * @param StoreInterface $store
     * @param string $path
     * @return string
     */
    public function getConfigValue(StoreInterface $store, string $path): string
    {
        return (string) $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * Returns true if the flag is set
     *
     * @param StoreInterface $store
     * @param string $path
     * @return bool
     */
    public function isFlagSet(StoreInterface $store, string $path): bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            $path,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }
}
