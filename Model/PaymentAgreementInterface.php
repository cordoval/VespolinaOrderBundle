<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\OrderBundle\Model;

use Vespolina\PricingBundle\Model\PriceableInterface;
use Vespolina\ProductBundle\Model\ProductInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
interface PaymentAgreementInterface
{

    /**
     * Payment type such as "paypal", "credit card", ...
     *
     * @abstract
     * @return string
     */
    function getPaymentType();

    function getPaymentState();

    function setPaymentType($paymentType);

    function setPaymentState($paymentState);
}