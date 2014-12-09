<?php

/**
 * Class articlesControl
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 */


class articlesControl extends Control {

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
        $this->model = new articlesModel();
        $this->view  = new articlesView();
    }

    /**
     * Action that lists the articles
     *
     * It will get articles from database
     * and display on a table
     */
    public function articleList() {

        $this->view->loadTemplate(LNG . '/articlesList');
        $this->model->getArticlesList();
        $this->view->setVariable('table', $this->model->dbGrid());

        $this->commitReplace($this->view->render(), '#two');
    }


}