<?php
require(dirname(__FILE__).'/constants.inc.php');



spl_autoload_register('loadClasses');

function loadClasses($className){
    $path=BASE_PATH.'classes/';
    echo $path.'<br/>';
    $extension='.class.php';
    $full_path=$path.$className.$extension;
    if(!file_exists($full_path)) return false;
    else require_once($full_path);
}



