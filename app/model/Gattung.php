<?php

/**
 * Description of Gattung
 *
 * @author Thom
 */
class Gattung implements Model {

    private $gattung_id;
    private $gattung_name;

    public function __construct() {
        
    }
    
    public function getId() {
        return $this->gattung_id;
    }
    
    public function getName() {
        return $this->gattung_name;
    }
}

?>
