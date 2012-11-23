<?php

/**
 * Description of CommandConfiguration
 *
 * @author Thom
 */
class CommandConfiguration {

    private $commandId;

    private $command;
    
    public function __construct($commandId, Command $command) {
        $this->commandId = $commandId;
        $this->command = $command;
    }
    
    public function getCommandId() {
        return $this->commandId;
    }
    
    /**
     * @return Command
     */
    public function getCommand() {
        return $this->command;
    }
}

?>
