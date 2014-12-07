<?php

/**
 * Class contactModel
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 * So far, no database access
 * is going on the home page
 */
class contactModel extends Model {

    /**
     * Registers site contact into database
     *
     * @param   array   $data       - The content to save
     * @return  bool                - It worked?
     */
    public function registerContact(array $data) {

        foreach ($data as $field => $value) {
            $this->addInsertSet($field . ' = "' . $value . '"');
        }

        $this->setInsertTable('contacts');
        $this->runInsert();

        return $this->getResult();

    }

}