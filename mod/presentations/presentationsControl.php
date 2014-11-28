<?php

/**
 * Class presentationsControl
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 */


class presentationsControl extends Control {

    /**
     * The Model
     *
     * @var presentationsModel
     */
    private $model;

    /**
     * The View
     *
     * @var presentationsView
     */
    private $view;

    /**
     * The constructor
     *
     * It creates the Model and View Instances
     */
    public function __construct() {
        parent::__construct();
        $this->model = new presentationsModel();
        $this->view  = new presentationsView();
    }

    /**
     * Returns the selected
     * presentation page
     */
    public function view() {

        $page = $this->getQueryString('page');
        $this->view->loadTemplate($page);

        $this->commitReplace($this->view->render(), '#two', true);
        $this->scrollToElement('#two');

    }


}