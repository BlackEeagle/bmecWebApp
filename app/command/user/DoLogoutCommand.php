<?php

/**
 * Description of DoLogoutCommand
 *
 * @author Thom
 */
class DoLogoutCommand implements Command {
    
    public function execute(HttpRequest $request, HttpResponse $response) {
        
        $secService = SecurityService::getInstance();
        
        $secService->logout();
        
        $response->addHeader("Location", "?cmd=1");
    }
    
    public function getNavigationBean() {
        return new NavigationBean();
    }
}

?>
