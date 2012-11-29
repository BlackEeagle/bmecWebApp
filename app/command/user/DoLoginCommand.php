<?php

/**
 * Description of DoLoginCommand
 *
 * @author Thom
 */
class DoLoginCommand implements Command {
    
    public function execute(HttpRequest $request, HttpResponse $response) {
        
        $secService = SecurityService::getInstance();
        
        $succ = $secService->login($request->getParameter("username"), $request->getParameter("password"));
        
        $log = Logger::getLogger("main");
        $log->debug("succ".$succ);
        
        $response->addHeader("Location", "?cmd=1");
    }
    
    public function getNavigationBean() {
        return null;
    }    
}

?>
