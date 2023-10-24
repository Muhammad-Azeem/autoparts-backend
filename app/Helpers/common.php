<?php
function _encrypt($str=""){
    $key = env('APP_KEY');
    $code = $key."--".$str."--".$key;
    return base64_encode($code);
}

// Decrypt data
function _decrypt($str=""){
    $code = base64_decode($str);
    $exp = explode("--",$code);
    $code = (isset($exp[1])) ? $exp[1] : "";
    return $code;
}
?>
