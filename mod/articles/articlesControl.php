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
        $this->model->addGridColumn('Imagem', 'image', 'Image');
        $this->model->addGridColumn('Artigo', 'title', 'Text', 'description');
        $this->model->showDbGridTitles(false);
        $this->model->setDbGridAutoHeader(false);
        $this->model->setGridRowLink(BASEDIR . 'articles/view', 'id');
        $this->view->setVariable('table', $this->model->dbGrid());

        $this->commitReplace($this->view->render(), '#two', true);
        $this->scrollToElement('#two');
    }

    /**
     * Action that views an article
     */
    public function view() {

        $id = $this->getQueryString('id');
        $d = $this->model->getArticle($id);

        if (!$d) {
            $this->commitReplace($this->view->get404(), '#two', true);
            return;
        }
        $this->view->setVariable('content', $this->model->getRow(0));
        $this->view->loadTemplate(LNG . '/view');
        $this->commitReplace($this->view->render(), '#two', true);
        $this->scrollToElement('#two');
    }


}