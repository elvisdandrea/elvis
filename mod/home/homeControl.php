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
    public function itStarts($uri = array()) {

        $this->view->loadTemplate('index');

        if (count($uri)>1 && $uri[0] != '' && $uri[1] != '') {
            define('CALL', $uri[0]);
            $module = $uri[0].'Control';
            $action = $uri[1];
            if (class_exists($module)) {
                $control = new $module;
                if (method_exists($control,$action)){
                    ob_start();
                    $control->$action();
                    $result = ob_get_contents();
                    ob_end_clean();
                    $this->view->setVariable('page_content', $result);
                }
            }
        }
        echo $this->view->render();
        exit;
    }

    /**
     * When returning the home page, loads the inner content only
     */
    public function home() {
        #$this->view->loadTemplate( 'elements_example');
        $this->view->loadTemplate( LNG . '/centercontent');
        $this->commitReplace($this->view->render(), '#two');
    }
}