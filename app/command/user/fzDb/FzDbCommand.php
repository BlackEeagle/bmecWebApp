<?php

/**
 * Description of FzDbCommand
 *
 * @author Thom
 */
abstract class FzDbCommand extends AbstractCommand {
    
    public function getRequiredRoles($method) {
        return array(FahrzeugDbSecurityService::FZ_DB_ROLE);
    }
    
}

?>
