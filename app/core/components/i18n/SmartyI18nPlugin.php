<?php

/**
 * Description of SmartyI18nPlugin
 *
 * @author Thom
 */
class SmartyI18nPlugin {
    
    private $i18nHandler;
    private $logger;
    private $standardLang;
    
    public function __construct() {
        $this->i18nHandler = I18nHandlerFactory::getI18nHandler();
        $this->logger = Logger::getLogger("main");
        $this->standardLang = "de";
    }
    
    public function i18nLabel($params, $smarty) {
        
        $currentLanguage = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
        
        $text = "";
        
        if(!in_array($currentLanguage, $this->i18nHandler->supportedLanguages())){
            
            $currentLanguage = $this->standardLang;
            $this->logger->warn("client lang (".$currentLanguage.") not supported. Switched to ".$this->standardLang);
        }
           
        if(isset($params["key"]) && !empty($params["key"])) {
            $text = $this->i18nHandler->getText($params["key"], $currentLanguage);
        }
        
        return $text;
    }
}

?>
