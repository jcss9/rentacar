<?php

/**
 * Main plugin class.
 *
 * @package     wp4me-title-remover
 * @category    Core
 * @author      Daryl Peterson (@gmail)
 * @license     https://opensource.org/licenses/MIT
 */

namespace WP4Me_Title_Remover;

if (!defined('ABSPATH') | (!defined(__NAMESPACE__ . '\PLUGIN_INIT'))) {
    exit;
}

/**
 * Plugin Object
 */
class Plugin
{

    /**
     * Initialize Hooks
     *
     * @return void
     */
    public function init()
    {
        
        Version::init();
        if (!Version::isCompatible()) {
            return;
        }
        
        add_action('init', array($this, 'register'));
        add_action('plugins_loaded', array($this, 'loaded'));
        Logger::write('ADD INIT ACTION', __CLASS__, __FUNCTION__,__LINE__);
    }


    /**
     * Register Hooks
     */
    public function register()
    {
        TitleRemover::run();
        if (is_admin()) {
            register_activation_hook(PLUGIN_FILE, array($this, 'activate'));
            register_deactivation_hook(PLUGIN_FILE, array($this, 'deactivate'));
        }
    }
    /**
     * Activate callback
     */
    public function activate($network_wide)
    {
        Logger::write(['ACTIVATED' => PLUGIN_FILE], __CLASS__, __FUNCTION__, __LINE__);
    }
    /**
     * Deactivate callback
     */
    public function deactivate()
    {
        Logger::write(['DEACTIVATED' => PLUGIN_FILE], __CLASS__, __FUNCTION__, __LINE__);
    }

    public function loaded()
    {

        if (class_exists('\\WP4Me_Template_Sniffer\\TemplateSniffer')) {
            \WP4Me_Template_Sniffer\TemplateSniffer::enable();
            $key_name = \WP4Me_Template_Sniffer\TemplateSniffer::getAction('finish');
            add_action($key_name, [$this, 'sniffed']);
            Logger::write("SNIFFER ENABLED : $key_name", __CLASS__, __FUNCTION__);
        } else {
            Logger::write("SNIFFER DISABLED", __CLASS__, __FUNCTION__);
        }
    }

    public function sniffed($data){
        Logger::write($data, __CLASS__, __FUNCTION__,__LINE__);
    }
}
