<?php

/**
 * Description of SecurityFilter
 *
 * @author Thom
 */
class SecurityFilter implements Filter {
    
    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration) {
        
        $securityService = SecurityService::getInstance();
        
        $invocation->invoke($invocation);
        
        $secBean = new SecurityBean($securityService->isUserLoggedIn(), $securityService->getCurrentUser());
        $response->getSmarty()->assign("security", $secBean);
    }
    
}

?>
