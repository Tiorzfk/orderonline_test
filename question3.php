<?php
    function pattern_count($text, $pattern) {
        $text_arr = str_split($text);
        $count = 0;
        for ($i=0; $i < count($text_arr); $i++) { 
            $temp = $text_arr[$i];
            for ($j=($i+1); $j < count($text_arr); $j++) { 
                $temp .= $text_arr[$j];

                if($temp == $pattern)
                {
                    $count++;
                    break;
                }
            }
        }

        return $count;
    }

    echo pattern_count("hell", "hello")
?>