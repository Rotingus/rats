<?php 
  //foo
function 
v($n,$default=null)
{
    $data = getData();
    if (isset($data[$n])) {
        $v = $data[$n];
        if ($v == 'on') {
        $v = true;
        }
    } else {
        $v = $default;
    }
    return $v;
}

function
getData()
{
  $datatmp = array_merge($_REQUEST);
  if(isset($GLOBALS['_MASTER'])) {
    $data = array_merge($datatmp, $GLOBALS['_MASTER']);
  } else {
    $data = $datatmp;
  }
  return $data;
}

function
selectData($prefix,
           $data)
{
    $newdata = array();
    $sublen = strlen($prefix);
    foreach($data as $key =>$value) {
        if (substr($key, 0, $sublen) == $prefix) {
            $newdata[substr($key, $sublen)] = $value;
        }
    }
    return $newdata;
}

function
unsetPrefixMaster($prefix,$data) {
  $sublen = strlen($prefix);
  foreach($data as $key => $value) {
    if (substr($key, 0, $sublen) == $prefix) {
      unset($GLOBALS['_MASTER'][$key]);
      unset($_POST[$key]);
      unset($_GET[$key]);
    }
  }
}

function
addPrefixKeys($prefix,
              $data)
{
    $newdata = array();
    $sublen = strlen($prefix);
    foreach($data as $key =>$value) {
        $newdata[$prefix.$key] = $value;
    }
    return $newdata;
}

function
mapArrayKeys($mapping,
             $arraydata)
{
    //mapping should be oldkey => newkey
    //both oldkey and newkey should occur only ONCE in the $mapping
    //oldkey must occur only once in $arraydata as well
    $newdata = array();
    foreach($mapping as $oldkey =>$newkey) {
        if (array_key_exists($oldkey, $arraydata)) {
            $newdata[$newkey] = $arraydata[$oldkey];
        }
    }
    return $newdata;
}

function squashDateArray($datearray) {
return sprintf('%4d-%2d-%2d %2d:%2d:%2d',$datearray['year'],$datearray['month'],$datearray['day'],$datearray['hour'],$datearray['minute'],$datearray['second']);
}

?>
