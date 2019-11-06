<?php
namespace FondOfSpryker\Client\SalesNewsletterSignup;

use FondOfSpryker\Service\Newsletter\NewsletterServiceInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Store\Business\StoreFacadeInterface;

class SalesNewsletterSignupFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Service\Newsletter\NewsletterServiceInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getNewsletterService(): NewsletterServiceInterface
    {
        return $this->getProvidedDependency(SalesNewsletterSignupDependencyProvider::SERVICE_NEWSLETTER);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function getStore(): Store
    {
        return Store::getInstance();
    }

    /**
     * @return string
     */
    public function getCurrentLanguage(): string
    {
        return $this->getStore()->getCurrentLanguage();
    }
}
    
