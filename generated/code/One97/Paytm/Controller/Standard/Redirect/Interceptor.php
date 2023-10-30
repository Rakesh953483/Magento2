<?php
namespace One97\Paytm\Controller\Standard\Redirect;

/**
 * Interceptor class for @see \One97\Paytm\Controller\Standard\Redirect
 */
class Interceptor extends \One97\Paytm\Controller\Standard\Redirect implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Checkout\Model\Session $checkoutSession, \Magento\Sales\Model\OrderFactory $orderFactory, \Magento\Sales\Model\Order\Status\HistoryFactory $orderHistoryFactory, \One97\Paytm\Model\Paytm $paytmModel, \One97\Paytm\Helper\Data $paytmHelper, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\Framework\Json\Helper\Data $jsonHelper, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->___init();
        parent::__construct($context, $customerSession, $checkoutSession, $orderFactory, $orderHistoryFactory, $paytmModel, $paytmHelper, $logger, $resultJsonFactory, $jsonHelper, $resultPageFactory, $messageManager);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
