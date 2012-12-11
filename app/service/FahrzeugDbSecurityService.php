<?php

/**
 * Description of FahrzeugDbSecurityService
 *
 * @author Thom
 */
class FahrzeugDbSecurityService implements SecurityBeanCreator {
    
    /**
     * @var FahrzeugDbSecurityService 
     */
    private static $instance;
    
    /**
     * @var SecurityService 
     */
    private $secService;
    
    const FZ_DB_ROLE = "user";
    
    private function __construct() {
        $this->secService = SecurityService::getInstance();
    }
    
    /**
     * @return FahrzeugDbSecurityService
     */
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new FahrzeugDbSecurityService();
        }
        
        return self::$instance;
    }
    
    /**
     * @return boolean
     */
    public function isAllowedForFzDb() {
        
        $roles = $this->secService->getUserRoles();
        $allowed = in_array(self::FZ_DB_ROLE, $roles);
        
        return $allowed;        
    }
 
    /**
     * @return FahrzeugDbSecurityBean
     */
    public function createSecurityBean() {
        return new FahrzeugDbSecurityBean($this->isAllowedForFzDb());
    }
}

?>
