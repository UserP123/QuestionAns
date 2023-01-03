<?php 
require 'config.php';


?>






<?php
error_reporting(0);
if(isset($_POST['signUp']))
{

    $name= $_POST['firstname']." ".$_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $school = $_POST['school'];
    $standard = $_POST['standard'];
    $phone = $_POST['phone'];

$query = "INSERT INTO `user`(`name`, `email`, `password`, `school`, `standard`, `phone`) VALUES ('$name','$email','$password','$school','$standard','$phone')";

$data2 =mysqli_query($data,$query);

$user =mysqli_fetch_row($data2);

if($user)
{
    $_SESSION['password']=$password;
        $_SESSION['id']=$user[0];
        $_SESSION['name']=$user[1];
        $_SESSION['email']=$user[2];
        $_SESSION['school']=$user[3];
        $_SESSION['class']=$user[4];


        echo "login successfull";

        header('location:index.php');
}
else
{
    echo "data not inserted";



}
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'GlobalStyleLink.php'; ?>
</head>
<body >
 


<?php include 'NavBar.php'; ?>


<div class="flex flex-col items-center justify-center w-full my-12">
<h2 class="text-4xl font-bold dark:text-white ">Sign up</h2>
</div>

<div class="w-screen  flex flex-col items-center mb-20">

<form class="py-18 "   action="signup.php"   method="POST" >
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
            <input type="text" id="first_name" name="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="first name" required>
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input type="text" id="last_name" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="last name" required>
        </div>
        <div>
            <label for="school" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School</label>
            <input type="text" id="school" name="school" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="school" required>
        </div>  
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
            <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-67890"  >
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email*</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="school@.com" required>
        </div>
        <div>
            <label for="standard" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">standard</label>
            <input type="number"name="standard"  id="standard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
    </div>
    
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
    </div> 
    <div class="mb-6">
        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
        <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
    </div> 
   
    <button type="submit" name="signUp" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>


</div>

</body>
</html>