<?php

/**
 * Description of UpdateStatement
 *
 * @author Thom
 */
class UpdateStatement extends AbstractStatement {
    
    public function execute(array $params = null) {

        try {
            $this->executeStatement($params);

            $affectedRows = $this->statement->rowCount();
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }

        return $affectedRows;
    }
}

?>
