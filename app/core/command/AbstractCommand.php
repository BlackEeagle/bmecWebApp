<?php

/**
 * Description of AbstractCommand
 *
 * @author Thom
 */
abstract class AbstractCommand implements Command {

    /**
     * @var HttpRequest 
     */
    protected $request;

    /**
     * @var HttpResponse
     */
    protected $response;

    /**
     * @var NavigationBean 
     */
    protected $navigationBean;
    
    /**
     * @var SmartyHelper 
     */
    protected $smartyHelper;
    
    /**
     *
     * @var ValidationService 
     */
    protected $validationService;

    public function __construct() {
        
    }

    public function init(HttpRequest $request, HttpResponse $response) {
        $this->request = $request;
        $this->response = $response;
        
        
        $this->navigationBean = new NavigationBean();
        $this->smartyHelper = SmartyHelper::getInstance($this->request, $this->response);
        $this->validationService = ValidationService::getInstance($this->request);
    }

    /**
     * @return NavigationBean
     */
    public function getNavigationBean() {
        return $this->navigationBean;
    }
}

?>
