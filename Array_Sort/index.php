<?php

include 'includes/bubblesort.php';

$bubblesort = new BubbleSort();
$arr1 = array();

for ($i = 0; $i < 100; $i++) {
    $arr1[$i] = rand(0, 100) - 4;
}
$bubblesort->bubbleSort($arr1);
echo "Sorted array : \n";
echo "<br>";
foreach ($arr1 as $key => $value) {
    print('Indice ' . $key . ' => ' . $value);
    echo "<br>";
}
