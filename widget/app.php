<?php

#require_once 'yapd/dbg.php';

// Include configuration constants:
    require_once 'config.php';

// Checking preconditions:
if(!defined('ONEAPI_LIBRARY_PATH') || !ONEAPI_LIBRARY_PATH) {
    echo 'Please fill ONEAPI_LIBRARY_PATH in conf.php';
    die();
}
if(!defined('USERNAME') || !USERNAME) {
    echo 'Please fill USERNAME in conf.php';
    die();
}
if(!defined('PASSWORD') || !PASSWORD) {
    echo 'Please fill PASSWORD in conf.php';
    die();
}

// Include OneApi library:
require_once ONEAPI_LIBRARY_PATH . '/client.php';

// Common constants:
define('PUSH_LOG_DIRECTORY', 'push_log');

if(!is_dir(PUSH_LOG_DIRECTORY)) {
    echo 'Please create a writable directory named "' . PUSH_LOG_DIRECTORY . '"';
    die();
}

if(!is_writable(PUSH_LOG_DIRECTORY)) {
    echo 'The directory named "' . PUSH_LOG_DIRECTORY . '" is not writable';
    die();
}

session_start();

// ============================================================
// The following are just utility function for this sample app:
// ============================================================

function decodeFormParam($p) {
    return get_magic_quotes_gpc() ? stripslashes($p) : $p;    
}

function showFormMessage() {
    if(@$_GET['alert']) {
        echo decodeFormParam($_GET['alert']);
    } elseif(@$_GET['success']) {
        echo decodeFormParam($_GET['success']);
    }
}

function redirectWithFormError($url, $message) {
    redirectToForm(false, $url, $message);
}

function redirectWithFormSuccess($url, $message) {
    redirectToForm(true, $url, $message);
}

function redirectToForm($success, $url, $message) {
//    if(DEBUG)
//         $message .= "<hr/>" . implode('<br/>', Logs::getLogs());
//
//    $message .= '<hr><a href="index.php">home</a>';
//
//    if($success)
//        header('Location: ' . $url . '?success=' . urlencode($message));
//    else
//        header('Location: ' . $url . '?alert=' . urlencode($message));

    if (DEBUG)
        $message1 .= "<hr/>" . implode('<br/>');

    if ($success) {
        $message1 .= '<p>'. SUCCESS_MESSAGE .'</p>';
        header('Location: ' . $url . '?success=' . urlencode($message1));
    } else {
        $message1 .= '<p>'. ERROR_MESSAGE .'</p>';
        header('Location: ' . $url . '?alert=' . urlencode($message1));
    }
    
    $_SESSION['params'] = array();
    foreach($_GET as $key => $value)
        $_SESSION['params'][$key] = $value;
    foreach($_POST as $key => $value)
        $_SESSION['params'][$key] = $value;

    die();
}

function getFormParam($name) {
    return isset($_REQUEST[$name]) ? decodeFormParam($_REQUEST[$name]) : (
            isset($_SESSION['params'][$name]) ? $_SESSION['params'][$name] : ''
        );
}
