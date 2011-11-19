<?php

/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\OrderBundle\Model;

use Vespolina\OrderBundle\Model\PaymentAgreementInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class PaymentAgreement implements PaymentAgreementInterface
{
    protected $paymentType;

    /**
     * @inheritdoc
     */
    function getPaymentType()
    {

        return $this->paymentTYpe;
    }


    /**
     * @inheritdoc
     */
    function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

}