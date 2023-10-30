<?php
namespace Elgentos\RegenerateCatalogUrls\Controller\Adminhtml\Action\Product;

/**
 * Interceptor class for @see \Elgentos\RegenerateCatalogUrls\Controller\Adminhtml\Action\Product
 */
class Interceptor extends \Elgentos\RegenerateCatalogUrls\Controller\Adminhtml\Action\Product implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory, \Magento\Ui\Component\MassAction\Filter $filter, \Elgentos\RegenerateCatalogUrls\Service\RegenerateProductUrl $regenerateProductUrl, \Magento\Backend\App\Action\Context $context)
    {
        $this->___init();
        parent::__construct($collectionFactory, $filter, $regenerateProductUrl, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function execute() : \Magento\Framework\Controller\Result\Redirect
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
