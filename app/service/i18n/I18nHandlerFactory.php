<?php

/**
 * Description of I18nHandlerFactory
 *
 * @author Thom
 */
class I18nHandlerFactory {
    
    private static $i18nHandler;
    
    /**
     * @return I18nHandler
     */
    public static function getI18nHandler() {
        
        if(self::$i18nHandler === null) {
            self::$i18nHandler = new ArrayI18nHandler();
        }
        
        return self::$i18nHandler;
    }
    
}

?>
