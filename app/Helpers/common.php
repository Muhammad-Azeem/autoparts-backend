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

function get_security_img(){
    $s_img = [
        ['title'=>'Aeroplane','i'=>'fa-plane','value'=>'Aeroplane'],
        ['title'=>'Bell','i'=>'fa-bell','value'=>'Bell'],
        ['title'=>'Star','i'=>'fa-star','value'=>'Star'],
        ['title'=>'Football','i'=>'fa-futbol','value'=>'Football'],
        ['title'=>'Camera','i'=>'fa-camera','value'=>'Camera'],
        ['title'=>'Book','i'=>'fa-book','value'=>'Book'],
        ['title'=>'Car','i'=>'fa-car','value'=>'Car'],
        ['title'=>'Heart','i'=>'fa-heart','value'=>'Heart'],
        ['title'=>'Mobile','i'=>'fa-mobile-alt','value'=>'Mobile'],
        ['title'=>'Bicycle','i'=>'fa-bicycle','value'=>'Bicycle'],
        ['title'=>'Umbrella','i'=>'fa-umbrella','value'=>'Umbrella'],
        ['title'=>'Home','i'=>'fa-home','value'=>'Home'],
        ['title'=>'Truck','i'=>'fa-truck','value'=>'Truck'],
        ['title'=>'Hand','i'=>'fa-hand-paper','value'=>'Hand'],
        ['title'=>'Apple','i'=>'fa-apple-alt','value'=>'Apple']
    ];
    return $s_img;
}
?>
