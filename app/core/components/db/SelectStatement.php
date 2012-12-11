<?php

/**
 * Description of SelectStatement
 *
 * @author Thom
 */
class SelectStatement extends AbstractStatement {

    /**
     * @param array $params
     * @param string $model
     * @return array
     */
    public function execute(array $params = null, $model = null) {

        try {
            $this->executeStatement($params);

            if($model !== null){
                $result = $this->statement->fetchAll(PDO::FETCH_CLASS, $model);    
            }
            else {
                $result = $this->statement->fetchAll(PDO::FETCH_ASSOC);    
            }
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }

        return $result;
    }

}

?>
