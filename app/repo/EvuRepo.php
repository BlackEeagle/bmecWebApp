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
        
        $result = $stmt->execute($sql, "Evu");
        
        return $result;
    }
    
    /**
     * @param array $ids
     * @return array
     */
    public function findByIds(array $ids) {
        
        $sql = "SELECT e.evu_id, e.evu_name FROM bmec_fzdb_evu e WHERE e.evu_id IN (:ids)";
        
        $stmt = $this->dbHandler->createSelectStatement();
        
        $stmt->addParamList("ids", $ids);
        return $stmt->execute($sql, "Evu");
    }
}

?>
