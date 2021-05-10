<?php

namespace WP4Me_Title_Remover;

/**
 * Check plugin version requirements
 */
class Version
{

    protected static $phpMin = PLUGIN_VER_PHP;
    protected static $wpMin = PLUGIN_VER_WP;

    public static function init()
    {
        $obj = new Version();

        if (!is_admin()){
            return;
        }
        add_action('admin_init', [$obj, 'ckVersion']);
        register_activation_hook(__FILE__, [$obj, 'ckActivation']);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function ckActivation()
    {
        Logger::write('ACTIVATION CHECK', __CLASS__, __FUNCTION__);
        if (!self::isCompatible()) {
            deactivate_plugins(plugin_basename(PLUGIN_FILE));

            $message = $this->getNotice();
            wp_die($message);
        }
    }

    public function ckVersion()
    {
        Logger::write('VERSION CHECK', __CLASS__, __FUNCTION__);
        if (self::isCompatible()) {
            return;
        }

        if (!is_plugin_active(plugin_basename(PLUGIN_FILE))) {
            return;
        }
        deactivate_plugins(plugin_basename(PLUGIN_FILE));
        add_action('admin_notices', [$this, 'showNotice']);
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }


    public function getNotice()
    {
        $message = sprintf(
            __('%s requires WP %s PHP %s ', PLUGIN_DOMAIN),
            PLUGIN_NAME,
            self::$wpMin,
            self::$phpMin
        );
        $name = PLUGIN_NAME;
        $html = <<<EOD
<div class="notice notice-error">
<h3>$name</h3>
<p>$message</p>
</div>
EOD;

        return $html;
    }

    public function showNotice()
    {
        $notice = $this->getNotice();
        $name = PLUGIN_NAME;
        echo $this->getNotice();
    }

    /**
     * Check compatiblity
     *
     * @return boolean
     */
    public static function isCompatible()
    {
        if (!self::isWPValid()) {
            return false;
        }

        if (!self::isPhpValid()) {
            return false;
        }
        return true;
    }

    public static function isPhpValid()
    {
        if (version_compare(phpversion(), self::$phpMin, '>=')) {
            return true;
        }
        return false;
    }

    public static function isWPValid()
    {
        if (version_compare($GLOBALS['wp_version'], self::$wpMin, '>=')) {
            return true;
        }
        return false;
    }
}
