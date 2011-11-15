<?php

namespace Vespolina\OrderBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Vespolina\OrderBundle\Model\OrderDocument;
use Vespolina\DocumentBundle\Model\DocumentConfiguration;

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
    public function testOrderDocumentCreate()
    {
        $orderService = $this->getKernel()->getContainer()->get('vespolina.order_document');

        $orderDocumentConfiguration = $orderService->createDocumentConfiguration('generic_sales_order');
        $orderDocumentConfiguration->setName('sales_order_third_party');
        $orderDocumentConfiguration->setBaseClass('Vespolina\OrderBundle\Document\OrderDocument');
        $orderDocumentConfiguration->setItemBaseClass('Vespolina\OrderBundle\Document\OrderDocumentItem');

        
        $orderDocument = $orderService->createDocument($orderDocumentConfiguration);

        $orderDocumentItem1 = $orderService->createItem($orderDocument, $orderDocumentConfiguration);

        $productA = $this->getMockForAbstractClass('Vespolina\ProductBundle\Model\Product');
        $productB = $this->getMockForAbstractClass('Vespolina\ProductBundle\Model\Product');

        $orderDocumentItem1->setProduct($productA);
        $orderDocumentItem1->setOrderedQuantity(10);

        $this->assertEquals(count($orderDocument->getItems()), 1);
        $this->assertEquals(($orderDocumentItem1->getOrderedQuantity()), 10);

        $orderDocumentItem2 = $orderService->createItem($orderDocument, $orderDocumentConfiguration);
        $orderDocumentItem2->setProduct($productB);
        $orderDocumentItem2->setOrderedQuantity(5);

        $this->assertEquals(count($orderDocument->getItems()), 2);
        $this->assertEquals(($orderDocumentItem2->getOrderedQuantity()), 5);

        $orderDocument->setPaymentType('COD');  //Cash On delivery
        $orderService->saveDocument($orderDocument);
    }
}