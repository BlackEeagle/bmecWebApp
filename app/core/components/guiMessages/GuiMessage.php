<?php

/**
 * Description of GuiMessage
 *
 * @author Thom
 */
class GuiMessage {
    
    private $messageKey;
    
    private $type;
    
    private $fieldNames = array();
    
    /**
     * 
     * @param string $type
     * @param string $messageKey
     * @param array $fieldNames
     */
    public function __construct($type, $messageKey, $fieldNames = array()) {
        $this->type = $type;
        $this->messageKey = $messageKey;
        
        if(is_array($fieldNames)) {
            $this->fieldNames = $fieldNames;
        }
        else {
            $this->fieldNames = array($fieldNames);
        }
    }
    
    /**
     * 
     * @param string $fieldName
     */
    public function addFieldName($fieldName) {
        $this->fieldNames[] = $fieldName;
    }
    
    /**
     * @param array $fieldNames
     */
    public function setFieldNames(array $fieldNames) {
        $this->fieldNames = $fieldNames;
    }
    
    /**
     * @return array
     */
    public function getFieldNames() {
        return $this->fieldNames;
    }
    
    /**
     * @return string
     */
    public function getFieldNamesConcat() {
        return implode(", ", $this->fieldNames);
    }
    
    /**
     * @return string
     */
    public function getMessageKey() {
        return $this->messageKey;
    }
    
    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }
}

?>
