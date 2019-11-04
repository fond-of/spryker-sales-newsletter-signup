<?php

namespace FondOfSpryker\Client\SalesNewsletterSignup\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Quote\Dependency\Plugin\QuoteTransferExpanderPluginInterface;

/**
 * @method \FondOfSpryker\Client\SalesNewsletterSignup\PriceFactory getFactory()
 */
class CustomerOptInOutUrlQuoteTransferExpanderPlugin extends AbstractPlugin implements QuoteTransferExpanderPluginInterface
{
    /**
     * @param  \Generated\Shared\Transfer\QuoteTransfer  $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expandQuote(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->setOptInUrl($this->getOptInUrl());
        $quoteTransfer->setOptOutUrl($this->getOptOut());

        return $quoteTransfer;
    }

    /**
     * @return string|null
     */
    protected function getOptInUrl(): ?string
    {
        return '';
    }

    /**
     * @return string|null
     */
    protected function getOptOut(): ?string
    {
        return '';
    }
}
