<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\OrderBundle\Model;

use Vespolina\OrderBundle\Model\PaymentAgreementInterface;
use Vespolina\OrderBundle\Model\SalesOrderInterface;
use Vespolina\OrderBundle\Model\SalesOrderItemInterface;
use Vespolina\PricingBundle\Model\PricingSetInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class SalesOrder implements SalesOrderInterface
{
    protected $createdAt;
    protected $customer;
    protected $items;
    protected $orderDate;
    protected $orderStatus;
    protected $paymentAgreement;
    protected $pricingSet;
    protected $updatedAt;

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

    public function getOrderDate()
    {

        return $this->orderDate;
    }

    public function getOrderStatus()
    {

        return $this->orderDate;
    }

    public function getPaymentAgreement()
    {

        return $this->paymentAgreement;
    }

    /**
     * @inheritdoc
     */
    public function getPricingSet()
    {

        return $this->pricingSet;
    }

    public function incrementCreatedAt()
    {
        if (null === $this->createdAt) {
            $this->createdAt = new \DateTime();
        }
        $this->updatedAt = new \DateTime();
    }

    public function incrementUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }

    
    public function setCustomer($customer)
    {

        $this->customer = $customer;
    }

    public function setOrderDate($orderDate)
    {

        $this->orderDate = $orderDate;
    }

    public function setOrderStatus($orderStatus)
    {

        $this->orderStatus = $orderStatus;
    }
    

    public function setPaymentAgreement(PaymentAgreementInterface $paymentAgreement)
    {

        $this->paymentAgreement = $paymentAgreement;
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