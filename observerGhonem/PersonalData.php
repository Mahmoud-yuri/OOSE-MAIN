<?php

class PersonalData
{
    private $id;
    private $name;

    private $email;

    private $password;

    private $dob;

    private $description;
    
    private $phoneNum;
    
    private $type;
    
    private $title;

    public function setID($id)
    {
        $this->id=$id;
        return $this;
    }
    public function setName($name)
    {
        $this->name=$name;
        return $this;
    }
    public function setemail($email)
    {
        $this->email=$email;
        return $this;
    }
    public function setpassword($password)
    {
        $this->password=$password;
        return $this;
    }
    public function setdob($dob)
    {
        $this->dob=$dob;
        return $this;
    }

    public function setdescription($description)
    {
        $this->description=$description;
        return $this;
    }

    public function setphoneNum($phone_Num)
    {
        $this->phone_Num=$phone_Num;
        return $this;
    }

    public function setype($type)
    {
        $this->type=$type;
        return $this;
    }

    public function settitle ($title)
    {
        $this->title=$title;
        return $this;
    }
}

?>