<?php

/**
 * Description of I18nHandler
 *
 * @author Thom
 */
class I18nHandler implements I18nHandler {

    private $texts = null;
    private $log;
    private static $instance = null;

    public function getInstance() {
        if(self::$instance === null){
            self::$instance = new I18nHandler();
        }
    }
    
    private function __construct() {
        $this->generateTexts();
    }
    
    public function supportedLanguages() {
        return array("de");
    }

    private function generateTexts() {

        if ($this->texts === null) {
            $this->texts = array(
                "bmecWebApp" => array(
                    "title" => array(
                        "de" => "BMEC WebApp"
                    ),
                    "bmec" => array(
                        "de" => "BMEC"
                    ),
                    "login" => array(
                        "de" => "Login"
                    )
                ),
                "fzInventar" => array(
                    "topNavigation" => array(
                        "de" => "Fahrzeug-Inventar"
                    ),
                    "sideNavigation" => array(
                        "title" => array(
                            "de" => "FAHRZEUG-INVENTAR"
                        ),
                        "start" => array(
                            "de" => "Start"
                        )
                    ),
                    "start" => array(
                        "title" => array(
                            "de" => "Hello world"
                        ),
                        "text" => array(
                            "de" => "foobar"
                        )
                    )
                )
            );
        }
    }

    public function getText($key, $lang, $default) {
        
    }

}

?>
