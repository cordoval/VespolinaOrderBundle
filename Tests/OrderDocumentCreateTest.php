<?php

namespace Vespolina\OrderBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Vespolina\OrderBundle\Model\SalesOrderManager;

class OrderDocumentCreateTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = $this->createClient();
    }

    public function getKernel(array $options = array())
    {
        if (!self::$kernel) {
            self::$kernel = $this->createKernel($options);
            self::$kernel->boot();
        }

        return self::$kernel;
    }

    /**
     * @covers Vespolina\OrderBundle\Service\OrderService::create
     */
    public function testSalesOrderCreate()
    {

        //$salesOrderService = $this->getKernel()->getContainer()->get('vespolina.order_manager');
        $salesOrderManager = new SalesOrderManager();


        $salesOrder = $salesOrderManager->create();
        $salesOrderItem1 = $salesOrderManager->createItem($salesOrder);

        $productA = $this->getMockForAbstractClass('Vespolina\ProductBundle\Model\Product');
        $productB = $this->getMockForAbstractClass('Vespolina\ProductBundle\Model\Product');

        $salesOrderItem1->setProduct($productA);
        $salesOrderItem1->setOrderedQuantity(10);

        $this->assertEquals(count($salesOrder->getItems()), 1);
        $this->assertEquals(($salesOrderItem1->getOrderedQuantity()), 10);

        $salesOrderItem2 = $salesOrderManager->createItem($salesOrder);
        $salesOrderItem2->setProduct($productB);
        $salesOrderItem2->setOrderedQuantity(5);

        $this->assertEquals(count($salesOrder->getItems()), 2);
        $this->assertEquals(($salesOrderItem2->getOrderedQuantity()), 5);

        $salesOrder->setPaymentType('COD');  //Cash On delivery
        $salesOrderManager->save($salesOrder);
    }
}