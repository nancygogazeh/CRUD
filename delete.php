<?php
$db= mysqli_connect("localhost", "root","","myproject");
if(!$db){
die('error in db'. mysqli_error ($db));
}

$id= $GET['id'];
$qry="DELETE from user WHERE user_id =$id";
if(mysqli_query($db , $qry)){
header('location:user.php');


}else {
echo mysqli_error($db);

}

?>