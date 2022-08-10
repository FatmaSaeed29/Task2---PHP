<?php
ob_start(); 
session_start();
// $image = filter_var($_POST["image"],filter);

if(!empty($_POST['submit']) ){
echo "Your Name Is: " . " " . $_POST['name'] . "<br>";
echo "Your Email Is: " . " " . $_POST['email'] . "<br>";
echo "Your Password Is: " . " " . $_POST['password'] . "<br>";

        @$img=$_POST['image'];
        $ex=explode(".", $img);
        print_r (end($ex));

// echo "Your Image Is: " . " " . "<img src="$_POST['image']" alt="image"> ". $_POST['image'] . "<br>";
// echo '<img src="images/'.$image.'"/>';


if(isset($_POST['image']))
{ 
$filepath = "images/" . $_FILES["image"]["name"];

if(move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
} 

}else{
    // header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <a href="logout.php" >logout</a>
</body>
</html>


<?php
ob_end_flush();
?>