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
     * @return bool
     */
    public function getArticlesList() {
        $this->addField('id');
        $this->addField('sdate');
        $this->addField('title');

        $this->addFrom('articles');

        $this->runQuery();
        return !$this->isEmpty();

    }

}