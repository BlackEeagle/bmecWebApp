<?php

/**
 * Description of AbstractRepo
 *
 * @author Thom
 */
abstract class AbstractRepo {

    /**
     * @var DatabaseHandler 
     */
    protected $dbHandler;

    public function __construct() {
        $this->dbHandler = DatabaseHandler::getInstance();
    }
}

?>
