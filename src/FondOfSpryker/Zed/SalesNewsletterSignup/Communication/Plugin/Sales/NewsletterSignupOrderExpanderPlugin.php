<?php

namespace FondOfSpryker\Zed\SalesNewsletterSignup\Communication\Plugin\Sales;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Sales\Dependency\Plugin\OrderExpanderPreSavePluginInterface;

class NewsletterSignupOrderExpanderPlugin implements OrderExpanderPreSavePluginInterface
{
    /**
     * Specification:
     *   - Its a plugin which hydrates SpySalesOrderEntityTransfer before order created
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\SpySalesOrderEntityTransfer $spySalesOrderEntityTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\SpySalesOrderEntityTransfer
     */
    public function expand(SpySalesOrderEntityTransfer $spySalesOrderEntityTransfer, QuoteTransfer $quoteTransfer): SpySalesOrderEntityTransfer
    {
        $spySalesOrderEntityTransfer->setSignupNewsletter($quoteTransfer->getSignupNewsletter());
        if ($quoteTransfer->getSignupNewsletter() === true){
            $spySalesOrderEntityTransfer->setIp($quoteTransfer->getIp());
            $spySalesOrderEntityTransfer->setOptInUrl($quoteTransfer->getOptInUrl());
            $spySalesOrderEntityTransfer->setOptOutUrl($quoteTransfer->getOptOutUrl());
        }

        return $spySalesOrderEntityTransfer;
    }
}
