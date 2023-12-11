<?php

include("connect.php");

$name = $_POST['name'];
$number = $_POST['number'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password1==$password2){
     move_uploaded_file($tmp_name,"../uploads/$image");
     $insert = mysqli_query($connect, "INSERT INTO user(name,mobile,address,password,photo,role,status,votes)
     VALUES ('$name','$number','$address','$password1','$image','$role',0,0)");
     if ($insert){
     echo '
        <script>
            alert("registration successful");
            window.location = "../";
        </script>
         ';
     }
     else{
    echo '
        <script>
            alert("registration not successful");
            window.location = "../routes/register.html";
        </script>
        ';
     }
}
else{
echo '
<script>
alert("password does not match");
window.location = "../routes/register.html";
</script>
';
}


?>