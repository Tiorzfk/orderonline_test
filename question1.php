<?php

    function sum_deep($arr, $char, $node = 1) {
        $sum = 0;
        foreach ($arr as $c) {
            if(is_array($c))
            {
                $sum = $sum + sum_deep($c, $char, $node + 1);
            }else{
                if (strpos($c, $char) !== false)
                {
                    $sum = $sum + $node;
                }
            }
        }

        return $sum;
    }

    // echo sum_deep(["AB", ["XY"], ["YP"]], 'Y');
    // echo sum_deep(["", ["", ["XXXXX"]]], 'X');
    // echo sum_deep(["X"], 'X');
    // echo sum_deep([""], 'X');
    // echo sum_deep( ["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]], 'X');
    // echo sum_deep(["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]], 'X');

    function sum_deep_challenge($arr, $char, $node = 1) {
        $sum = 0;
        $char_arr = str_split($char);

        foreach ($char_arr as $k => $ca) {
            $sum_char = 0;
            foreach ($arr as $c) {
                if(is_array($c))
                {
                    $sum_char = $sum_char + sum_deep_challenge($c, $ca, $node + 1);
                }else{
                    if (strpos($c, $ca) !== false)
                    {
                        $sum_char = $sum_char + $node;
                    }
                }
            }

            $sum = $sum + ($sum_char * ($k+1));
        }

        return $sum;
    }

    echo sum_deep_challenge(["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]], 'ACI');
?>