<?php

/**
 * Description of GattungService
 *
 * @author Thom
 */
class GattungService {

    private static $instance;

    private function __construct() {
        
    }

    /**
     * @return GattungService
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new GattungService();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getAllGattung() {
        $repo = new GattungRepo();
        return $repo->findAll();
    }

}

?>
