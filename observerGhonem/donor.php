<?php

include_once "acceptor.php";

class donor extends acceptor implements observer
{
    public function addproduct($product_pd)
    {

    }

    public function editproduct($product_pd)
    {

    }

    public function deleteproduct($product_pd)
    {


    }
    public function update()
    {
        echo($this->acceptor->getpaid())."<br>";
    }

    function __construct($acceptor)
    {
        $this->accepter=$acceptor;
        $this->acceptor->attach($this);
    }
}


?>