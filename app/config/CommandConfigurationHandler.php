<?php

/**
 * Description of CommandConfigurationHandler
 *
 * @author Thom
 */
class CommandConfigurationHandler {

    private static $configurations;

    public static function init() {
        self::$configurations = [
            new CommandConfiguration(1, new WelcomeCommand()),
            // User
            new CommandConfiguration(2, new ShowLoginFormCommand()),
            new CommandConfiguration(3, new DoLoginCommand()),
            new CommandConfiguration(4, new DoLogoutCommand())
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
