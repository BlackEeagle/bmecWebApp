<?php

/**
 * Description of AbstractI18nHandler
 *
 * @author Thom
 */
abstract class AbstractI18nHandler implements I18nHandler {

    protected $standardLang;
    private $logger;

    public function __construct() {
        $this->standardLang = "de";
        $this->logger = Logger::getLogger("main");
    }

    public final function getText($key, $default = null) {

        $currentLanguage = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

        if (!in_array($currentLanguage, $this->supportedLanguages())) {

            $this->logger->warn("client lang (" . $currentLanguage . ") not supported. Switched to " . $this->standardLang);
            $currentLanguage = $this->standardLang;
        }

        return $this->getTextForLang($key, $currentLanguage, $default);
    }

    public abstract function getTextForLang($key, $lang, $default);
}

?>
