<?php

/**
 * Description of SmartyHtmlSelectPlugin
 *
 * @author Thom
 */
class SmartyHtmlSelectPlugin {

    /**
     * @param array $params
     * @param Smarty $smarty
     */
    public function htmlSelect($params, $smarty) {
       
        $htmlSelect = "";
        
        if(isset($params["name"]) && isset($params["list"]) && is_array($params["list"])) {
            $htmlSelect = "<select name=\"".$params["name"]."\" ";
            
            if(isset($params["id"])) {
                $htmlSelect .= "id=\"".$params["id"]."\" ";
            }
            
            $htmlSelect .= ">";
            
            $selected = "";
            $value = $smarty->getTemplateVars($params["name"]);
            
            if(isset($value)) {
                $selected = $value;
            }
            
            foreach($params["list"] as $option) {
                $htmlSelect .= "<option ";
                
                if(is_array($option)) {
                    $htmlSelect .= "value=\"".$option[0]."\" ";
                    
                    if($option[0] !== "" && $option[0] == $selected) {
                        $htmlSelect .= "selected=\"selected\" ";
                    }
                    
                    $htmlSelect .= ">".$option[1];
                }
                else {
                    if($option !== "" && $option == $selected) {
                        $htmlSelect .= "selected=\"selected\" ";
                    }
                    
                    $htmlSelect .= ">".$option;
                }
                
                $htmlSelect .= "</option>";
            }
            
            $htmlSelect .= "</select>";
        }
        
        return $htmlSelect;
    }

}

?>
