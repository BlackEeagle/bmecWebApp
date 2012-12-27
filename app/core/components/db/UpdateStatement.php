<?php

/**
 * Description of UpdateStatement
 *
 * @author Thom
 */
class UpdateStatement extends AbstractStatement {
    
    public function execute($sql) {

        $this->prepare($sql);
        
        try {
            $this->executeStatement();

            $affectedRows = $this->statement->rowCount();
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }

        return $affectedRows;
    }
}

?>
