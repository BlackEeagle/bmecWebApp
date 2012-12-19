<?php

/**
 * Description of AbstractStatement
 *
 * @author Thom
 */
abstract class AbstractStatement {

    /**
     * @var PDO 
     */
    protected $databaseHandler;
    protected $statement;
    protected $logger;

    public function __construct(PDO $databaseHandler) {
        $this->databaseHandler = $databaseHandler;
        $this->logger = Logger::getLogger("main");
    }

    public function prepare($sql) {
        $this->statement = $this->databaseHandler->prepare($sql);
    }

    protected function executeStatement($params) {
        if (is_null($params)) {
            $this->statement->execute();
        } else {
            $this->statement->execute($params);
        }
    }

    public function getLastInsertedId() {
        return $this->databaseHandler->lastInsertId();
    }

    public abstract function execute();
}

?>
