<?php
session_start();
include_once "Function.php";
include_once "p1.head.php";

?>

<?php


if (isset($_SESSION["Email"])) {
  $obj = new record;
  $obj->Ofmanager->fileN = "users.txt";
  $es = $_SESSION["Email"];
  $Eser = $obj->Esearch($es);
  if ($Eser == 1) {
    echo "<li><a href=prodppp.php>Add product </a></li>";
  }
  else if($Eser == 4)
  {
    echo "<li><a href=prodppp.php>request or donate product </a></li>";
  }
}
?>


<?php

if (isset($_SESSION["Email"])) {
  echo "<li><a href=ppp.php>View Table Of Users</a></li>";
  echo " <li><a href=logout.php>logout</a></li>";
} else {
  echo "<li><a href='add form.php'>sign up</a></li>";
  echo " <li><a href=loginn.html>login</a></li>";
}


?>

<li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
</ul>

</div>
<!--/.nav-collapse -->
</div>
</nav>
</section>

<?php $obj = new record;
$obj->Ofmanager->fileN = "product.txt";
$arr = array();
$arr = $obj->fin();
for ($i = 0; $i < count($arr) - 1; $i++) {
?>
<div class="col-md-4 margin_bottom1">
  <div class="mu-footer-widget">
    <h4>Product photos</h4>
    <figure>
     
      <img src="<?php echo $arr[$i]->pass;?>" width="100" height="100">
    </figure>
  </div>
</div>
<?php
//$arr[$i]->Email;
}
include_once "p1.foot.php";
?>