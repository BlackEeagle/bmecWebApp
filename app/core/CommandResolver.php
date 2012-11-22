<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandResolver
 *
 * @author Thom
 */
class CommandResolver {

    private $defaultCommand;

    const COMMAND_PARAM = "cmd";
    const DEFAULT_COMMAND = "1";

    public function __construct($defaultCommand = self::DEFAULT_COMMAND) {
        $this->defaultCommand = $defaultCommand;
    }

    public function getCommand(HttpRequest $request) {
        $requestedCommandConfig = null;

        if ($request->issetParameter(self::COMMAND_PARAM)) {
            $requestedCmdId = $request->getParameter(self::COMMAND_PARAM);
            $requestedCommandConfig = CommandConfigurationHandler::getCommandConfigWithId($requestedCmdId);
        }

        if ($requestedCommandConfig == null) {
            $requestedCommandConfig = CommandConfigurationHandler::getCommandConfigWithId(self::DEFAULT_COMMAND);
        }

        if ($requestedCommandConfig == null) {
            throw new Exception("requested command and default command not loaded!");
        }

        return $requestedCommandConfig;
    }

}

?>
