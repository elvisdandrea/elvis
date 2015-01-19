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
 * Is it running localhost server or prod server?
 *
 * @return bool
 */
function isLocal() {
    return (strpos($_SERVER['SERVER_ADDR'], '192.168') !== false || $_SERVER['HTTP_HOST'] == 'localhost');
}

/**
 * Fatal Error Handler
 *
 * To support all kind of errors, this must
 * be text-based instead of loading template files
 */
function fatalErrorHandler(){
    $error = error_get_last();
    if (!in_array($error['type'],
        array(
            E_ERROR,
            E_USER_ERROR,
            E_PARSE,
            E_COMPILE_ERROR
        ))
    ) return; ?>
    <style>
        body {
            clear: both;
            background: url("<?php echo IMGURL . '/bg.jpg'; ?>") repeat scroll 0 0 rgba(0, 0, 0, 0);
            font-family: "Strait",sans-serif;
        }
        h1 {
            clear: both;
            color: #fff;
            padding: 30px;
            font-family: "Fjalla One",sans-serif;
            font-size: 40px;
            margin-top: 1px;
            text-shadow: 6px 1px 6px #333;
        }
        h1 img {
            float: left;
            margin-top: -0.5em;
            padding: 0 1em 0 0;
        }
        .text {
            clear: both;
            border: medium none;
            color: #98af95;
            font-family: "Strait",sans-serif;
            font-size: 18px;
            outline: medium none;
            padding: 6px 30px 6px 6px;
            margin: 0;
            display: block;
        }
        .text label {
            line-height: 30px;
        }
        .text li {
            padding: 0.3em;
            font-size: 15px;
        }
        .banner {
            margin: 2.2em auto 0;
            width: 50%;
        }
        .message {
            background: none repeat scroll 0px 0px rgba(0, 0, 0, 0.25);
            text-shadow: 6px 1px 6px #333;
            padding: 1.2em;
        }
        .footer {
            text-align: center;
            margin: 1.8em 2.8em 0;
            font-size: 22px;
            font-weight: bold;
            color: #4cae4c;
        }
    </style>
    <div class="banner">
    <h1>
        <img src="<?php echo IMGURL. '/logo.png'; ?>" alt="cerberus_logo" width="115px"/>
        <label>Sorry, something went bad!</label></h1>
        <div class="message">
            <div class="text">
            <label>I know this is emarassing, but the server must be under maintenance. <br>Please come back later.</label>
            <?php if (ENVDEV == '0') exit; ?>
                <ul>
                    <li>Error: <?php echo $error['message']; ?> </li>
                    <li>File: <?php echo $error['file']; ?> </li>
                    <li>Line: <?php echo $error['line']; ?> </li>
                </ul>
            </div>
        </div>
    </div>
    <?php exit;
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