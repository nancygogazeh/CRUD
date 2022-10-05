<?php
$db= mysqli_connect("localhost", "root","","myproject");

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
</head>
<body>
    
<form method="post">
    <label>Name </label>
    <input type ="text" name="name" placeholder="Enter Name">
    <br><br>
    <label>Email </label>
    <input type ="text" name="email" placeholder="Enter Email">
    <br><br>
    <label>Address </label>
    <input type ="text" name="address" placeholder="Enter Address">
    <br><br>
    <input type="submit" name="submit" value="submit">
</form>
<hr>

<h3>User List </h3>
<table style="width: 80%" border="1" >
<tr> 
<th>S#</th>
<th>Name</th>
<th>Email</th>
<th>Address</th>
<th>Operations</th>
</tr>
<?php
$i=0;
$qry ="select * from user";
$run=$db -> query ($qry);
if($run -> num_rows >0){
    while($row= $run -> fetch_assoc()){

$id=$row['user_id'];

?>

<tr>
    <td> <?php  echo $i++; ?> </td>
    <td><?php echo $row['user_name'] ?> </td>
    <td><?php echo $row['user_email'] ?> </td>
    <td><?php echo $row['user_address'] ?> </td>

    <td>
        <a href ="#"> EDIT</a>|
        <a href =" delete.php ?id=<?php echo $id;?>"  onclick ="return confirm ('Are you sure ?')" > DELETE</a></td>
</tr>
<?php
   }
}
?>
</table>

</body>
</html>

<?php
if (isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];

$qry="INSERT INTO user VALUES ('','$name', '$email', '$address')";
if(mysqli_query($db , $qry)){
 echo '<script> alert("User registered successfully!");</script>';
header('location: user.php');

}else{
    echo mysqli_error($db);
}

}
?>