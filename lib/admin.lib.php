<?php
/* $Id: admin.lib.php,v 1.2 2003/03/13 11:29:08 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/admin.lib.php,v $ */

global $sessionLoaded, $sessionUsername, $sessionPassword, $sessionDebug;
$sessionLoaded = false;
$sessionUsername = '';
$sessionPassword= '';
$sessionDebug = FALSE;

function printall($item) {	
    global $sessionDebug;
    if($sessionDebug) {
        echo 'Variable status at $item point. <br />'."\n";
        echo 'GET: '; print_r($_GET); echo '<br />'."\n";
        echo 'POST: '; print_r($_POST); echo '<br />'."\n";
        echo 'SESSION: '; print_r($_SESSION); echo '<br />'."\n";
        echo 'COOKIE: '; print_r($_COOKIE); echo '<br />'."\n";
    }
}

function admin_session_load() {	
    global $sessionLoaded;
    if(isset($_COOKIE['PHPSESSID']) || isset($_POST['PHPSESSID'])) {	
        $sessionLoaded=true;
        session_start();
    }
}

function admin_session_destroy() {	
    admin_session_load();
    printall('admin_session_destroy.load');
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['remoteip']);
    session_unset();
    printall('admin_session_destroy.unset');
    session_destroy();
    printall('admin_session_destroy.destroy');
    setcookie('PHPSESSID','empty',time(),'/','www.orbis-terrarum.net');
}

function admin_session_start($u,$p) {	
    global $sessionUsername, $sessionPassword;

    printall('admin_session_start.start');
    session_set_cookie_params(0,'/',$_SERVER['SERVER_NAME']);
    session_start();
    printall('admin_session_start.session_start');	
    $sessionUsername = $u;
    $sessionPassword = $p;
    $_SESSION['username'] = $sessionUsername;
    $_SESSION['password'] = $sessionPassword;
    $_SESSIOn['remoteip'] = $_SERVER['REMOTE_ADDR'];
    printall('admin_session_start.register');
}

function admin_user_lookup_mysql($sessionUsername,$sessionPassword) {	
    global $MySQL_singleton_abort;
    //$query = 'SELECT MD5(CONCAT(UserLogin,UserBarcode)) AS hash FROM Users WHERE UserLogin=\''.$sessionUsername.'\' AND UserPassword=\''$md5password'\'';
    $query = 'SELECT UserID FROM Users WHERE UserLogin=\''.$sessionUsername.'\' AND UserPassword=\''.$sessionPassword.'\'';
    $userhash = MySQL_singleton($query);
    return ($userhash!=$MySQL_singleton_abort);
}

function admin_user_lookup($sessionUsername,$sessionPassword) {	
    return admin_user_lookup_mysql($sessionUsername,$sessionPassword);
}

function admin_validate() {	
    global $sessionUsername, $sessionPassword, $sessionLoaded;
    admin_session_load($sessionUsername,$sessionPassword);
    printall('admin_validate.load');

    $sessionUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    if(isset($_POST['username']) && !isset($_SESSION['username']))
        $sessionUsername = $_POST['username'];
    $sessionPassword = isset($_SESSION['username']) ? $_SESSION['password'] : '';
    if(isset($_POST['password']) && !isset($_SESSION['password']))
        $sessionPassword = $_POST['password'];

    $valid =  admin_user_lookup($sessionUsername,$sessionPassword);

    if(!$valid)
        return false;

    admin_session_start($sessionUsername,$sessionPassword);

    printall('admin_validate.admin_session_start');
    return true;
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
