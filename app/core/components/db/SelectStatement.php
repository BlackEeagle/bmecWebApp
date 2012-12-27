<?php

/**
 * Description of SelectStatement
 *
 * @author Thom
 */
class SelectStatement extends AbstractStatement {

    private $listParams;

    public function __construct(\PDO $databaseHandler) {
        parent::__construct($databaseHandler);
        $this->listParams = array();
    }

    public function addParamList($name, array $values) {
        $this->listParams[] = array("name" => $name, "values" => $values);
    }

    /**
     * @param array $params
     * @param string $model
     * @return array
     */
    public function execute($sql, $model = null) {

        try {
            if (count($this->listParams) > 0) {

                $listParamsCount = 0;

                foreach ($this->listParams as $paramPair) {

                    if (count($paramPair["values"]) > 0) {
                        $numInParams = count($paramPair["values"]);

                        // array mit den Parametern fürs SQL-Query (:inParam1, :inParam2, etc.)
                        $inParamsQuery = array();
                        // array mit den entsprechenden Values
                        $inParamsValues = array();

                        for ($i = 0; $i < $numInParams; $i++) {
                            $paramName = "inParam" . $listParamsCount;
                            $inParamsQuery[] = ":" . $paramName;
                            $inParamsValues[$paramName] = $paramPair["values"][$i];

                            $listParamsCount++;
                        }

                        // im ursprünglichen Query den Platzhalter mit den Query-Parametern ersetzen
                        $sql = str_replace(":" . $paramPair["name"], implode(", ", $inParamsQuery), $sql);

                        // parameter zusammenfügen
                        $this->params = array_merge($this->params, $inParamsValues);
                    }
                }
            }

            $this->prepare($sql);
            $this->executeStatement();

            if ($model !== null) {
                $result = $this->statement->fetchAll(PDO::FETCH_CLASS, $model);
            } else {
                $result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage(), $e);
        }

        return $result;
    }

}

?>
