<?php
namespace Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryUrlCommand;

/**
 * Interceptor class for @see \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryUrlCommand
 */
class Interceptor extends \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryUrlCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\State $state, \Elgentos\RegenerateCatalogUrls\Service\RegenerateProductUrl $regenerateProductUrl, \Symfony\Component\Console\Helper\QuestionHelper $questionHelper, \Magento\CatalogUrlRewrite\Model\CategoryUrlRewriteGenerator $categoryUrlRewriteGenerator, \Magento\UrlRewrite\Model\UrlPersistInterface $urlPersist, \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory, \Magento\Store\Model\App\Emulation $emulation)
    {
        $this->___init();
        parent::__construct($storeManager, $state, $regenerateProductUrl, $questionHelper, $categoryUrlRewriteGenerator, $urlPersist, $categoryCollectionFactory, $emulation);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}
