<?php

function open_file($FileName,$separator)
{   
$myfile=fopen($FileName,"r+") or die ("Unable to open file!");
while (!feof($myfile))
{
    $line=fgets($myfile);
    $ArrayLine=explode($separator,$line);
}
fclose($myfile);
}

function StoreRecord ($FileName,$record0,$record1,$record2,$record3,$record4,$record5,$record6)
{
$count=GetLastCount("User.txt","}")+1;
$myfile=fopen($FileName,"a+");
fwrite($myfile,$record0."/n/r",$record1."/n/r",$record2."/n/r",$record3."/n/r",$record4."/n/r",$record5."/n/r",$record6."/n/r");
fclose($myfile);
header("location:UserFile.txt");
}

function GetLastCount($FileName,$separator)
{
$myfile=fopen($FileName,"r+") or die ("Unable to open file!");
while(!feof($myfile))
{
    $line=fgets($myfile);
    $ArrayLine=explode($separator,$line);
    if($ArrayLine[0]!="")
    {
        $LastCount=$ArrayLine[0];
    }
    return $LastCount;
}
}
?>