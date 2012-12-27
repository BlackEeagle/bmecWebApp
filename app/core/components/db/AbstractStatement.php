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
    
    /**
     *
     * @var PDOStatement 
     */
    protected $statement;
    
    /**
     *
     * @var Logger
     */
    protected $logger;
    
    /**
     * @var array
     */
    protected $params;
    
    /**
     * 
     * @param PDO $databaseHandler
     */
    public function __construct(PDO $databaseHandler) {
        $this->databaseHandler = $databaseHandler;
        $this->logger = Logger::getLogger("main");
        $this->params = array();
    }

    protected function prepare($sql) {
        $this->statement = $this->databaseHandler->prepare($sql);
    }

    protected function executeStatement() {
        if (count($this->params) === 0) {
            $this->statement->execute();
        } else {
            $this->statement->execute($this->params);
        }
    }

    public function getLastInsertedId() {
        return $this->databaseHandler->lastInsertId();
    }
    
    public function addParam($key, $value) {
        $this->params[$key] = $value;
    }

    public abstract function execute($sql);
}

?>
