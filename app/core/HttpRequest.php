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

    /**
     * @return boolean
     */
    public function issetParameter($name) {
        return isset($this->parameters[$name]);
    }

    /**
     * @return string
     */
    public function getParameter($name, $stripTags = true) {
        if ($this->issetParameter($name)) {
            if($stripTags) {
                return strip_tags($this->parameters[$name]);
            }
            else {
                return $this->parameters[$name];
            }
        } else {
            return null;
        }
    }

    public function getParameterNames() {
        return array_keys($this->parameters);
    }

    /**
     * @return string
     */
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
