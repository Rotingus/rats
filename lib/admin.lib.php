<?php
/* $Id: admin.lib.php,v 1.5 2003/04/22 18:34:54 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/admin.lib.php,v $ */

global $sessionLoaded, $sessionUsername, $sessionPassword, $sessionDebug;
$sessionLoaded = false;
$sessionUsername = '';
$sessionPassword= '';
$sessionDebug = FALSE;

function printall($item) {	
    global $sessionDebug;
    if($sessionDebug) {
        echo 'Variable status at '.$item.' point. <br />'."\n";
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
    //echo $query.' - res: '.$userhash;
    return ($userhash!=$MySQL_singleton_abort);
}

function admin_user_lookup($sessionUsername,$sessionPassword) {	
    return admin_user_lookup_mysql($sessionUsername,$sessionPassword);
}

function admin_validate() {	
    global $sessionUsername, $sessionPassword, $sessionLoaded;

    session_cache_limiter('nocache, private_no_expire, must-revalidate');
    session_cache_expire(60);
    
    admin_session_load($sessionUsername,$sessionPassword);
    printall('admin_validate.load');

    //post takes precedence
    $sessionUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    if(isset($_POST['username']))
        $sessionUsername = $_POST['username'];
    $sessionPassword = isset($_SESSION['username']) ? $_SESSION['password'] : '';
    if(isset($_POST['password']))
        $sessionPassword = $_POST['password'];


    $valid =  admin_user_lookup($sessionUsername,$sessionPassword);

    if(!$valid)
        return false;

    admin_session_start($sessionUsername,$sessionPassword);

    printall('admin_validate.admin_session_start');
    return true;
}

//returns a list of groups
function admin_getgroups($userid) {
    
}

//returns a map of the permissions
function admin_getpermissions($userid,$table) {
    
}

function admin_haspermissions($table,$perm) {
//hack for it to work
return true;
//TODO
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
