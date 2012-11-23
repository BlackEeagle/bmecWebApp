<?php

/**
 * Description of SmartyI18nPlugin
 *
 * @author Thom
 */
class SmartyI18nPlugin {
    
    public function i18nLabel($params, $smarty) {
        
        $currentLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    }
}

?>
