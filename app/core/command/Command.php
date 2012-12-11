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

    public function init(HttpRequest $request, HttpResponse $response);
    
    /**
     * @return NavigationBean
     */
    public function getNavigationBean();
    
    /**
     * @param method $method
     * @return array;
     */
    public function getRequiredRoles($method);
}

?>
