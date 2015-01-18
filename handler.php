<?php
/**
 * App Handler File
 *
 * These functions will be called automatically
 * when an error event occurs.
 * If a class is not defined and is called,
 * the handler will automatically include the
 * file containing the class name
 *
 * @author:  Elvis D'Andrea
 * @email:  elvis.vista@gmail.com
 */


/**
 * Handler functions registration
 */
register_shutdown_function('fatalErrorHandler');
spl_autoload_register('autoLoad');

/**
 * Is it an ajax request?
 *
 * A function outside core to handle
 * when even core isn't working
 *
 * @return  bool
 */
function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/**
 * Fatal Error Handler
 */
function fatalErrorHandler(){
    $error = error_get_last();
    if ($error['type'] === E_ERROR || $error['type'] === E_USER_ERROR || $error['type'] === E_PARSE || $error['type'] === E_COMPILE_ERROR) {
        $var = '<h4>Tipo Erro: <b>' . $error['type'] . "</b><h4>";
        $var .= '<h4><b>Mensagem</b>: ' . $error['message'] . "<h4>";
        $var .= '<h3><b>Arquivo:</b> ' . $error['file'] . "</h3>";
        $var .= '<h3><b>Linha:</b> ' . $error['line'] . "</h3>";

        echo $var;
        exit;
    }
}

/**
 * Class Autoload Handler
 *
 * @param $class_name
 */
function autoLoad($class_name) {

    $search = array(
        MODDIR . '/' . CALL ,
        LIBDIR
    );

    foreach ($search as $dir) {
        $file = $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
}