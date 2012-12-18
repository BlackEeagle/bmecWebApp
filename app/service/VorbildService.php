<?php

/**
 * Description of VorbildService
 *
 * @author Thom
 */
class VorbildService {

    private static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new VorbildService();
        }

        return self::$instance;
    }

    /**
     * @return array;
     */
    public function getAllEvus() {
        $repo = new EvuRepo();
        return $repo->findAll();
    }

}

?>
