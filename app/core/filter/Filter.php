<?php

/**
 *
 * @author Thom
 */
interface Filter {
    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration);
}

?>
