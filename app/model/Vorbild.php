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

    public function getVorbildId() {
        return $this->vorbild_id;
    }

    public function setVorbildId($vorbild_id) {
        $this->vorbild_id = $vorbild_id;
    }

    public function getVorbildEvuId() {
        return $this->vorbild_evu_id;
    }

    public function setVorbildEvuId($vorbild_evu_id) {
        $this->vorbild_evu_id = $vorbild_evu_id;
    }

    public function getVorbildGattungId() {
        return $this->vorbild_gattung_id;
    }

    public function setVorbildGattungId($vorbild_gattung_id) {
        $this->vorbild_gattung_id = $vorbild_gattung_id;
    }

    public function getVorbildTyp() {
        return $this->vorbild_typ;
    }

    public function setVorbildTyp($vorbild_typ) {
        $this->vorbild_typ = $vorbild_typ;
    }

    public function getVorbildSerie() {
        return $this->vorbild_serie;
    }

    public function setVorbildSerie($vorbild_serie) {
        $this->vorbild_serie = $vorbild_serie;
    }

    public function getVorbildFarbe() {
        return $this->vorbild_farbe;
    }

    public function setVorbildFarbe($vorbild_farbe) {
        $this->vorbild_farbe = $vorbild_farbe;
    }

    public function getVorbildGeschwindigkeit() {
        return $this->vorbild_geschwindigkeit;
    }

    public function setVorbildGeschwindigkeit($vorbild_geschwindigkeit) {
        $this->vorbild_geschwindigkeit = $vorbild_geschwindigkeit;
    }

    public function getVorbildAchsen() {
        return $this->vorbild_achsen;
    }

    public function setVorbildAchsen($vorbild_achsen) {
        $this->vorbild_achsen = $vorbild_achsen;
    }

    public function getVorbildEpocheId() {
        return $this->vorbild_epoche_id;
    }

    public function setVorbildEpocheId($vorbild_epoche_id) {
        $this->vorbild_epoche_id = $vorbild_epoche_id;
    }

}

?>
