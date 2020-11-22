<?php

spl_autoload_register(function($class) {
    //$path = str_replace('\\',DIRECTORY_SEPARATOR, $class.'.php');    
    if ($class=='') {
      return;
    }
    $pa = explode ('\\', $class);
    if (count($pa)==0) {
      return;
    }
    if (array_first($pa) == 'Mini') {
      array_shift($pa);
    }
    array_unshift($pa, 'application');
    $path = implode(DIRECTORY_SEPARATOR, $pa);
    $path = $path.'.php';
    //echo $class.'<br>';
    //echo ROOT.$path.'<br>';
    //die('111');
    if (file_exists(ROOT.$path)) {
      require ROOT.$path;
      //echo '<br>include<br>';
    } else {
      //echo '<br>not include<br>';
    }
});

function array_first($array, $default = null)
{
   foreach ($array as $item) {
       return $item;
   }
   return $default;
}