<?php

/**
 * Description of FrontController
 *
 * @author Thom
 */
class FrontController {

    /**
     * @var HttpRequest
     */
    private $request;
    
    /**
     * @var HttpResponse 
     */
    private $response;
    
    /**
     * @var CommandConfiguration 
     */
    private $commandConfig;

    public function handleRequest() {

        $this->request = new HttpRequest();
        $this->response = new HttpResponse();

        CommandConfigurationHandler::init();

        $commandResolver = new CommandResolver();

        $this->commandConfig = $commandResolver->getCommand($this->request);

        $filters = array(
            new SessionFilter(),
            new SecurityFilter(),
            new NavigationFilter(),
            new GuiMessageFilter()
        );

        $this->execute($filters);
    }

    private function execute($filters) {

        $commandInstance = $this->commandConfig->createCommandInstance();
        $commandInstance->init($this->request, $this->response);
        
        $filterInvocation = new FilterInvocation($filters, $this);

        $filterInvocation->invokeFilters();

        $this->response->flush();
    }

    public function executeCommand() {
        
        $methodName = $this->commandConfig->getMethodName();
        $this->commandConfig->getCommandInstance()->$methodName();
    }

    /**
     * @return HttpRequest
     */
    public function getHttpRequest() {
        return $this->request;
    }

    /**
     * @return HttpResponse
     */
    public function getHttpResponse() {
        return $this->response;
    }

    /**
     * @return CommandConfiguration
     */
    public function getCommandConfig() {
        return $this->commandConfig;
    }

}

?>
