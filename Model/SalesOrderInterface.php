<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
 
namespace Vespolina\OrderBundle\Model;

use Vespolina\PricingBundle\Model\PriceableInterface;
use Vespolina\OrderBundle\Model\SalesOrderItemInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
interface SalesOrderInterface extends PriceableInterface
{

    function addItem(SalesOrderItemInterface $item);

    function getCustomer();

    function getItems();

    function getOrderDate();

    function getPaymentAgreement();

    function setCustomer($customer);

    function setOrderDate($orderDate);

    function setOrderStatus($orderStatus);

    function setPaymentAgreement(PaymentAgreementInterface $paymentAgreement);
}