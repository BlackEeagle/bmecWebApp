<?php

/**
 * Description of WelcomeCommand
 *
 * @author Thom
 */
class WelcomeCommand extends AbstractCommand {

    public function home() {
        
        $this->response->setSmartyTemplateName("welcome.tpl");
    }
    
    /**
     * @return array
     */
    public function getRequiredRoles($method) {
        return array();
    }
}

?>
