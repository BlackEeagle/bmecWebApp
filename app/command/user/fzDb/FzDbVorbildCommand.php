<?php

/**
 * Description of FzDbVorbildCommand
 *
 * @author Thom
 */
class FzDbVorbildCommand extends FzDbCommand {
    
    public function blank() {
        
        $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
        
        $this->navigationBean = new NavigationBean(NavigationHelper::FZ_INVENTAR_TOP, NavigationHelper::FZ_INVENTAR_SUB_VORBILD);
    }    
}

?>
