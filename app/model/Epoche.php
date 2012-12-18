<?php

/**
 * Description of Epoche
 *
 * @author Thom
 */
class Epoche implements Model {

    private $epoche_id;
    private $epoche_name;

    public function __construct() {
        
    }

    public function getId() {
        return $this->epoche_id;
    }

    public function getName() {
        return $this->epoche_name;
    }

}

?>
