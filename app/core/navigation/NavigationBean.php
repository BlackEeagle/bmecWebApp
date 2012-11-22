<?php

/**
 * Description of NavigationBean
 *
 * @author Thom
 */
class NavigationBean {
    
    private $mainLevel;
    
    private $subLevel;
    
   public function __construct($mainLevel, $subLevel) {
       $this->mainLevel = $mainLevel;
       $this->subLevel = $subLevel;
   }
   
   public function getMainLevel() {
       return $this->mainLevel;
   }
   
   public function getSubLevel() {
       return $this->subLevel;
   }    
}

?>
