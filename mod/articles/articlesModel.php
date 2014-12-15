<?php

/**
 * Class articlesModel
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 * So far, no database access
 * is going on the home page
 */
class articlesModel extends Model {


    /**
     * Runs the query to get
     * articles from database
     *
     * @return  bool        - If it has results
     */
    public function getArticlesList() {
        $this->addField('id');
        $this->addField('image');
        $this->addField('sdate');
        $this->addField('title');
        $this->addField('description');

        $this->addFrom('articles');

        $this->addWhere('public is true');

        $this->runQuery();
        return !$this->isEmpty();

    }

    /**
     * Runs the query to get
     * an article content
     *
     * @param   string      $id     - The article ID
     * @return  bool                - If it has results
     */
    public function getArticle($id) {

        $this->addField('id');
        $this->addField('image');
        $this->addField('sdate');
        $this->addField('title');
        $this->addField('description');
        $this->addField('html');

        $this->addFrom('articles');

        $this->addWhere('id = "' . $id . '"');

        $this->runQuery();
        return !$this->isEmpty();
    }

}