<?php
  $xor_key = 'ByTheWay777';
  function xorIt($string, $key, $type = 0){
    $sLength = strlen($string);
    $xLength = strlen($key);
    for($i = 0; $i < $sLength; $i++) {
      for($j = 0; $j < $xLength; $j++) {
        if ($type == 1) {
          //decrypt
          $string[$i] = $key[$j]^$string[$i];
        } else {
          //crypt
          $string[$i] = $string[$i]^$key[$j];
        }
      }
    }
    return $string;
  }
?>
