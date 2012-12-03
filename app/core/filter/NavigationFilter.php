<?php

/**
 * Description of NavigationFilter
 *
 * @author Thom
 */
class NavigationFilter implements Filter {

    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration) {
        
        $invocation->invoke($invocation);
        
        $response->getSmarty()->assign("navBean", $commandConfiguration->getCommandInstance()->getNavigationBean());
    }
}

?>
