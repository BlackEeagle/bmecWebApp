<?php

/**
 * Description of ShowLoginForm
 *
 * @author Thom
 */
class LoginCommand extends AbstractCommand {
    
    public function showForm() {
        
        $this->navigationBean = new NavigationBean(NavigationHelper::USER_LOGIN);
        
       $this->response->setSmartyTemplateName("user/login.tpl");
    }
    
    public function doLogout() {
        $secService = SecurityService::getInstance();
        
        $secService->logout();
        
        $this->response->addHeader("Location", "?cmd=1");
    }
    
    public function doLogin() {
        
        $secService = SecurityService::getInstance();
        
        $succ = $secService->login($this->request->getParameter("username"), $this->request->getParameter("password"));
        
        $log = Logger::getLogger("main");
        $log->debug("succ".$succ);
        
        $this->response->addHeader("Location", "?cmd=1");
    }
}

?>
