<?php

use Illuminate\Support\Carbon;

function generate_otp(): int
{
    return mt_rand(100000, 999999);
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

function addYear(): Carbon
{
    return Carbon::now()->addYear();
}

function addMount(): Carbon
{
    return Carbon::now()->addDays(30);
}
