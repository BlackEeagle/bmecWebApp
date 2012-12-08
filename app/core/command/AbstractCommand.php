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
    
    public function __construct() {
        $this->navigationBean = new NavigationBean();
    }
    
    public function init(HttpRequest $request, HttpResponse $response) {
        $this->request = $request;
        $this->response = $response;
    }
    
    /**
     * @return NavigationBean
     */
    public function getNavigationBean() {
        return $this->navigationBean;
    }
}

?>
