<?php

/**
 * Description of EpocheService
 *
 * @author Thom
 */
class EpocheService {

    private static $instance;

    private function __construct() {
        
    }

    /**
     * @return EpocheService
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new EpocheService();
        }

        return self::$instance;
    }

    public function getAllEpochen() {
        $repo = new EpocheRepo();
        return $repo->findAll();
    }
}

?>
