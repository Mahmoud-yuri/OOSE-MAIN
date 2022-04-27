<?php

use doctor as GlobalDoctor;
use manager as GlobalManager;
use patient as Globalpatient;
use user as Globaluser;


interface types
{
    public function login();
}


class manager implements types
{
    public function login()
    {

        echo " welcome manager ";
        echo "<br>" . "<a href='logout.php'>Log out</a>";
        echo "<br>" . "<a href='ppp.php'>User table</a>";
        header("location:p1.php");
    }
}

class doctor implements types
{
    public function login()
    {

        echo " welcome doctor ";
        echo "<br>" . "<a href='logout.php'>Log out</a>";
        echo "<br>" . "<a href='ppp.php'>User table</a>";
        header("location:p1.php");
    }
}

class patient implements types
{
    public function login()
    {

        echo " welcome patient ";
        echo "<br>" . "<a href='logout.php'>Log out</a>";
        echo "<br>" . "<a href='ppp.php'>User table</a>";
        header("location:p1.php");
    }
}
class user implements types
{
    public function login()
    {

        echo " welcome user ";
        echo "<br>" . "<a href='logout.php'>Log out</a>";
        echo "<br>" . "<a href='ppp.php'>User table</a>";
        header("location:prodppp.php");
    }
}



class record
{
    public $id;
    public $user;
    public $Email;
    public $pass;

    public $type;
    public $Ofmanager;
    function __construct()
    {
        $this->Ofmanager = new fmanager;
        //$this->Ofmanager->fileN = "users.txt";
        $this->Ofmanager->sep = "~";
    }

    function inter($condlog)
    {
        $manager = new GlobalManager;
        $doctor = new GlobalDoctor;
        $pat = new Globalpatient;
        $user = new Globaluser;
        if ($condlog == 1) {
            return $manager;
        } else if ($condlog == 2) {
            return $doctor;
        } else if ($condlog == 3) {
            return $pat;
        } else if ($condlog == 4) {
            return $user;
        }
        // } else {
        //     return 0;
        // }
    }
    function Esearch($es)
    {
        $val = new record;
        $line = $this->Ofmanager->Esearch($es);
        $arrline = explode($this->Ofmanager->sep, $line);

        $val->id = $arrline[0];

        if (isset($arrline[1])) {
            $val->user = $arrline[1];
        }
        if (isset($arrline[2])) {
            $val->Email = $arrline[2];
        }

        if (isset($arrline[3])) {
            $val->pass = $arrline[3];
        }
        if (isset($arrline[4])) {
            $val->type = $arrline[4];
        }

        return $val->type;
    }
    function Esearchid($es)
    {
        $val = new record;
        $line = $this->Ofmanager->Esearch($es);
        $arrline = explode($this->Ofmanager->sep, $line);

        $val->id = $arrline[0];

        if (isset($arrline[1])) {
            $val->user = $arrline[1];
        }
        if (isset($arrline[2])) {
            $val->Email = $arrline[2];
        }

        if (isset($arrline[3])) {
            $val->pass = $arrline[3];
        }
        if (isset($arrline[4])) {
            $val->type = $arrline[4];
        }

        return $val->id;
    }


    function records()
    {
        $ct1 = $this->Ofmanager->lastnum() + 1;
        $rec = $ct1 . $this->Ofmanager->sep . $this->user . $this->Ofmanager->sep . $this->Email . $this->Ofmanager->sep . md5($this->pass) . $this->Ofmanager->sep . $this->type;
        $this->Ofmanager->saveinfile($rec);
    }
    function Orecords()
    {
        $ct1 = $this->Ofmanager->lastnum() + 1;
        $rec = $ct1 . $this->Ofmanager->sep . $this->user . $this->Ofmanager->sep . $this->Email . $this->Ofmanager->sep . $this->pass . $this->Ofmanager->sep . $this->type;
        $this->Ofmanager->saveinfile($rec);
    }

    function get_user_by_id($id)
    {
        $val = new record;
        $line = $this->Ofmanager->search_l_id($id);
        $arrline = explode($this->Ofmanager->sep, $line);


        $val->id = $arrline[0];

        if (isset($arrline[1])) {
            $val->user = $arrline[1];
        }
        if (isset($arrline[2])) {
            $val->Email = $arrline[2];
        }

        if (isset($arrline[3])) {
            $val->pass = $arrline[3];
        }
        if (isset($arrline[4])) {
            $val->type = $arrline[4];
        }

        return $val;
    }
    function delete_user($id)
    {

        $line = $this->Ofmanager->search_l_id($id);
        $this->Ofmanager->delete_line($line);
    }


    function req($id)
    {

        $line = $this->Ofmanager->search_arr_id($id);
        return $line;
        
    }
    function req2($id)
    {

        $line = $this->Ofmanager->search_l_id($id);
        return $line;
    }


    function fin()
    {
        $ret = [];
        $myfile = fopen($this->Ofmanager->fileN, "r+") or die("not found");
        $i = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->Ofmanager->sep, $line);
            $ret[$i] = $this->get_user_by_id($arrline[0]);

            $i++;
        }
        fclose($myfile);
        return $ret;
    }
    function login($Email, $pass)
    {

        $myfile = fopen($this->Ofmanager->fileN, "r+") or die("not found");
        $i = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->Ofmanager->sep, $line);
            if (isset($arrline[2]) || isset($arrline[3])) {
                if ($Email == $arrline[2] && md5($pass) == $arrline[3]) {
                    return $arrline[4];
                }
            }

            $i++;
        }
        fclose($myfile);
        return 0;
    }
    function B1last()
    {
        $this->Ofmanager->Blast();
    }
}

class fmanager
{
    public $fileN;
    public $sep;
    //public $rec;

    function delete_line($line)
    {
        $contents = file_get_contents($this->fileN);
        $contents = str_replace($line, '', $contents);
        file_put_contents($this->fileN, $contents);
    }

    function saveinfile($rec)
    {
        $file1 = fopen($this->fileN, "a+");
        fwrite($file1, $rec . "\r\n");
        fclose($file1);
    }

    function search_l_id($id)
    {
        $myfile = fopen($this->fileN, "r+");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->sep, $line);

            if ($arrline[0] == $id) {
                return $line;
            }
        }
        return "";
    }
    function search_arr_id($id)
    {
        $myfile = fopen($this->fileN, "r+");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->sep, $line);

            if ($arrline[0] == $id) {
                return $arrline[3];
            }
        }
       // return "";
    }
    function Blast()
    {
        $i = 0;
        $myfile = fopen($this->fileN, "r+");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->sep, $line);

            $i++;
        }
        return $arrline;
    }
    function Esearch($es)
    {
        $myfile = fopen($this->fileN, "r+");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->sep, $line);

            if ($arrline[2] == $es) {
                return $line;
            }
        }
        return "";
    }
    function lastnum()
    {
        $myfile = fopen($this->fileN, "r+");
        $lastnum1 = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $arrline = explode($this->sep, $line);

            if ($arrline[0] != "") {
                $lastnum1 = $arrline[0];
            }
        }
        return $lastnum1;
    }
}
