<?php

/**
 * Description of ValidationService
 *
 * @author Thom
 */
class ValidationService {

    /**
     * @var ValidationService 
     */
    private static $instance;

    /**
     * @var HttpRequest
     */
    private $request;

    /**
     * @var GuiMessageHandler 
     */
    private $msgHandler;

    /**
     * @param HttpRequest $request
     */
    private function __construct($request) {
        $this->request = $request;
        $this->msgHandler = GuiMessageHandler::getInstance();
    }

    /**
     * @param HttpRequest
     * @return ValidationService
     */
    public static function getInstance($request) {
        if (self::$instance == null) {
            self::$instance = new ValidationService($request);
        }

        return self::$instance;
    }

    /**
     * @param string $paramName
     * @return boolean
     */
    private function isEmptyString($paramName) {

        return ($this->request->issetParameter($paramName) && $this->request->getParameter($paramName)) === false;
    }

    /**
     * @param string $paramName
     * @return boolean
     */
    private function isInteger($paramName) {
        return ($this->isEmptyString($paramName) === false && is_numeric($this->request->getParameter($paramName)) && ctype_digit($this->request->getParameter($paramName)));
    }

    /**
     * @param string $paramName
     * @return boolean
     */
    public function isPositiveInteger($paramName) {
        return ($this->isInteger($paramName) && $this->request->getParameter($paramName) > 0);
    }
    
    private function addValidationError($messageKey, $fieldName) {
        $this->msgHandler->addGuiMessage(new GuiMessage(GuiMessageType::FIELD_VALIDATION_ERROR, $messageKey, $fieldName));
    }

    public function checkOnEmptyString($paramName, $messageKey) {
        if ($this->isEmptyString($paramName)) {
            $this->addValidationError($messageKey, $paramName);
        }
    }

    public function checkOnPositiveInteger($paramName, $messageKey) {
        if($this->isPositiveInteger($paramName) === false) {
            $this->addValidationError($messageKey, $paramName);
        }
    }

    /**
     * @return boolean
     */
    public function hasValidationErrors() {
        return $this->msgHandler->hasGuiMessageOfType(GuiMessageType::FIELD_VALIDATION_ERROR) || $this->msgHandler->hasGuiMessageOfType(GuiMessageType::VALIDATION_ERROR);
    }

}

?>
