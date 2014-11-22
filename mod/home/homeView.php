<?php


/**
 * Class homeView
 *
 * @author:     Elvis D'Andrea
 * @email:      elvis.vista@gmail.com
 *
 */

class homeView extends View {


    /**
     * The home view directory
     *
     * @var string
     */
    private $viewdir;

    /**
     * The constructor
     */
    public function __construct() {
        parent::__construct();
        $this->viewdir = 'home';

    }

    public function loadHome() {
        $this->loadTemplate($this->viewdir . '/index');
    }

}