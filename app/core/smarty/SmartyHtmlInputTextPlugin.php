<?php

/**
 * Description of SmartyHtmlInputTextPlugin
 *
 * @author Thom
 */
class SmartyHtmlInputTextPlugin {
    
    /**
     * @param array $params
     * @param Smarty $smarty
     */
    public function htmlInputText($params, $smarty) {
        
        $htmlInput = "";
        
        if(isset($params["name"])) {
            $htmlInput = "<input type=\"text\" name=\"".$params["name"]."\" ";
            
            if(isset($params["id"])) {
                $htmlInput .= "id=\"".$params["id"]."\" ";
            }
            
            $value = $smarty->getTemplateVars($params["name"]);
            
            if(isset($value)) {
                $htmlInput .= "value=\"".htmlspecialchars($value)."\" ";
            }
            
            if(isset($params["placeholderKey"])) {
                $i18nHandler = I18nHandlerFactory::getI18nHandler();
                $htmlInput .= "placeholder=\"".htmlspecialchars($i18nHandler->getText($params["placeholderKey"]))."\" ";
            }
            
            $htmlInput .= "/>";
        }
        
        return $htmlInput;
    }
}

?>
