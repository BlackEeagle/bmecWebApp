<?php

/**
 * Description of VorbildService
 *
 * @author Thom
 */
class VorbildService {

    /**
     * @var VorbildService 
     */
    private static $instance;

    private function __construct() {
        
    }

    /**
     * @return VorbildService
     */
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

    /**
     * @param Vorbild $vorbild
     */
    public function save(Vorbild $vorbild) {

        $repo = new VorbildRepo();

        if ($vorbild->getId() && $vorbild->getId() > 0) {
            // update
            $repo->update($vorbild);
        } else {
            // insert
            $repo->insert($vorbild);
        }
    }

    /**
     * @param int $id
     * @return Vorbild
     */
    public function getById($id) {

        $vorbild = null;

        if (isset($id) && $id && $id > 0) {
            $repo = new VorbildRepo();
            $vorbild = $repo->findById($id);
        }

        return $vorbild;
    }

    /**
     * @return array
     */
    public function getAll() {

        $repo = new VorbildRepo();
        return $repo->findAll();
    }

}

?>
