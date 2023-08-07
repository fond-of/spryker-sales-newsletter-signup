<?php

namespace FondOfSpryker\Zed\SalesNewsletterSignup\Communication\Plugin\CheckoutRestApi;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\CheckoutRestApiExtension\Dependency\Plugin\QuoteMapperPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\SalesNewsletterSignup\Communication\SalesNewsletterSignupCommunicationFactory getFactory()
 */
class CustomerHashCheckoutQuoteMapPlugin extends AbstractPlugin implements QuoteMapperPluginInterface
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
        if ($customer && $customer->getEmail()) {
            $quoteTransfer->setUserHash($this->getFactory()->getNewsletterService()->getHash($customer->getEmail()));
        }

        return $quoteTransfer;
    }
}
