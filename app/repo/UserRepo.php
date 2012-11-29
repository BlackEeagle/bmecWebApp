<?php

/**
 * Description of UserRepo
 *
 * @author Thom
 */
class UserRepo {

    private $dbHandler;
    
    public function __construct() {
        $this->dbHandler = DatabaseHandler::getInstance();
    }

    /**
     * @return User
     */
    public function findUserByNameAndPass($user, $pass) {
        
        $sql = "SELECT user_id, user_name FROM bmec_user us WHERE us.user_name = :name AND us.user_password = :password";
        $params = array("name" => $user, "password" => $pass);
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        $result = $stmt->execute($params, "User");
        
        $log = Logger::getLogger("main");
        $log->debug($result);
        
        if(empty($result) === false) {
            return $result[0];
        }
        else {
            return false;
        }
    }
    
    public function findUserById($id) {
        
        $sql = "SELECT user_id, user_name FROM bmec_user us WHERE us.user_id = :id";
        $params = array("id" => $id);
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        $result = $stmt->execute($params, "User");
        
        if(empty($result) === false) {
            return $result[0];
        }
        else {
            return false;
        }
    }
}

?>
