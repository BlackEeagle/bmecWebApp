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
            new CommandConfiguration(4, "LoginCommand", "doLogout")
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
