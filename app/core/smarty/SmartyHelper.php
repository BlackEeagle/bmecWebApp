<?php

/**
 * Description of SmartyHelper
 *
 * @author Thom
 */
class SmartyHelper {

    /**
     * @var SmartyHelper 
     */
    private static $instance;

    /**
     * @var HttpRequest
     */
    private $request;

    /**
     * @var HttpResponse 
     */
    private $response;

    private function __construct($request, $response) {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return SmartyHelper
     */
    public static function getInstance($request, $response) {
        if (self::$instance == null) {
            self::$instance = new SmartyHelper($request, $response);
        }

        return self::$instance;
    }

    /**
     * @param array $objs
     * @param string $key
     * @param string $value
     * @return array
     */
    public function buildArrayForSelect(array $objs, $key, $value) {

        $values = array();

        $getKey = "get" . ucfirst(strtolower($key));
        $getValue = "get" . ucfirst(strtolower($value));

        foreach ($objs as $obj) {
            $values[] = array($obj->$getKey(), $obj->$getValue());
        }

        return $values;
    }

    /**
     * 
     * @param string $paramName
     */
    public function assignRequestParam($paramName) {
        $this->response->getSmarty()->assign($paramName, $this->request->getParameter($paramName));
    }

    /**
     * @param array $params
     */
    public function assignRequestParams(array $params) {
        foreach ($params as $param) {
            $this->assignRequestParam($param);
        }
    }
    
    /**
     * 
     * @param array $names
     */
    public function assignEmpty(array $names) {
        foreach ($names as $name) {
            $this->response->getSmarty()->assign($name);
        }
    }
}

?>
