<?php

/**
 * Description of ShowLoginForm
 *
 * @author Thom
 */
class ShowLoginFormCommand implements Command {
    
    public function execute(HttpRequest $request, HttpResponse $response) {
        
       $response->setSmartyTemplateName("user/login.tpl");
    }
    
    /**
     * @return NavigationBean
     */
    public function getNavigationBean() {        
        return new NavigationBean(NavigationHelper::USER_LOGIN);
    }
}

?>
