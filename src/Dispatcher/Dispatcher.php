<?php
namespace Pablop\Module\Carouselticker\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\DispatcherInterface;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Application\CMSApplicationInterface;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Pablop\Module\Carouselticker\Site\Helper\CarouseltickerHelper;

class Dispatcher implements DispatcherInterface
{
    protected $module;
    
    protected $app;

    public function __construct(\stdClass $module, CMSApplicationInterface $app, Input $input)
    {
        $this->module = $module;
        $this->app = $app;
    }
    public function dispatch()
    {
        $language = $this->app->getLanguage();
        $language->load('mod_carouselticker', JPATH_BASE . '/modules/mod_carouselticker');

        $params = new Registry($this->module->params);

        require ModuleHelper::getLayoutPath('mod_carouselticker');
    }
}