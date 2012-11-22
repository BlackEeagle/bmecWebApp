<?php

/**
 * Description of SessionFilter
 *
 * @author Thom
 */
class SessionFilter implements Filter {

    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration) {
        
        session_start();
        
        header('Cache-control: private'); // IE 6 FIX
        date_default_timezone_set('UTC');
        
        $invocation->invoke($invocation);        
    }
}

?>
