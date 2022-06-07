<?php
include_once "PersonalData.php";

class acceptor extends PersonalData
{
    private $message=array();
    private $paid;
    public function setpaid($paid): self
    {
        $this->paid=$paid;
        $this->notifyAllclients();
        // $this->acceptCash();
        return $this;
    }

    public function update ()
   {

   }

    public function getpaid($paid)
    {
        return $this->paid;
    }

    public function notifyAllclients()
    {
        foreach ($this->clients as $sms)
        {
            $sms->update();
        }
    }


    public function attach ($message)
    {
        array_push($this->clients,$message);
    }

    public function requestCash()
    {
        
    }
    public function acceptCash()
    {
        
    }
    public function requestProduct()
    {
        
    }
    public function acceptProuct()
    {
        
    }

    public function setMessage($message) : self 
    {
        $this->message=$message;
        return $this;
    }
}

?>