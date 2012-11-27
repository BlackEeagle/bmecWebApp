<?php

/**
 * Description of WelcomeCommand
 *
 * @author Thom
 */
class WelcomeCommand implements Command {

    public function execute(HttpRequest $request, HttpResponse $response) {
        
       $response->setSmartyTemplateName("fahrzeugInventar/start.tpl");
    }
    
    /**
     * @return NavigationBean
     */
    public function getNavigationBean() {        
        return new NavigationBean(NavigationHelper::FZ_INVENTAR_TOP, NavigationHelper::FZ_INVENTAR_SUB_START);
    }
}

?>
