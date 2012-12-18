<?php

/**
 * Description of SmartyI18nPlugin
 *
 * @author Thom
 */
class SmartyI18nPlugin {

    private $i18nHandler;

    public function __construct() {
        $this->i18nHandler = I18nHandlerFactory::getI18nHandler();
    }

    /**
     * 
     * @param array $params
     * @param Smarty $smarty
     * @return string
     */
    public function i18nLabel($params, $smarty) {

        $text = "";

        if (isset($params["key"]) && !empty($params["key"])) {
            $text = $this->i18nHandler->getText($params["key"]);
        }

        return $text;
    }

}

?>
