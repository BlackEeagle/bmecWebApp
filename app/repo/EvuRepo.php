<?php

/**
 * Description of EvuRepo
 *
 * @author Thom
 */
class EvuRepo extends AbstractRepo {
    
    /**
     * @return array
     */
    public function findAll() {
        
        $sql = "SELECT evu.evu_id, evu.evu_name FROM bmec_fzdb_evu evu ORDER BY evu.evu_name";
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        
        $result = $stmt->execute(null, "Evu");
        
        return $result;
    }    
}

?>
