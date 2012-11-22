<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FilterInvocation
 *
 * @author Thom
 */
class FilterInvocation {
    
    private $filters;
    
    private $frontController;
    
    public function __construct(array $filters, FrontController $frontController) {
        $this->filters = array_reverse($filters);
        
        $this->frontController = $frontController;
    }
    
    public function invokeFilters() {
        
        $this->invoke($this);
    }
    
    public function invoke(FilterInvocation $invocation) {
        
        if(count($invocation->filters) >= 1) {
            
            $nextFilter = array_pop($invocation->filters);
            
            $nextFilter->execute($invocation, $invocation->frontController->getHttpRequest(), $invocation->frontController->getHttpResponse(), $invocation->frontController->getCommandConfig());
        }
        else {
            $invocation->frontController->execteCommand();
        }
    }
}

?>
