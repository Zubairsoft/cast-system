<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CarbonTutorialController extends Controller
{
    public function __invoke()
    {
        $date = Carbon::parse("1997-12-30 10:18:52");
        $now = Carbon::now();
        //  return $date->age;

        function binaryArrayToNumber($arr)
        {
            $rev_array = array_reverse($arr);
            $result = 0;
            for ($i = 0; $i < sizeof($rev_array); $i++) {
                if ($rev_array[$i] === 1) {
                    $result += pow(2, $i);
                }
            }
            return $result;
        }

        return binaryArrayToNumber([0, 1, 1, 1]);
    }
}
