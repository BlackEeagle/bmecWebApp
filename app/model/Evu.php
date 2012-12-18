<?php

/**
 * Description of Evu
 *
 * @author Thom
 */
class Evu implements Model {

    private $evu_id;
    private $evu_name;

    public function getId() {
        return $this->evu_id;
    }

    public function getName() {
        return $this->evu_name;
    }

}

?>
