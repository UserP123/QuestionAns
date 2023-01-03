
<?php 
// error_reporting(0);
session_start();




if($_SESSION['id']==NULL)
{
    header('location:login.php');
}

if(isset($_POST['logout']))
{
    session_destroy();
    header('location:login.php');
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
<body>
    <div class="w-full h-screen flex items-center justify-center">
        <form action="logout.php" method="POST">
        <button type="submit" name="logout" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">LOG OUT <?php echo  $_SESSION['name'];?></button>
        <a href="index.php" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">back</a>
        </form>
    </div>
</body>
</html>