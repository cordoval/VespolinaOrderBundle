<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\OrderBundle\Model;

use Symfony\Component\DependencyInjection\Container;

use Vespolina\OrderBundle\Document\SalesOrder;
use Vespolina\OrderBundle\Document\SalesOrderItem;
use Vespolina\OrderBundle\Model\SalesOrderInterface;
use Vespolina\OrderBundle\Model\SalesOrderManagerInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
class SalesOrderManager {

    public function create($orderType = 'default')
    {

        return new SalesOrder();

    }

    public function createItem(SalesOrderInterface $salesOrder) {

       $salesOrderItem = new SalesOrderItem();

       $salesOrder->addItem($salesOrderItem);
        
       return $salesOrderItem;
    }

    public function save(SalesOrderInterface $salesOrder) {

    }
}
