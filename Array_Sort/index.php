<?php

include 'includes/bubblesort.php';

$bubblesort = new BubbleSort();
$arr1 = array(64, 32, 34, 26, 25, 43, 12, 68, 22, 90, 11);
$bubblesort->bubbleSort($arr1);
echo "Sorted array : \n";
print_r($arr1);