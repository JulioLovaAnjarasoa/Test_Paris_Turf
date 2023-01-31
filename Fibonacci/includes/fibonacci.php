<?php

class Fibonacci
{
    public function suite_de_fibonacci($n)
    {
        if ($n <= 0) return 0;
        if ($n == 1) return 1;

        return $this->suite_de_fibonacci($n - 1) + $this->suite_de_fibonacci($n - 2);
    }
}
