<?php

abstract class tax 
{
    abstract public function getCost(): float;
}
 
class tax1 extends tax
{
    private $cost = 2;
    public function getCost(): float
    {
        return $this->cost;
    }
}
 
class tax2 extends tax
{
    private $cost = 4;
    public function getCost(): float
    {
        return $this->cost;
    }
 
}

abstract class taxDecorator extends tax
{
    protected $tax;
    public function __construct(tax $tax)
    {
       $this->tax = $tax;
    }
} 

class tax3Decorator extends taxDecorator
{
    public function getCost(): float
    {
        return $this->tax->getCost() + 2;
    }
}
 
class tax4Decorator extends taxDecorator
{
    public function getCost(): float
    {
        return $this->tax->getCost() + 1;
     }
}

$tax = new tax2();
echo $tax->getCost();
// This prints 4 the cost of a basic tax2;
 
$tax = new tax4Decorator(new tax2());
echo $tax->getCost();
// This prints 5: tax2 is 4 + tax4 is 1 = 5




?>