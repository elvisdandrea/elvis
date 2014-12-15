<?php

/**
 * Class homeControl
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 * It is supposed to control
 * the mains page instance only
 *
 * Any other page or feature
 * should be coded on another
 * system module
 */


class homeControl extends Control {

    /**
     * The Model
     *
     * @var homeModel
     */
    private $model;

    /**
     * The View
     *
     * @var homeView
     */
    private $view;

    /**
     * The constructor
     *
     * It creates the Model and View Instances
     */
    public function __construct() {
        parent::__construct();
        $this->model = new homeModel();
        $this->view  = new homeView();
    }

    /**
     * The home page
     */
    public function itStarts() {

        $this->view->loadTemplate('index');
        echo $this->view->render();
    }

    /**
     * When returning the home page, loads the inner content only
     */
    public function home() {
        $this->view->loadTemplate( 'elements_example');
        #$this->view->loadTemplate( LNG . '/centercontent');
        $this->commitReplace($this->view->render(), '#two');
    }
}