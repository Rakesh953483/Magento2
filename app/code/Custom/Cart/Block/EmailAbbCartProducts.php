<?php

namespace Custom\Cart\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Block\Product\ListProduct;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
// use Magento\Checkout\Model\Cart;
use Magento\Checkout\Model\Session as CheckoutSession;

class EmailAbbCartProducts extends Template
{
    protected $cart;

    public function __construct(
        Template\Context $context,
        CheckoutSession $checkoutSession,
        CollectionFactory $productCollectionFactory,
        ListProduct $listProductBlock,
        // Cart $cart,
        array $data = []
    ) {
        // $this->cart = $cart;
        $this->checkoutSession = $checkoutSession;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->listProductBlock = $listProductBlock;
        parent::__construct($context, $data);
    }

    public function getCartItems()
    {
        // return $this->cart->getQuote()->getAllVisibleItems();
        return $this->checkoutSession->getQuote()->getItemsSummaryQty();
    }
    public function getProductCollection()
    {
        /** @var $collection \Magento\Catalog\Model\ResourceModel\Product\Collection */
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*')->load();
        return $collection;
    }
    public function getAddToCartPostParams($product)
    {
        return $this->listProductBlock->getAddToCartPostParams($product);
    }
}
