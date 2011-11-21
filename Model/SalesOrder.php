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
    protected $customerComment;
    protected $items;
    protected $orderDate;
    protected $orderState;
    protected $paymentAgreement;
    protected $pricingSet;
    protected $updatedAt;

    public function __construct()
    {

        $this->documentIdentifications = array();
    }


    /**
     * @inheritdoc
     */
    public function addItem(SalesOrderItemInterface $item) {

        $this->items[] = $item;

        $item->setItemNumber(count($this->items));

    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {

        return $this->createdAt;
    }
    
    /**
     * @inheritdoc
     */
    public function getCustomer()
    {

        return $this->customer;
    }
    
    /**
     * @inheritdoc
     */
    public function getCustomerComment()
    {

        return $this->customerComment;
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {

        return $this->items;

    }

    /**
     * @inheritdoc
     */
    public function getOrderDate()
    {

        return $this->orderDate;
    }

    /**
     * @inheritdoc
     */
    public function getOrderState()
    {

        return $this->orderState;
    }

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {

        return $this->updatedAt;
    }


    /**
     * @inheritdoc
     */
    public function incrementCreatedAt()
    {
        if (null === $this->createdAt) {
            $this->createdAt = new \DateTime();
        }
        $this->updatedAt = new \DateTime();
    }

    /**
     * @inheritdoc
     */
    public function incrementUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }


    /**
     * @inheritdoc
     */
    public function setCustomer($customer)
    {

        $this->customer = $customer;
    }


    /**
     * @inheritdoc
     */
    public function setCustomerComment($customerComment)
    {

        $this->customerComment = $customerComment;
    }


    public function setItemNumber($itemNumber)
    {

        $this->itemNumber = $itemNumber;
    }


    /**
     * @inheritdoc
     */
    public function setOrderDate($orderDate)
    {

        $this->orderDate = $orderDate;
    }


    /**
     * @inheritdoc
     */
    public function setOrderState($orderState)
    {

        $this->orderState = $orderState;
    }
    

    /**
     * @inheritdoc
     */
    public function setPaymentAgreement(PaymentAgreementInterface $paymentAgreement)
    {

        $this->paymentAgreement = $paymentAgreement;
    }

    /**
     * @inheritdoc
     */
    public function setPricingSet($pricingSet)
    {

        $this->pricingSet = $pricingSet;
    }

}