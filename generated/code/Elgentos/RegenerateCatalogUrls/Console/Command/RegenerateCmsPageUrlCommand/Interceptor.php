<?php
namespace Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCmsPageUrlCommand;

/**
 * Interceptor class for @see \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCmsPageUrlCommand
 */
class Interceptor extends \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCmsPageUrlCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\State $state, \Elgentos\RegenerateCatalogUrls\Service\RegenerateProductUrl $regenerateProductUrl, \Symfony\Component\Console\Helper\QuestionHelper $questionHelper, \Magento\Store\Model\App\Emulation $emulation, \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $pageCollectionFactory, \Magento\UrlRewrite\Model\UrlPersistInterface $urlPersist, \Magento\CmsUrlRewrite\Model\CmsPageUrlRewriteGenerator $cmsPageUrlRewriteGenerator)
    {
        $this->___init();
        parent::__construct($storeManager, $state, $regenerateProductUrl, $questionHelper, $emulation, $pageCollectionFactory, $urlPersist, $cmsPageUrlRewriteGenerator);
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
