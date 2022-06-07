<?php

include_once "acceptor.php";

abstract class ProuctCrud extends acceptor
{
    private $size;

    private $color;

    public function getColor($color)
    {
        $this->color=$color;
        return $this;
    }

    public function getSize($size)
    {
        $this->size=$size;
        return $this;
    }
}

?>