<?php

namespace Custom\ProductRating\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class ProductRating extends Template
{
    protected $productRepository;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productRepository = $productRepository;
    }

    public function getProductRating($productId)
    {
        $product = $this->productRepository->getById($productId);
        return $product->getRatingSummary();
    }
}
