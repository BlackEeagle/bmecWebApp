<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class HttpResponse {

    private $body;
    private $status;
    private $headers;
    private $smarty;
    private $smartyTemplateName = "";

    public function __construct() {
        $this->reset();
    }

    public function write($data) {
        $this->body .= $data;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function addHeader($name, $value) {
        $this->headers[$name] = $value;
    }

    public function flush() {
        header("HTTP/1.1 {$this->status}");

        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }

        if ($this->smartyTemplateName != "") {
            $this->body .= $this->smarty->fetch($this->smartyTemplateName);
        }

        echo($this->body);

        $this->reset();
    }

    public function reset() {
        $this->body = "";
        $this->status = "200 OK";
        $this->headers = array();
        $this->smarty = new SmartyBmec();
        $this->smartyTemplateName = "";
    }

    /**
     * @return Smarty
     */
    public function getSmarty() {
        return $this->smarty;
    }

    public function setSmartyTemplateName($tpl) {
        $this->smartyTemplateName = $tpl;
    }

    /**
     * @return string
     */
    public function getSmartyTemplateName() {
        return $this->smartyTemplateName;
    }
}

?>
