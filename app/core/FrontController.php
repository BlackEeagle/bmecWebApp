<?php

/**
 * Description of FrontController
 *
 * @author Thom
 */
class FrontController {

    private $request;
    
    private $response;
    
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
            new NavigationFilter()
        );

        $this->execute($filters);
    }

    private function execute($filters) {

       $filterInvocation = new FilterInvocation($filters, $this);

       $filterInvocation->invokeFilters();
       
       $this->response->flush();
    }
    
    public function execteCommand() {
        $this->commandConfig->getCommand()->execute($this->request, $this->response);
    }
    
    /**
     * 
     * @return HttpRequest
     */
    public function getHttpRequest() {
        return $this->request;
    }
    
    /**
     * 
     * @return HttpResponse
     */
    public function getHttpResponse() {
        return $this->response;
    }
    
    /**
     * 
     * @return CommandConfiguration
     */
    public function getCommandConfig() {
        return $this->commandConfig;
    }
}

?>
