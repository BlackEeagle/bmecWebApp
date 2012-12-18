<?php

/**
 * Description of FzDbVorbildCommand
 *
 * @author Thom
 */
class FzDbVorbildCommand extends FzDbCommand {

    private $vorbildService;
    private $gattungService;
    private $epocheService;

    public function __construct() {
        parent::__construct();

        $this->vorbildService = VorbildService::getInstance();
        $this->gattungService = GattungService::getInstance();
        $this->epocheService = EpocheService::getInstance();
    }

    public function init(HttpRequest $request, HttpResponse $response) {
        parent::init($request, $response);

        $this->navigationBean = new NavigationBean(NavigationHelper::FZ_INVENTAR_TOP, NavigationHelper::FZ_INVENTAR_SUB_VORBILD);
    }

    private function prepareSelects() {

        $evus = $this->smartyHelper->buildArrayForSelect($this->vorbildService->getAllEvus(), "id", "name");
        $this->response->getSmarty()->assign("evuList", $evus);


        $gattungen = $this->smartyHelper->buildArrayForSelect($this->gattungService->getAllGattung(), "id", "name");
        $this->response->getSmarty()->assign("gattungList", $gattungen);


        $epoche = $this->smartyHelper->buildArrayForSelect($this->epocheService->getAllEpochen(), "id", "name");
        $this->response->getSmarty()->assign("epocheList", $epoche);
    }

    public function blank() {

        $this->prepareSelects();

        $this->smartyHelper->assignEmpty(array("evu", "gattung", "typ", "serie", "farbe", "geschwindigkeit", "achsen", "epoche"));
        
        $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
    }

    public function save() {

        /* -
         * VALIDATION
         */

        $this->validationService->checkOnEmptyString("typ", "fzInventar.vorbild.validation.typ");
        $this->validationService->checkOnEmptyString("serie", "fzInventar.vorbild.validation.serie");
        $this->validationService->checkOnEmptyString("farbe", "fzInventar.vorbild.validation.farbe");
        $this->validationService->checkOnPositiveInteger("geschwindigkeit", "fzInventar.vorbild.validation.geschwindigkeit");
        $this->validationService->checkOnPositiveInteger("achsen", "fzInventar.vorbild.validation.achsen");

        /* -
         * SAVE
         */
        
        

        /* -
         * RESPONSE
         */

        if ($this->validationService->hasValidationErrors()) {
            $this->prepareSelects();
            
            $this->smartyHelper->assignRequestParams(array("evu", "gattung", "typ", "serie", "farbe", "geschwindigkeit", "achsen", "epoche"));
            
            $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
        } else {
            
        }
    }

}

?>
