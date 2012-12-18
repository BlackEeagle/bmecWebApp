<?php

/**
 *
 * @author Thom
 */
interface I18nHandler {
    
    public function supportedLanguages();
    
    public function getText($key, $default);
    
}

?>
