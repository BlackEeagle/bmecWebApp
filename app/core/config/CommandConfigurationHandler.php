<?php

/**
 * Description of CommandConfigurationHandler
 *
 * @author Thom
 */
class CommandConfigurationHandler {

    /**
     * @var array 
     */
    private static $configurations;

    public static function init() {
        self::$configurations = [
            new CommandConfiguration(1, "WelcomeCommand","home"),
            // Login
            new CommandConfiguration(2, "LoginCommand", "showForm"),
            new CommandConfiguration(3, "LoginCommand", "doLogin"),
            new CommandConfiguration(4, "LoginCommand", "doLogout"),
            // FzDb
            new CommandConfiguration(5, "FzDbWelcomeCommand", "welcome"),
            new CommandConfiguration(6, "FzDbVorbildCommand", "blank"),
            new CommandConfiguration(7, "FzDbVorbildCommand", "save"),
            new CommandConfiguration(8, "FzDbVorbildCommand", "edit"),
            new CommandConfiguration(9, "FzDbVorbildCommand", "listAll")
        ];
    }

    private static function getConfigurations() {
        return self::$configurations;
    }

    public static function getCommandConfigWithId($id) {
        $cmdConfig = null;

        foreach (self::getConfigurations() as $commandConfiguration) {
            if ($commandConfiguration->getCommandId() == $id) {
                $cmdConfig = $commandConfiguration;
                break;
            }
        }

        return $cmdConfig;
    }

}

?>