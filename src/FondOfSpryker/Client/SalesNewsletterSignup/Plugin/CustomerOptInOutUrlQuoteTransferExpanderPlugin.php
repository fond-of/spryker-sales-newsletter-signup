<?php

namespace FondOfSpryker\Client\SalesNewsletterSignup\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Quote\Dependency\Plugin\QuoteTransferExpanderPluginInterface;

/**
 * @method \FondOfSpryker\Client\SalesNewsletterSignup\SalesNewsletterSignupFactory getFactory()
 */
class CustomerOptInOutUrlQuoteTransferExpanderPlugin extends AbstractPlugin implements QuoteTransferExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expandQuote(QuoteTransfer $quoteTransfer)
    {
        $customer = $quoteTransfer->getCustomer();
        if ($quoteTransfer->getSignupNewsletter() === true && $customer && $customer->getEmail()) {
            $newsletterService = $this->getFactory()->getNewsletterService();
            $params = [
                'language' => $newsletterService->getLanguagePrefix(),
                $newsletterService->getNewsletterParamName() => $newsletterService->getNewsletterParamName(),
                $newsletterService->getNewsletterTokenParamName() => $newsletterService->getHash($customer->getEmail()),
            ];

            $quoteTransfer->setOptInUrl($newsletterService->getOptInUrl($params));
            $quoteTransfer->setOptOutUrl($newsletterService->getOptOutUrl($params));
        }

        return $quoteTransfer;
    }
}
