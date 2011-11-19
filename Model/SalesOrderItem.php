<?php

/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\OrderBundle\Model;

use Vespolina\OrderBundle\Model\SalesOrderItemInterface;
use Vespolina\ProductBundle\Model\ProductInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class SalesOrderItem implements SalesOrderItemInterface
{
    protected $createdAt;
    protected $updatedAt;
    protected $orderedQuantity;
    protected $pricingSet;
    protected $product;
    
    /**
     * @inheritdoc
     */
    function getOrderedQuantity()
    {

        return $this->orderedQuantity;
    }

    /**
     * @inheritdoc
     */
    function getProduct()
    {

        return $this->product;
    }

    /**
     * @inheritdoc
     */
    function setOrderedQuantity($orderedQuantity)
    {
        $this->orderedQuantity = $orderedQuantity;
    }

    /**
     * @inheritdoc
     */
    function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }
}