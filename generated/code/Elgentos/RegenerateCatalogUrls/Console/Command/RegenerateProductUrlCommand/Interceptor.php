<?php
namespace Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateProductUrlCommand;

/**
 * Interceptor class for @see \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateProductUrlCommand
 */
class Interceptor extends \Elgentos\RegenerateCatalogUrls\Console\Command\RegenerateProductUrlCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\State $state, \Elgentos\RegenerateCatalogUrls\Service\RegenerateProductUrl $regenerateProductUrl, \Symfony\Component\Console\Helper\QuestionHelper $questionHelper)
    {
        $this->___init();
        parent::__construct($storeManager, $state, $regenerateProductUrl, $questionHelper);
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
