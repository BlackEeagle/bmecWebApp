<?php
/**
 * Description of User
 *
 * @author Thom
 */
class User implements Model {
    
    private $user_id;
    
    private $user_name;
    
    public function __construct() {
        
    }
    
    public function getName() {
        return $this->user_name;
    }
    
    public function getId() {
        return $this->user_id;
    }
}

?>
