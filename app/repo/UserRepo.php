<?php

/**
 * Description of UserRepo
 *
 * @author Thom
 */
class UserRepo extends AbstractRepo {

    /**
     * @return User
     */
    public function findUserByNameAndPass($user, $pass) {

        $sql = "SELECT user_id, user_name FROM bmec_user us WHERE us.user_name = :name AND us.user_password = :password";
        $params = array("name" => $user, "password" => $pass);

        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        $result = $stmt->execute($params, "User");

        if (empty($result) === false) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * @param int $id
     * @return boolean
     */
    public function findUserById($id) {

        $sql = "SELECT us.user_id, us.user_name FROM bmec_user us WHERE us.user_id = :id";
        $params = array("id" => $id);

        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        $result = $stmt->execute($params, "User");

        if (empty($result) === false) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * @param int $user_id
     * @return array
     */
    public function findUserRolesById($user_id) {

        $sql = "SELECT r.role_name FROM bmec_role r 
            INNER JOIN bmec_user_role ur ON r.role_id = ur.role_id 
            INNER JOIN bmec_user u ON u.user_id = ur.user_id
            WHERE u.user_id = :id";
        
        $params = array("id" => $user_id);
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        $result = $stmt->execute($params);
        
        $roles = array();
        
        foreach ($result as $row) {
            $roles[] = $row["role_name"];
        }
        
        return $roles;
    }

}

?>
