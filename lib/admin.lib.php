<?php
/* $Id: admin.lib.php,v 1.9 2003/04/30 18:16:48 robbat2 Exp $ */
/* $Source: /code/convert/cvsroot/infrastructure/rats/lib/admin.lib.php,v $ */

global $sessionLoaded, $sessionInfo, $sessionDebug;
$sessionLoaded = false;
$sessionInfo = array();
$sessionDebug = FALSE;


function printall($item) {	
    global $sessionDebug,$sessionInfo;
    if($sessionDebug) {
        echo 'Variable status at '.$item.' point. <br />'."\n";
        echo 'GET: '; print_r($_GET); echo '<br />'."\n";
        echo 'POST: '; print_r($_POST); echo '<br />'."\n";
        echo 'SESSION: '; print_r($_SESSION); echo '<br />'."\n";
        echo 'LOCAL SESSION: '; print_r($sessionInfo); echo '<br />'."\n";
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
    global $sessionInfo;
    admin_session_load();
    printall('admin_session_destroy.load');
    if(isset($_SESSION) && is_array($_SESSION)) {
        foreach($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
    }
    if(isset($_SESSION) && is_array($_SESSION)) {
        foreach($sessionInfo as $key => $value) {
            unset($sessionInfo[$key]);
        }
    }
    unset($sessionInfo[$key]);
    session_unset();
    printall('admin_session_destroy.unset');
    session_destroy();
    printall('admin_session_destroy.destroy');
    setcookie('PHPSESSID','empty',time(),'/','www.orbis-terrarum.net');
}

function admin_session_start($u,$p) {	
    global $sessionInfo, $_Users;
    printall('admin_session_start.start');
    session_set_cookie_params(0,'/',$_SERVER['SERVER_NAME']);
    session_start();
    printall('admin_session_start.session_start');	
    $sessionInfo['username'] = $u;
    $sessionInfo['password'] = $p;
    $sessionInfo['remoteip'] = $_SERVER['REMOTE_ADDR'];
    $sessionInfo['userid'] = $_Users->getID_login($sessionInfo['username']);
    admin_session_save();
    printall('admin_session_start.register');
}

function admin_session_save() {
    global $sessionInfo;
    foreach($sessionInfo as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
function admin_session_restore() {
    global $sessionInfo;
    foreach($_SESSION as $key => $value) {
        $sessionInfo[$key] = $value;
    }
}

function admin_user_lookup_mysql($username,$password) {	
    global $MySQL_singleton_abort, $_Users;
    //$query = 'SELECT MD5(CONCAT(UserLogin,UserBarcode)) AS hash FROM Users WHERE UserLogin=\''.$sessionUsername.'\' AND UserPassword=\''$md5password'\'';
    $userhash = $_Users->getID_login_password($username,$password);
    return ($userhash!=$MySQL_singleton_abort);
}

function admin_user_lookup($username,$password) {	
    return admin_user_lookup_mysql($username,$password);
}

function admin_varimport($varname) {
    $val = '';
    //post takes precedence
    if(isset($_POST[$varname])) {
        $val = $_POST[$varname];
    } else if (isset($_SESSION['username'])) {
        $val = $_SESSION[$varname];
    }
    return $val;
}

function admin_validate() {	
    global $sessionInfo, $sessionLoaded;

    session_cache_limiter('nocache, private_no_expire, must-revalidate');
    session_cache_expire(60);
    
    admin_session_load($sessionInfo);
    printall('admin_validate.load');

    $sessionInfo['username'] = admin_varimport('username');
    $sessionInfo['password'] = admin_varimport('password');
    printall('admin_validate.import');

    $valid =  admin_user_lookup($sessionInfo['username'],$sessionInfo['password']);
    printall('admin_validate.admin_user_lookup');

    if(!$valid) {
        return false;
    }
    printall('admin_validate.compare');

    admin_session_start($sessionInfo['username'],$sessionInfo['password']);
    printall('admin_validate.admin_session_start');
    return true;
}

//returns a list of groups
function admin_getgroups($userid) {
    global $_UserGroupMapping;
    return $_UserGroupMapping->getGroups($userid);
}

//returns a map of the permissions
function admin_getpermissions($userid) {
    global $_GroupActionMapping;
    $groups = admin_getgroups($userid);
    return $_GroupActionMapping->getActions($groups);
}

function admin_haspermissions($userid,$table,$action) {
    global $_Actions;
    //hack for it to work
    return true;
    //TODO
    $ActionID = $_Actions->getID_table_action($table,$action);
    $perms = admin_getpermissions($userid);
    return in_array($ActionID,$perms);
    
}

/* vim: set ft=php expandtab shiftwidth=4 softtabstop=4 tabstop=4: */
?>
