<?php

/**
 * Description of SecurityFilter
 *
 * @author Thom
 */
class SecurityFilter implements Filter {

    public function execute(FilterInvocation $invocation, HttpRequest $request, HttpResponse $response, CommandConfiguration $commandConfiguration) {

        $securityService = SecurityService::getInstance();

        if ($this->isUserAllowed($securityService, $commandConfiguration->getCommandInstance(), $commandConfiguration->getMethodName()) === false) {

            $response->addHeader("Location", "?cmd=1");
        } else {
            $invocation->invoke($invocation);

            $response->getSmarty()->assign("security", $securityService->createSecurityBean());

            $fzDbSecurity = FahrzeugDbSecurityService::getInstance();
            $response->getSmarty()->assign("fzDbSecurity", $fzDbSecurity->createSecurityBean());
        }
    }

    /**
     * 
     * @param SecurityService $secService
     * @param Command $command
     * @param string $methodName
     * @return boolean
     */
    private function isUserAllowed(SecurityService $secService, Command $command, $methodName) {

        $allowed = false;
        $requiredRoles = $command->getRequiredRoles($methodName);

        if ($secService->isUserLoggedIn()) {

            if (!empty($requiredRoles)) {
                $userRoles = $secService->getUserRoles();

                foreach ($requiredRoles as $role) {
                    if (in_array($role, $userRoles)) {
                        $allowed = true;
                        break;
                    }
                }
            } else {
                $allowed = true;
            }
        } else if (empty($requiredRoles)) {
            $allowed = true;
        }

        return $allowed;
    }

}

?>
