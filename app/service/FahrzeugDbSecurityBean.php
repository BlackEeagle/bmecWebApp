<?php

/**
 * Description of FahrzeugDbSecurityBean
 *
 * @author Thom
 */
class FahrzeugDbSecurityBean implements SecurityBean {
    
    /**
     * @var boolean 
     */    
    private $allowedForFzDb;
    
    public function __construct($allowedForFzDb) {
        $this->allowedForFzDb = $allowedForFzDb;
    }
    
    /**
     * @return boolean
     */
    public function isAllowedForFzDb() {
        return $this->allowedForFzDb;
    }
}

?>
