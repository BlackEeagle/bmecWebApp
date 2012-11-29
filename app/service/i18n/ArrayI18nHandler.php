<?php

/**
 * Description of I18nHandler
 *
 * @author Thom
 */
class ArrayI18nHandler implements I18nHandler {

    private $texts = null;
    private $log = null;
    
    public function __construct() {
        $this->generateTexts();
        $this->logger = Logger::getLogger("main");
    }
    
    /**
     * 
     * @return array
     */
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

    public function getText($key, $lang = "de", $default = null) {
        
        if($default === null) {
            $default = "!! ".$key." !!";
        }
        
        $langArr = ArrayUtil::dot($this->texts, $key);
        
        if(isset($langArr[$lang])) {
            $text = $langArr[$lang];
        }
        else if(isset($langArr["de"])) {
            $text = $langArr["de"];
        }
        else {
            $text = $default;
        }
        
        return $text;
    }

}

?>
