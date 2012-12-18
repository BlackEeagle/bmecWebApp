<?php

/**
 * Description of SecurityService
 *
 * @author Thom
 */
class SecurityService implements SecurityBeanCreator {
    
    /**
     * @var SecurityService 
     */
    private static $instance;
    
    /**
     * @var User 
     */
    private $currentUser;
    
    /**
     * @var array 
     */
    private $roles;
    
    private function __construct() {
        $this->roles = null;
        $this->currentUser = null;
    }
    
    /**
     * @return SecurityService
     */
    public static function getInstance() {
        
        if(self::$instance === null) {
            self::$instance = new SecurityService();
        }
        
        return self::$instance;
    }
    
    /**
     * @return boolean
     */
    public function isUserLoggedIn() {
        return isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]);
    }
    
    /**
     * @return array
     */
    public function getUserRoles() {
        
        if($this->roles === null) {
            $this->roles = array();

            if($this->isUserLoggedIn()) {
                $repo = new UserRepo();
                
                $this->roles = $repo->findUserRolesById($_SESSION["user_id"]);
            }
        }
        
        return $this->roles;
    }
    
    public function logout() {
        session_destroy();
    }
    
    /**
     * @return boolean
     */
    public function login($user, $pass) {
        
        $loggedIn = false;
        
        if($this->isUserLoggedIn()) {
            $this->logout();
        }
        
        $user = $this->getUserInfo($user, $pass);
        
        if($user !== false) {
            $_SESSION["user_id"] = $user->getId();
            $this->currentUser = $user;
            
            $loggedIn = true;
        }
        
        return $loggedIn;
    }
    
    /**
     * @return User
     */
    public function getCurrentUser() {
        
        if($this->currentUser === null && $this->isUserLoggedIn()) {
            $repo = new UserRepo();
            
            $this->currentUser = $repo->findUserById($_SESSION["user_id"]);
        }
        
        return $this->currentUser;
    }
    
    /**
     * @return User
     */
    private function getUserInfo($user, $pass) {
        
        $pass = sha1($pass);
        
        $repo = new UserRepo();
        return $repo->findUserByNameAndPass($user, $pass);
    }
    
    /**
     * @return BaseSecurityBean
     */
    public function createSecurityBean() {
        
        return new BaseSecurityBean($this->isUserLoggedIn(), $this->getCurrentUser());
    }
    
    /**
     * @param array $requestetRoles
     * @return boolean
     */
    public function isUserInRoles(array $requestetRoles) {
        
        $userRoles = $this->getUserRoles();
        $isInRoles = false;
        
        foreach($requestetRoles as $role) {
            if(in_array($role, $userRoles)) {
                $isInRoles = true;
                break;
            }
        }
        
        return $isInRoles;
    }
}

?>
