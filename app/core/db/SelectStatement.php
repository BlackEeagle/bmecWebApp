<?php

/**
 * Description of SelectStatement
 *
 * @author Thom
 */
class SelectStatement extends AbstractStatement {

    private $modelClass = null;

    public function setModelClass($modelClass) {
        $this->modelClass = $modelClass;
    }

    public function execute(array $params = null) {

        if ($this->modelClass === null) {
            throw new Exception("model class required!");
        }

        try {
            $this->executeStatement($params);

            $result = $this->statement->fetchAll(PDO::FETCH_CLASS, $this->modelClass);
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }

        return $result;
    }

}

?>
