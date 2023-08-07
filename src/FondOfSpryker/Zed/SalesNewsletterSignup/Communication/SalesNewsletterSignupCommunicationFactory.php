<?php
namespace FondOfSpryker\Zed\SalesNewsletterSignup\Communication;

use FondOfSpryker\Service\Newsletter\NewsletterServiceInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class SalesNewsletterSignupCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Service\Newsletter\NewsletterServiceInterface
     */
    public function getNewsletterService(): NewsletterServiceInterface
    {
        return $this->getProvidedDependency(\FondOfSpryker\Client\SalesNewsletterSignup\SalesNewsletterSignupDependencyProvider::SERVICE_NEWSLETTER);
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
