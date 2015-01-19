<?php

/**
 * Class contactControl
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 */


class contactControl extends Control {

    /**
     * The Model
     *
     * @var contactModel
     */
    private $model;

    /**
     * The View
     *
     * @var contactView
     */
    private $view;

    /**
     * The constructor
     *
     * It creates the Model and View Instances
     */
    public function __construct() {
        parent::__construct();
        $this->model = new contactModel();
        $this->view  = new contactView();
    }

    /**
     * Sends the important contact
     *
     */
    public function send() {

        if ($this->getPost('validation') != '')
            $this->throw404();

        if (!$this->validatePost('email', 'name', 'message')) {
            $this->commitShow('#empty');
        }

        $data = $this->getPost('email', 'name', 'message');
        $sent = $this->model->registerContact($data);

        $tpl = 'sent';

        if (!$sent)
            $tpl = 'ops';

        $this->view->loadTemplate($tpl);
        $this->commitReplace($this->view->render(), '#three');

    }

    /**
     * About page
     */
    public function about() {

        $this->view->loadTemplate('about');
        $this->commitReplace($this->view->render(), '#two');
    }


}