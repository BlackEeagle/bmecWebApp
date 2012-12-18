<?php
/**
 * Description of EpocheRepo
 *
 * @author Thom
 */
class EpocheRepo extends AbstractRepo {
    
    public function findAll() {
        
        $sql = "SELECT e.epoche_id, e.epoche_name FROM bmec_fzdb_epoche e ORDER BY e.epoche_name";
        
        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);
        
        $result = $stmt->execute(null, "Epoche");
        return $result;        
    }
    
}

?>
