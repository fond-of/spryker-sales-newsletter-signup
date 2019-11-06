<?php

namespace FondOfSpryker\Client\SalesNewsletterSignup\Plugin;

use FondOfSpryker\Service\Newsletter\NewsletterServiceInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Quote\Dependency\Plugin\QuoteTransferExpanderPluginInterface;
use Spryker\Shared\Kernel\Store;

/**
 * @method \FondOfSpryker\Client\SalesNewsletterSignup\SalesNewsletterSignupFactory getFactory()
 */
class CustomerOptInOutUrlQuoteTransferExpanderPlugin extends AbstractPlugin implements QuoteTransferExpanderPluginInterface
{
    public const NEWSLETTER = 'newsletter';
    public const TOKEN = 'token';
    
    /**
     * @param  \Generated\Shared\Transfer\QuoteTransfer  $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expandQuote(QuoteTransfer $quoteTransfer)
    {
        $customer = $quoteTransfer->getCustomer();
        if ($quoteTransfer->getSignupNewsletter() === true && $customer && $customer->getEmail()) {
            $newsletterService = $this->getFactory()->getNewsletterService();
            $params = [
                self::NEWSLETTER => sprintf('%s/%s', $this->getFactory()->getCurrentLanguage(), self::NEWSLETTER),
                self::TOKEN => sha1($customer->getEmail())
            ];

            $quoteTransfer->setOptInUrl($newsletterService->getOptInUrl($params));
            $quoteTransfer->setOptOutUrl($newsletterService->getOptOutUrl($params));
        }

        return $quoteTransfer;
    }
}
