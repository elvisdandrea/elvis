<?php

/**
 * Class View
 *
 * The template Renderer
 *
 */
class View {

    /**
     * The Smarty Class
     *
     * @var Smarty
     */
    private $smarty;

    /**
     * The Template name
     *
     * @var string
     */
    private $template;

    /**
     * The Template Name
     *
     * An easy way to switch between templates
     * The tpl folder should contain a list
     * of templates to be chosen
     *
     * @var string
     */
    private $templateName;

    /**
     * The constructor
     *
     * It instances the Smarty class
     * and sets the template location
     */
    public function __construct() {

        $this->setTemplateName('strata');      //The default Template Name
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(TPLDIR . '/' . $this->templateName);

        define('T_CSSURL',  MAINURL . '/tpl/' . $this->templateName . '/res/css' );
        define('T_JSURL',   MAINURL . '/tpl/' . $this->templateName . '/res/js' );
        define('T_IMGURL',  MAINURL . '/tpl/' . $this->templateName . '/res/images' );
        define('T_FONTURL', MAINURL . '/tpl/' . $this->templateName . '/res/fonts' );

    }

    /**
     * Sets The Template Name
     *
     * @param   string      $name       - The Template Name
     */
    public function setTemplateName($name) {
        $this->templateName = $name;
    }

    /**
     * Loads a template file
     *
     * @param   string      $name       - The template name
     */
    public function loadTemplate($name) {
        
        $this->template = $name . '.tpl';
    }

    /**
     * Sets a variable in the template
     *
     * @param   string      $name   - The variable name
     * @param   string      $value  - The value
     */
    public function setVariable($name, $value) {
        
        $this->smarty->assign($name, $value);
    }

    /**
     * Renders a template
     *
     * @return string
     */
    public function render() {

        return $this->smarty->fetch($this->template);
    }
    
}