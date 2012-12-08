<?php

/**
 * Description of Config
 *
 * @author Thom
 */
class StaticConfig {
    
    public static function getConfig() {
        return self::buildConfig();
    }
    
    private static function buildConfig() {
        
        return array(
          /*-
           * DATENBANK
           */
          "db" => array(
              "username" => "bmec",
              "password" => "bmec",
              "usePersistentConnection" => true
          )
        );
    }
}

?>
