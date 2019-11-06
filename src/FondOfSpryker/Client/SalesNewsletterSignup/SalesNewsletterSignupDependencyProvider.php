<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace FondOfSpryker\Client\SalesNewsletterSignup;

use Spryker\Client\SalesNewsletterSignup\Dependency\Client\SalesNewsletterSignupToLocaleBridge;
use Spryker\Client\SalesNewsletterSignup\Dependency\Client\SalesNewsletterSignupToStorageBridge;
use Spryker\Client\SalesNewsletterSignup\Dependency\Client\SalesNewsletterSignupToZedRequestClientBridge;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class SalesNewsletterSignupDependencyProvider extends AbstractDependencyProvider
{
    public const SERVICE_NEWSLETTER = 'SERVICE_NEWSLETTER';
    public const FACADE_STORE = 'FACADE_STORE';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addNewsletterService($container);
        $container = $this->addStoreFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addNewsletterService(Container $container)
    {
        $container[static::SERVICE_NEWSLETTER] = function (Container $container) {
            return $container->getLocator()->newsletter()->service();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addStoreFacade(Container $container)
    {
        $container[static::FACADE_STORE] = function (Container $container) {
            return $container->getLocator()->store()->facade();
        };

        return $container;
    }
}
