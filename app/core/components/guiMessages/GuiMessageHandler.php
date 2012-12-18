<?php

/**
 * Description of GuiMessageHandler
 *
 * @author Thom
 */
class GuiMessageHandler {

    /**
     * @var GuiMessageHandler 
     */
    private static $instance;

    /**
     * @var array 
     */
    private $messages = array();

    private function __construct() {
        $this->messages[GuiMessageType::INFO] = array();
        $this->messages[GuiMessageType::FIELD_VALIDATION_ERROR] = array();
        $this->messages[GuiMessageType::VALIDATION_ERROR] = array();
        $this->messages[GuiMessageType::ERROR] = array();
        $this->messages[GuiMessageType::SUCCESS] = array();
    }

    /**
     * @return GuiMessageHandler
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new GuiMessageHandler();
        }

        return self::$instance;
    }

    /**
     * @param GuiMessage $guiMessage
     */
    public function addGuiMessage(GuiMessage $guiMessage) {

        if (array_key_exists($guiMessage->getType(), $this->messages) === false) {
            throw new Exception("guiMessageType " . $guiMessage->getType() . " unknown.");
        }

        $this->messages[$guiMessage->getType()][] = $guiMessage;
    }

    /**
     * @param string $type
     * @return boolean
     */
    public function hasGuiMessageOfType($type) {

        return array_key_exists($type, $this->messages) && empty($this->messages[$type]) === false;
    }

    /**
     * 
     * @param type string
     * @return int
     */
    public function countGuiMessageOfType($type) {
        $count = 0;

        if (array_key_exists($type, $this->messages)) {
            $count = count($this->messages[$type]);
        }

        return $count;
    }

    /**
     * @param string $type
     * @return array
     */
    public function getGuiMessagesOfType($type) {

        $msgs = array();

        if (array_key_exists($type, $this->messages)) {
            $msgs = $this->messages[$type];
        }

        return $msgs;
    }

    /**
     * @return string
     */
    public function getFieldValidationErrorFieldNamesConcat() {

        $fieldNames = array();

        foreach ($this->getGuiMessagesOfType(GuiMessageType::FIELD_VALIDATION_ERROR) as $message) {
            $fieldNames = array_merge($fieldNames, $message->getFieldNames());
        }

        return implode("\", \"", $fieldNames);
    }
}

?>
