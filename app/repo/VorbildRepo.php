<?php

/**
 * Description of VorbildRepo
 *
 * @author Thom
 */
class VorbildRepo extends AbstractRepo {

    public function insert(Vorbild $vorbild) {

        $sql = "INSERT INTO bmec_fzdb_vorbild (vorbild_evu_id, vorbild_gattung_id, vorbild_typ, vorbild_serie, vorbild_farbe, vorbild_geschwindigkeit, vorbild_achsen, vorbild_epoche_id) VALUES (:evu, :gattung, :typ, :serie, :farbe, :geschwindigkeit, :achsen, :epoche)";

        $stmt = $this->dbHandler->createUpdateStatement();
        $stmt->prepare($sql);

        $stmt->execute($this->getParams($vorbild));

        $vorbild->setId($stmt->getLastInsertedId());
    }

    public function update(Vorbild $vorbild) {

        $sql = "UPDATE bmec_fzdb_vorbild SET vorbild_evu_id = :evu, vorbild_gattung_id = :gattung, vorbild_typ = :typ, vorbild_serie = :serie, vorbild_farbe = :farbe, vorbild_geschwindigkeit = :geschwindigkeit, vorbild_achsen = :achsen, vorbild_epoche_id = :epoche WHERE vorbild_id = :id";

        $stmt = $this->dbHandler->createUpdateStatement();
        $stmt->prepare($sql);

        $params = array_merge($this->getParams($vorbild), array("id" => $vorbild->getId()));
        $stmt->execute($params);
    }

    /**
     * @return Vorbild
     */
    public function findById($id) {

        $sql = "SELECT v.vorbild_id, v.vorbild_evu_id, v.vorbild_gattung_id, v.vorbild_typ, v.vorbild_serie, v.vorbild_farbe, v.vorbild_geschwindigkeit, v.vorbild_achsen, v.vorbild_epoche_id FROM bmec_fzdb_vorbild v WHERE v.vorbild_id = :id";

        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);

        $result = $stmt->execute(array("id" => $id), "Vorbild");
        $vorbild = null;

        if (count($result) > 0) {
            $vorbild = $result[0];
        }

        return $vorbild;
    }

    /**
     * @return array
     */
    public function findAll() {
        $sql = "SELECT v.vorbild_id, v.vorbild_evu_id, v.vorbild_gattung_id, v.vorbild_typ, v.vorbild_serie, v.vorbild_farbe, v.vorbild_geschwindigkeit, v.vorbild_achsen, v.vorbild_epoche_id FROM bmec_fzdb_vorbild v";

        $stmt = $this->dbHandler->createSelectStatement();
        $stmt->prepare($sql);

        return $stmt->execute(null, "Vorbild");
    }

    /**
     * @param Vorbild $vorbild
     * @return array
     */
    private function getParams(Vorbild $vorbild) {
        return array(
            "evu" => $vorbild->getEvuId(),
            "gattung" => $vorbild->getGattungId(),
            "typ" => $vorbild->getTyp(),
            "serie" => $vorbild->getSerie(),
            "farbe" => $vorbild->getFarbe(),
            "geschwindigkeit" => $vorbild->getGeschwindigkeit(),
            "achsen" => $vorbild->getAchsen(),
            "epoche" => $vorbild->getEpocheId()
        );
    }

}

?>
