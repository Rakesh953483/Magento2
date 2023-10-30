<?php
namespace Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryPathCommand;

/**
 * Interceptor class for @see \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryPathCommand
 */
class Interceptor extends \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateCategoryPathCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\State $state, \Elgentos\RegenerateCatalogUrls\Service\RegenerateProductUrl $regenerateProductUrl, \Symfony\Component\Console\Helper\QuestionHelper $questionHelper, \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory, \Magento\Framework\EntityManager\EventManager $eventManager, \Magento\Store\Model\App\Emulation $emulation)
    {
        $this->___init();
        parent::__construct($storeManager, $state, $regenerateProductUrl, $questionHelper, $categoryCollectionFactory, $eventManager, $emulation);
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
