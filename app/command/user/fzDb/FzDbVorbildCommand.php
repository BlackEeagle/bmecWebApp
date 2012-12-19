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

        $this->smartyHelper->assignEmpty(array("id", "evu", "gattung", "typ", "serie", "farbe", "geschwindigkeit", "achsen", "epoche"));

        $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
    }

    public function edit() {

        if ($this->validationService->isPositiveInteger("id") === false) {
            $guiMsg = GuiMessageHandler::getInstance();
            $guiMsg->addGuiMessage(new GuiMessage(GuiMessageType::VALIDATION_ERROR, "fzInventar.vorbild.validation.noId"));
        }

        if ($this->validationService->hasValidationErrors() === false) {
            $this->prepareSelects();

            $vorbildService = VorbildService::getInstance();
            $vorbild = $vorbildService->getById($this->request->getParameter("id"));

            if ($vorbild !== null) {
                $this->response->getSmarty()->assign("id", $vorbild->getId());
                $this->response->getSmarty()->assign("evu", $vorbild->getEvuId());
                $this->response->getSmarty()->assign("gattung", $vorbild->getGattungId());
                $this->response->getSmarty()->assign("typ", $vorbild->getTyp());
                $this->response->getSmarty()->assign("serie", $vorbild->getSerie());
                $this->response->getSmarty()->assign("farbe", $vorbild->getFarbe());
                $this->response->getSmarty()->assign("geschwindigkeit", $vorbild->getGeschwindigkeit());
                $this->response->getSmarty()->assign("achsen", $vorbild->getAchsen());
                $this->response->getSmarty()->assign("epoche", $vorbild->getEpocheId());
            }

            $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
        } else {
// redirect to list
        }
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

        if ($this->validationService->hasValidationErrors() === false) {
            $vorbild = new Vorbild();
            $vorbild->setId($this->request->getParameter("id"));
            $vorbild->setEvuId($this->request->getParameter("evu"));
            $vorbild->setGattungId($this->request->getParameter("gattung"));
            $vorbild->setTyp($this->request->getParameter("typ"));
            $vorbild->setSerie($this->request->getParameter("serie"));
            $vorbild->setFarbe($this->request->getParameter("farbe"));
            $vorbild->setGeschwindigkeit($this->request->getParameter("geschwindigkeit"));
            $vorbild->setAchsen($this->request->getParameter("achsen"));
            $vorbild->setEpocheId($this->request->getParameter("epoche"));

            $vorbildService = VorbildService::getInstance();
            $vorbildService->save($vorbild);
        }

        /* -
         * RESPONSE
         */

        if ($this->validationService->hasValidationErrors()) {
            $this->prepareSelects();

            $this->smartyHelper->assignRequestParams(array("id", "evu", "gattung", "typ", "serie", "farbe", "geschwindigkeit", "achsen", "epoche"));

            $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildEdit.tpl");
        } else {

            $this->response->addHeader("Location", "?cmd=8&id=" . $vorbild->getId());
        }
    }

    public function listAll() {
        
        $vorbildService = VorbildService::getInstance();
        $vorbilder = $vorbildService->getAll();
        
        $this->response->getSmarty()->assign("vorbilder", $vorbilder);
        $this->response->setSmartyTemplateName("fahrzeugInventar/vorbildList.tpl");
    }

}
?>