<?php
namespace FondOfSpryker\Zed\SalesNewsletterSignup\Communication;

use FondOfSpryker\Service\Newsletter\NewsletterServiceInterface;
use FondOfSpryker\Zed\SalesNewsletterSignup\SalesNewsletterSignupDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class SalesNewsletterSignupCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Service\Newsletter\NewsletterServiceInterface
     */
    public function getNewsletterService(): NewsletterServiceInterface
    {
        return $this->getProvidedDependency(SalesNewsletterSignupDependencyProvider::SERVICE_NEWSLETTER);
    }
}
