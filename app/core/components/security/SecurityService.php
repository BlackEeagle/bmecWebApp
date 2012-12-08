<?php

/**
 * Description of SecurityService
 *
 * @author Thom
 */
class SecurityService {
    
    private static $instance;
    
    private $currentUser;
    
    private function __construct() {
        
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
        $roles = array();
        
        if($this->isUserLoggedIn()) {
            
        }
        
        return $roles;
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
}

?>
