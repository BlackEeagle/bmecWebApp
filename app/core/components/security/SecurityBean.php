<?php

/**
 * Description of SecurityBean
 *
 * @author Thom
 */
class SecurityBean {
    private $loggedIn;
    
    private $user;
    
    public function __construct($loggedIn, User $user = null) {
        $this->loggedIn = $loggedIn;
        $this->user = $user;
    }
    
    /**
     * 
     * @return User
     */
    public function getUser() {
        return $this->user;
    }
    
    public function setUser(User $user) {
        return $this->user = $user;
    }
    
    /**
     * 
     * @return boolean
     */
    public function isLoggedIn() {
        return $this->loggedIn;
    }
    
    public function setLoggedIn($loggedIn) {
        $this->loggedIn = $loggedIn;
    }
}

?>
