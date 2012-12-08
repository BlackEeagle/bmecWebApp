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
                
                /*-
                 * BMEC WebApp
                 */
                
                "bmecWebApp.title" => array(
                    "de" => "BMEC WebApp"
                ),
                "bmecWebApp.bmec" => array(
                    "de" => "BMEC"
                ),
                "bmecWebApp.login.title" => array(
                    "de" => "Login"
                ),
                "bmecWebApp.login.username" => array(
                    "de" => "Benutzername"
                ),
                "bmecWebApp.login.password" => array(
                    "de" => "Passwort"
                ),
                "bmecWebApp.login.button" => array(
                    "de" => "Login"
                ),
                "bmecWebApp.login.logout" => array(
                    "de" => "Logout"
                ),
                
                /*-
                 * FAHRZEUG-INVENTAR
                 */
                
                "fzInventar.topNavigation" => array(
                    "de" => "Fahrzeug-Inventar"
                ),
                "fzInventar.sideNavigation.title" => array(
                    "de" => "FAHRZEUG-INVENTAR"
                ),
                "fzInventar.sideNavigation.start" => array(
                    "de" => "Start"
                ),
                "fzInventar.sideNavigation.start.title" => array(
                    "de" => "Hello world"
                ),
                "fzInventar.sideNavigation.start.text" => array(
                    "de" => "foobar"
                )
            );
        }
    }

    public function getText($key, $lang = "de", $default = null) {
        
        if($default === null) {
            $default = "!! ".$key." !!";
        }
        
        if(array_key_exists($key, $this->texts)) { 
            $langArr = $this->texts[$key];

            if(isset($langArr[$lang])) {
                $text = $langArr[$lang];
            }
            else if(isset($langArr["de"])) {
                $text = $langArr["de"];
            }
        }
        
        if(!isset($text) || empty($text)) {
            $text = $default;
        }
        
        return $text;
    }

}

?>
