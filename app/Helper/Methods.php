<?php

function generate_otp():int
{
    return mt_rand(100000,999999);
}

function defaultPassword()
{
    return "123456";
}