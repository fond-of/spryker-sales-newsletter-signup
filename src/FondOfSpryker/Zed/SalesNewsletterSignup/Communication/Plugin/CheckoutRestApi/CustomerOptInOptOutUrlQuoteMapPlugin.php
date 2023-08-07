<?php

namespace FondOfSpryker\Zed\SalesNewsletterSignup\Communication\Plugin\CheckoutRestApi;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\CheckoutRestApiExtension\Dependency\Plugin\QuoteMapperPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Client\SalesNewsletterSignup\SalesNewsletterSignupFactory getFactory()
 */
class CustomerOptInOptOutUrlQuoteMapPlugin extends AbstractPlugin implements QuoteMapperPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function map(RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer, QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        $customer = $restCheckoutRequestAttributesTransfer->getCustomer();
        if ($restCheckoutRequestAttributesTransfer->getSignupNewsletter() === true && $customer && $customer->getEmail()) {
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
