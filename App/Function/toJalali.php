<?php
include 'jdf.php';
function toJalali($date){
    $date = strtotime($date);
    return  jdate('j',$date) . ' ' . jdate('F',$date) . '، ' . jdate('o',$date);
}

function toJalaliWithTime($date){
    $time = strtotime($date);
    return toJalali($date) . ' - ' .' ساعت ' .date('H:i:s',$time);
}
function getYear($date){
    $date = strtotime($date);
    return jdate('o',$date);
}

function getMonth($date){
    $date = strtotime($date);
    return jdate('F',$date);
}

function getDay($date){
    $date = strtotime($date);
    return jdate('d',$date);
}