# Extends order with newsletter signup
[![Build Status](https://travis-ci.org/fond-of/spryker-category.svg?branch=master)](https://travis-ci.org/fond-of-spryker/sales-newsletter-signup)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/sales-newsletter-signup)

## Installation

```
composer require fond-of-spryker/sales-newsletter-signup
```

####Register
```
CustomerIpQuoteTransferExpanderPlugin() in QuoteDependencyProvider => getQuoteTransferExpanderPlugins()
```
```
NewsletterSignupOrderExpanderPlugin() in SalesDependencyProvider => getOrderExpanderPreSavePlugins()
```
