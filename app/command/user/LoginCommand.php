<?php

/**
 * Description of ShowLoginForm
 *
 * @author Thom
 */
class LoginCommand extends AbstractCommand {

    public function showForm() {

        $this->navigationBean = new NavigationBean(NavigationHelper::USER_LOGIN);

        $this->response->getSmarty()->assign("username");
        
        $this->response->setSmartyTemplateName("user/login.tpl");
    }

    public function doLogout() {

        $secService = SecurityService::getInstance();

        $secService->logout();

        $this->response->addHeader("Location", "?cmd=1");
    }

    public function doLogin() {

        $msgHandler = GuiMessageHandler::getInstance();

        /* -
         * VALIDATION
         */

        if (!$this->request->issetParameter("username") || !$this->request->getParameter("username")) {
            $msgHandler->addGuiMessage(new GuiMessage(GuiMessageType::FIELD_VALIDATION_ERROR, "bmecWebApp.login.validation.username", "username"));
        }

        if (!$this->request->issetParameter("password") || !$this->request->getParameter("password")) {
            $msgHandler->addGuiMessage(new GuiMessage(GuiMessageType::FIELD_VALIDATION_ERROR, "bmecWebApp.login.validation.password", "password"));
        }

        /*-
         * LOGIN
         */
        
        if ($msgHandler->hasValidationErrors() === false) {
            $secService = SecurityService::getInstance();

            $succ = $secService->login($this->request->getParameter("username"), $this->request->getParameter("password"));

            if ($succ === false) {
                $msgHandler->addGuiMessage(new GuiMessage(GuiMessageType::FIELD_VALIDATION_ERROR, "bmecWebApp.login.validation.credentials", array("username", "password")));
            }
        }

        /*-
         * RESPONSE
         */
        
        if ($msgHandler->hasValidationErrors() === false) {
            $this->response->addHeader("Location", "?cmd=1");
        } else {
            $this->navigationBean = new NavigationBean(NavigationHelper::USER_LOGIN);

            $this->response->getSmarty()->assign("username", $this->request->getParameter("username"));
            $this->response->setSmartyTemplateName("user/login.tpl");
        }
    }
    
    public function getRequiredRoles($method) {
        return array();
    }
}

?>