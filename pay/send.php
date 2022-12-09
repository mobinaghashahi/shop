<?php

include_once("functions.php");
$api = 'test';
$amount = $_GET['price'];
$mobile = "شماره موبایل";
$factorNumber = "شماره فاکتور";
$description = "توضیحات";
$redirect = 'http://localhost:8080/shop13/pay/verify.php/';
$result = send($api, $amount, $redirect, $mobile, $factorNumber, $description);
$result = json_decode($result);
if($result->status) {
    $go = "https://pay.ir/pg/$result->token";
    header("Location: $go");
} else {
    echo $result->errorMessage;
}

