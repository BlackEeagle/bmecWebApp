<?php

/**
 * Description of EpocheRepo
 *
 * @author Thom
 */
class EpocheRepo extends AbstractRepo {

    /**
     * @return array
     */
    public function findAll() {

        $sql = "SELECT e.epoche_id, e.epoche_name FROM bmec_fzdb_epoche e ORDER BY e.epoche_name";

        $stmt = $this->dbHandler->createSelectStatement();

        $result = $stmt->execute($sql, "Epoche");
        return $result;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function findByIds(array $ids) {
        
        $sql = "SELECT e.epoche_id, e.epoche_name FROM bmec_fzdb_epoche e WHERE e.epoche_id IN (:ids)";
        
        $stmt = $this->dbHandler->createSelectStatement();
        
        $stmt->addParamList("ids", $ids);
        return $stmt->execute($sql, "Epoche");
    }

}

?>
