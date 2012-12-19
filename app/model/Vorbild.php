<?php

/**
 * Description of Vorbild
 *
 * @author Thom
 */
class Vorbild implements Model {

    private $vorbild_id;
    private $vorbild_evu_id;
    private $vorbild_gattung_id;
    private $vorbild_typ;
    private $vorbild_serie;
    private $vorbild_farbe;
    private $vorbild_geschwindigkeit;
    private $vorbild_achsen;
    private $vorbild_epoche_id;

    public function __construct() {
        
    }

    public function getId() {
        return $this->vorbild_id;
    }

    public function setId($vorbild_id) {
        $this->vorbild_id = $vorbild_id;
    }

    public function getEvuId() {
        return $this->vorbild_evu_id;
    }

    public function setEvuId($vorbild_evu_id) {
        $this->vorbild_evu_id = $vorbild_evu_id;
    }

    public function getGattungId() {
        return $this->vorbild_gattung_id;
    }

    public function setGattungId($vorbild_gattung_id) {
        $this->vorbild_gattung_id = $vorbild_gattung_id;
    }

    public function getTyp() {
        return $this->vorbild_typ;
    }

    public function setTyp($vorbild_typ) {
        $this->vorbild_typ = $vorbild_typ;
    }

    public function getSerie() {
        return $this->vorbild_serie;
    }

    public function setSerie($vorbild_serie) {
        $this->vorbild_serie = $vorbild_serie;
    }

    public function getFarbe() {
        return $this->vorbild_farbe;
    }

    public function setFarbe($vorbild_farbe) {
        $this->vorbild_farbe = $vorbild_farbe;
    }

    public function getGeschwindigkeit() {
        return $this->vorbild_geschwindigkeit;
    }

    public function setGeschwindigkeit($vorbild_geschwindigkeit) {
        $this->vorbild_geschwindigkeit = $vorbild_geschwindigkeit;
    }

    public function getAchsen() {
        return $this->vorbild_achsen;
    }

    public function setAchsen($vorbild_achsen) {
        $this->vorbild_achsen = $vorbild_achsen;
    }

    public function getEpocheId() {
        return $this->vorbild_epoche_id;
    }

    public function setEpocheId($vorbild_epoche_id) {
        $this->vorbild_epoche_id = $vorbild_epoche_id;
    }

}

?>
