<?php

function generate_otp():int
{
    return mt_rand(100000,999999);
}

function defaultPassword()
{
    return "123456";
}

function unsetEmptyParam(array|object $data)
{
    foreach ($data as $key => $value) {
        if (is_null($value)) {
           unset($data[$key]);
        }
    }

    return $data;
}