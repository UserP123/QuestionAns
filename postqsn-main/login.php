<?php 
require 'config.php';


?>

<?php 


error_reporting(0);
if(isset($_POST['login']))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    
    $query= 'select * from user where email="'.$email.'" and password="'.$password.'"';
    $result=mysqli_query($data,$query);

    $data=mysqli_fetch_row($result);
    if($data>0)
    {

        print_r($data);
        print_r($data[2]);
     
      $_SESSION['password']=$password;
        $_SESSION['id']=$data[0];
        $_SESSION['name']=$data[1];
        $_SESSION['email']=$data[2];
        $_SESSION['school']=$data[3];
        $_SESSION['class']=$data[4];


        echo "login successfull";

        header('location:index.php');


    }
    else
    {
        echo "login failed";
    }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'GlobalStyleLink.php'; ?>
    <title>login or signup</title>
</head>
<body>
<?php include 'Navbar.php'; ?>
<div class="flex flex-col items-center justify-center w-full my-12">
<h2 class="text-4xl font-bold dark:text-white ">Log in</h2>
</div>
<div class="w-screen  h-80 flex flex-col items-center justify-center mt-10 ">

<form action="" method="POST"   >

<div class="mb-6">



        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
        <input type="text" name="email" id="email" placeholder="email"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" required>
    </div> 
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
    </div> 
   
   
    <button type="submit" name="login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">login</button>


</form>
<h5>not having an account? <span><a href="signup.php">sign up</a></span></h5>
</div>



 
</body>
</html>