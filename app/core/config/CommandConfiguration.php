<?php

/**
 * Description of CommandConfiguration
 *
 * @author Thom
 */
class CommandConfiguration {

    /**
     * @var int 
     */
    private $commandId;

    /**
     * @var string 
     */
    private $commandClassName;
    
    /**
     * @var string
     */
    private $methodName;
    
    /**
     * @var Command
     */
    private $commandInstance;
    
    public function __construct($commandId, $commandClassName, $methodName) {
        $this->commandId = $commandId;
        $this->commandClassName = $commandClassName;
        $this->methodName = $methodName;
    }
        
    /**
     * @return int
     */
    public function getCommandId() {
        return $this->commandId;
    }
    
    /**
     * @return Command
     */
    public function getCommandInstance() {
        
        if(!$this->commandInstance) {
            $this->commandInstance = new $this->commandClassName();
        }
        
        return $this->commandInstance;
    }
    
    /**
     * @return string
     */
    public function getCommandClassName()  {
        return $this->commandClassName;
    }
    
    /**
     * @return string
     */
    public function getMethodName() {
        return $this->methodName;
    }
}

?>
