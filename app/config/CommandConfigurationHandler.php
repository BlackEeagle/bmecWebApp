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
            new CommandConfiguration(1, new WelcomeCommand())
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
