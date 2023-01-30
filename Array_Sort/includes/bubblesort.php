<?php

class BubbleSort{

    function bubbleSort(&$arr1)
    {
        $n1 = sizeof($arr1);
        for($i1 = 0; $i1 < $n1; $i1++)
            {
            for ($j1 = 0; $j1 < $n1 - $i1 - 1; $j1++)
            {
                if ($arr1[$j1] < $arr1[$j1+1])
                {
                    $t1 = $arr1[$j1];
                    $arr1[$j1] = $arr1[$j1+1];
                    $arr1[$j1+1] = $t1;
                }
            }
        }
    }
}