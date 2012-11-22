<?php

/**
 * Description of HttpRequest
 *
 * @author Thom
 */
class HttpRequest {

    private $parameters;

    public function __construct() {
        $this->parameters = $_REQUEST;
    }

    public function issetParameter($name) {
        return isset($this->parameters[$name]);
    }

    public function getParameter($name) {
        if ($this->issetParameter($name)) {
            return $this->parameters[$name];
        } else {
            return null;
        }
    }

    public function getParameterNames() {
        return array_keys($this->parameters);
    }

    public function getHeader($name) {
        $name = "HTTP_" . strtoupper(str_replace("-", "_", $name));

        if (isset($_SERVER[$name])) {
            return $_SERVER[$name];
        } else {
            return null;
        }
    }

}

?>
