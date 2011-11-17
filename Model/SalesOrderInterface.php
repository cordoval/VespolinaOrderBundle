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
    public function addItem(SalesOrderItemInterface $item);

    public function getCustomer();

    public function getItems();
}