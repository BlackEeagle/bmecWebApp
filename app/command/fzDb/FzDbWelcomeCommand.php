<?php

/**
 * Description of FzDbWelcomeCommand
 *
 * @author Thom
 */
class FzDbWelcomeCommand extends FzDbCommand {
    
    public function welcome() {
        
        $this->navigationBean = new NavigationBean(NavigationHelper::FZ_INVENTAR_TOP);
        
        $this->response->setSmartyTemplateName("fahrzeugInventar/start.tpl");
    }
}

?>
