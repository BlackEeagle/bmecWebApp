<?php

/**
 * Description of GattungRepo
 *
 * @author Thom
 */
class GattungRepo extends AbstractRepo {

    /**
     * @return array
     */
    public function findAll() {
        
        $sql = "SELECT g.gattung_id, g.gattung_name FROM bmec_fzdb_gattung g ORDER BY g.gattung_name";
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        
        $result = $stmt->execute(null, "Gattung");
        return $result;
    }
    
}

?>
