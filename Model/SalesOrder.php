<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\OrderBundle\Model;

use Vespolina\OrderBundle\Model\SalesOrderInterface;
use Vespolina\PricingBundle\Model\PricingSetInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class SalesOrder implements SalesOrderInterface
{
    protected $customer = null;
    protected $paymentType;
    protected $pricingSet = null;
    protected $items;

    public function __construct()
    {

        $this->documentIdentifications = array();
    }

    public function addItem(SalesOrderItemInterface $item) {

        $this->items[] = $item;
    }


    /**
     * Get the (primary) customer for this order
     */
    public function getCustomer()
    {

        return $this->customer;
    }

    public function getItems()
    {

        return $this->items;
    }

    public function getPaymentType()
    {

        return $this->paymentType;
    }

    /**
     * @inheritdoc
     */
    public function getPricingSet()
    {

        return $this->pricingSet;
    }

    public function setPaymentType($paymentType)
    {

        $this->paymentType = $paymentType;
    }
    /**
     * @inheritdoc
     */
    public function setPricingSets($pricingSet)
    {
        $this->pricingSet = $pricingSet;
    }

    /**
     * @inheritdoc
     */
    public function getPricingSets()
    {

        //A typical order has only one pricing set
        return array($this->pricingSet);
    }

    /**
     * @inheritdoc
     */
    public function addPricingSet(PricingSetInterface $pricingSet)
    {

        // A typical order has only one pricing set
        $this->setPricingSet($pricingSet);
    }
}