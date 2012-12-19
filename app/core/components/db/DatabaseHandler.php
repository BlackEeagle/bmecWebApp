<?php

/**
 * Description of DatabaseHandler
 *
 * @author Thom
 */
class DatabaseHandler {

    private static $instance = null;
    
    /**
     * @var PDO 
     */
    private $dbHandler;
    private $logger;

    /**
     * @return DatabaseHandler
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DatabaseHandler();
        }
        
        return self::$instance;
    }

    public function __construct() {
        $config = StaticConfig::getConfig();
        //$this->logger = Logger::getLogger("main");

        try {
            $this->dbHandler = new PDO("mysql:host=localhost;dbname=bmec", $config["db"]["username"], $config["db"]["password"],
                    array(PDO::ATTR_PERSISTENT, $config["db"]["usePersistentConnection"]));
            
            $this->dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }
    }

    public function __destruct() {
        if ($this->dbHandler != null) {
            $this->dbHandler = null;
        }
    }

    /**
     * @return SelectStatement
     */
    public function createSelectStatement() {
        return new SelectStatement($this->dbHandler);
    }
    
    /**
     * @return UpdateStatement
     */
    public function createUpdateStatement() {
        return new UpdateStatement($this->dbHandler);
    }
}

?>
