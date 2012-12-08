<?php

/**
 * Description of GuiMessageFilter
 *
 * @author Thom
 */
class GuiMessageFilter implements Filter {

    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration) {

        $invocation->invoke($invocation);

        $response->getSmarty()->assign("navBean", $commandConfiguration->getCommandInstance()->getNavigationBean());
    }

}

?>
