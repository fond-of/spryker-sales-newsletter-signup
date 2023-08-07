<?php

namespace FondOfSpryker\Zed\SalesNewsletterSignup;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class SalesNewsletterSignupDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_NEWSLETTER = 'SERVICE_NEWSLETTER';
    public const FACADE_STORE = 'FACADE_STORE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addNewsletterService($container);
        $container = $this->addStoreFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addNewsletterService(Container $container)
    {
        $container[static::SERVICE_NEWSLETTER] = function (Container $container) {
            return $container->getLocator()->newsletter()->service();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStoreFacade(Container $container)
    {
        $container[static::FACADE_STORE] = function (Container $container) {
            return $container->getLocator()->store()->facade();
        };

        return $container;
    }
}
