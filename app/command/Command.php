<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Thom
 */
interface Command {

    public function execute(HttpRequest $request, HttpResponse $response);
    
    public function getNavigationBean();
}

?>
