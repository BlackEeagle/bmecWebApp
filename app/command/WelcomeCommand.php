<?php

/**
 * Description of WelcomeCommand
 *
 * @author Thom
 */
class WelcomeCommand extends AbstractCommand {

    public function home() {
        $this->navigationBean = new NavigationBean(NavigationHelper::FZ_INVENTAR_TOP, NavigationHelper::FZ_INVENTAR_SUB_START);
        
        $this->response->setSmartyTemplateName("fahrzeugInventar/start.tpl");
    }
}

?>
