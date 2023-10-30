<?php
namespace Custom\Cart\Controller\AddToCart;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Model\Cart;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class Index extends Action
{
    protected $jsonResultFactory;
    protected $cart;
    protected $productRepository;

    public function __construct(
        Context $context,
        JsonFactory $jsonResultFactory,
        Cart $cart,
        ProductRepositoryInterface $productRepository
    ) {
        parent::__construct($context);
        $this->jsonResultFactory = $jsonResultFactory;
        $this->cart = $cart;
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        $productId = $this->getRequest()->getParam('product_id');
        $quantity = $this->getRequest()->getParam('quantity');

        $response = ['success' => false, 'message' => 'Product not added to cart'];

        if ($productId && $quantity) {
            try {
                $product = $this->productRepository->getById($productId);
                $this->cart->addProduct($product, ['qty' => $quantity]);
                $this->cart->save();
                $response = ['success' => true, 'message' => 'Product added to cart'];
            } catch (\Exception $e) {
                $response = ['success' => false, 'message' => $e->getMessage()];
            }
        }

        $resultJson = $this->jsonResultFactory->create();
        return $resultJson->setData($response);
    }
}
