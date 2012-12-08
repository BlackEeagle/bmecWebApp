<?php

/**
 * Description of SmartyBmec
 *
 * @author Thom
 */
class SmartyBmec extends Smarty {

    public function __construct() {
        parent::__construct();

        $this->setTemplateDir('smarty/templates');
        $this->setCompileDir('smarty/templates_c');
        $this->setCacheDir('smarty/cache');
        $this->setConfigDir('smarty/configs');
        
        $this->assign("appName", "BMEC WebApp");
        
        $this->registerPlugin("function", "i18nLabel", array(new SmartyI18nPlugin(), "i18nLabel"));
    }

}

?>
