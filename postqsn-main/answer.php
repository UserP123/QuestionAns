<?php
require 'config.php';
error_reporting(0);
if($_SESSION['id']==NULL)
{
    header('location:login.php');
}

if(isset($_POST['question_submit']))
{

        $key = $_POST['id'];
        $url =basename($_POST['photoQ']);
        // echo $url;
        $query2 = "SELECT * FROM `answer` JOIN user ON answer.uId=user.iduser WHERE `qId` = '$key'";
            $data7 =mysqli_query($data,$query2);

    $qsn=$_POST['qsn'];
            
        





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
    <?php include 'Navbar.php'; ?>
<div class="mb-10 mt-24 border-2 mx-auto rounded-lg shadow-lg shadow-green-600 border-blue-500 h-[400px] w-11/12 ">                        
                  <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                      <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                     <?php echo $qsn; ?>
                  </h3>
                  <?php 
                  if($url !='')
                  {

                  
                  ?>
                    <img src="<?php echo "./questions/".$url; ?>" alt="" height="200" width="200">
                    <?php
                    }
                    ?>

                
                  <?php
                    while($answer =mysqli_fetch_assoc($data7))
                    {
                    ?>
                 
                 <p class="text-gray-500 dark:text-gray-400 flex flex-col mt-4 p-2">
                    <div class="flex flex-row gap-y-2 align-center">                 
                        <div  class=" w-8 h-8 bg-blue-500 flex items-center justify-center text-white rounded-full uppercase text-lg font-bold" >
                        <?php echo substr($answer['name'],0,1); ?>
                        </div >
                        <div class="font-bold text-blue-600 capitalize "><?php echo $answer['name'];?></div>
                        </div>

                    <?php echo $answer['answer']; ?>

                 </p>
                            <?php
                            }
                            if(!$data7)
                            {
                                echo '<p class="text-gray-500 dark:text-gray-400 flex flex-col">No Answer Yet</p>';
                            }
                            ?>


              </div>
</body>
</html>


