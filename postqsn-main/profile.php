<?php 
error_reporting(0);
require 'config.php';
require 'Components/deleteModal.php';
require 'Components/viewModal.php';

if($_SESSION['id']==NULL)
{
    header('location:login.php');
}



$query = "SELECT * FROM `user` WHERE `iduser` = '".$_SESSION['id']."'";
$data2 =mysqli_query($data,$query);

$user =mysqli_fetch_row($data2);

// print_r($user);

$query1 ="SELECT * FROM `questions` WHERE `StudentId` = '".$_SESSION['id']."'";
$data3 =mysqli_query($data,$query1);

$qsn =mysqli_fetch_assoc($data3);


$qsns= count($qsn);

$query4= "SELECT * FROM `answer` WHERE `uId` = '".$_SESSION['id']."'";
$data4= mysqli_query($data,$query4);

$answer =mysqli_fetch_assoc($data4);







if(isset($_POST['delete_qsn']))
{
    $qid = $_POST['qid'];
    $query = "DELETE FROM `questions` WHERE `Qid` = '$qid'";
    $data = mysqli_query($data,$query);
    if($data)
    {
        echo '<script>alert("Question Deleted Successfully")</script>';
        echo '<script>window.location.href="profile.php"</script>';
    }
    else
    {
        echo '<script>alert("Question Not Deleted")</script>';
        echo '<script>window.location.href="profile.php"</script>';
    }
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">;
    <?php include 'GlobalStyleLink.php'; ?> 
    <title>profile</title>  
</head>
<body>
    <div>
    <?php include 'NavBar.php'; ?>
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24">  
            <div class="grid grid-cols-1 md:grid-cols-3">  
                  <div class="grid grid-cols-1 text-center order-last md:order-first mt-20 md:mt-0">      
                    <div class="que" id="ques">      
                      <p class="font-bold text-gray-700 text-xl" id="no">

                       <?php echo $qsns; ?>

                      </p>        
                      <p class="text-gray-400" id="q">Questions</p>      </div>      
                            
                            
                                 </div>   
                                  <div class="relative">     
                                     <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        
                                    <div class="w-40 h-40 text-7xl text-white flex justify-center  items-center rounded-full bg-blue-600 uppercase"id="circle">
                                    
                                    <?php echo substr(  $user[1],0,1); ?>
                                    
                                    </div>
                            
                                       </div>  
                                      </div>   
                                       <div class=" flex justify-center items-center  mt-32 md:mt-0 md:justify-center" >
                                       <div class="que">          
                         <p class="font-bold text-gray-700 text-xl" id="num">

                            <?php echo count($answer); ?>   

                         </p>       
                          <p class="text-gray-400" id="q">Answers</p>  
                            </div> 
                                          </div> 
                                         </div> 
                                          <div class="mt-20 text-center border-b pb-12"> 
                                               <h1 class="text-4xl font-medium text-gray-700">
                                                <div id="name">
                                               <?php echo $user[1]; ?> 
                                               </div><br>
                                               <span class="font-light text-gray-500" id="std">    <?php echo $user[4]; ?>  std</span>
                                            </h1>  
                                           
                                             <p class="font-light text-gray-600 mt-3" id="mail">
                                                    <?php echo $user[2]; ?>

                                             </p>  
                                               <p class="mt-8 text-gray-500">Student <br>At</p>  
                                                 <p class="mt-2 text-gray-500">

                                                 <?php echo $user[3]; ?>
                                                 </p>  
                                                </div> 
                                                 <!-- <div class="mt-12 flex flex-col justify-center">  
                                                      <p class="text-gray-600 text-center font-light lg:px-16">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis aut accusamus sunt eligendi ab recusandae minus voluptatem quam enim, vero omnis laborum fugit. In cumque amet error doloribus porro iure..

                                                      </p>   
                                                       <button  class="text-indigo-500 py-2 px-4  font-medium mt-4">  Show more</button> 
                                                     </div> -->
                                                    </div>


    <div class="w-full flex gap-x-2 gap-y-2 flex-wrap ">
        
   


        <?php 
            
        while($row =mysqli_fetch_assoc($data3))
        {
           
            $key = $row['Qid'];
            
           
                ?>

            <div class="w-80 h-32 p-2 border-blue-500 border-2 shadow-lg shadow-grey-600 rounded-lg text-black text-xs flex flex-col items-center flex-start">

            
                <div class="flex flex-col items-center flex-start"  >
                    <p class="text-sm font-bold text-left">Question</p>
                    <p class="text-xs font-light"><?php echo $row['question']; ?></p>
                    <span class=" mt-1 ml-1
                    
                    <?php if($row['isAns']==1)
                    {
                        echo "bg-green-200 text-green-800";
                    }
                    else
                    {
                        echo "bg-blue-200 text-blue-800";
                    }
                    ?>
                    
                    
                    text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-blue-800">
                
                    <?php if($row['isAns']==1)
                    {
                        echo "solved";
                    }
                    else
                    {
                        echo "unsolved";
                    }
                    ?>
                </span>
                    </p>
                </div>
                    
                    <?php deleteModal($row['Qid']) ;
                  
                    
                    ?>
  
                      
                        
                <div class="flex flex-end h-8 w-full">
                    <div class="w-1/10 h-full flex items-center justify-center">
                        <button  class=" DELETE_BTN w-10 h-10 bg-blue-500 flex items-center justify-center text-white rounded-full " data-modal-toggle="popup-modal">
                        <i class="fa-solid fa-trash "></i>
                        </button >
                    </div>
                    <form action="answer.php" method="POST" class="w-1/10 ml-2 h-full flex items-center justify-center ">
                        
                    <input type="hidden" name="id" value="<?php echo $row['Qid']; ?>">
                    <input type="hidden" name="photoQ" value="<?php echo $row['photoQuestion']; ?>">
                        <input type="hidden" name="qsn" value="<?php echo $row['question']; ?>">
                        <button  type="submit" name="question_submit" class="VIEW_BTN w-10 h-10 bg-blue-500 flex items-center justify-center text-white rounded-full" data-modal-toggle="staticModal" >
                        <i class="fa-solid fa-eye"></i>
                        </button >
                    </form>
          
            </div>

          

     </div>



     
     <?php 
 
        }
     ?>
     </div>
     </div>
    
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>

const delete_btns=document.getElementsByClassName('DELETE_BTN');

const cencel_btns=document.getElementsByClassName('CANCEL');
const delete_modal=document.getElementsByClassName('DELETE');

for(let i=0;i<delete_btns.length;i++)
{
    delete_btns[i].addEventListener('click',function(){
      
        delete_modal[i].classList.toggle('hidden');
    })
}

for(let i=0;i<cencel_btns.length;i++)
{
    cencel_btns[i].addEventListener('click',function(){
        delete_modal[i].classList.toggle('hidden');
    })
}

const view_btns=document.getElementsByClassName('VIEW_BTN');
const view_modal=document.getElementsByClassName('VIEW_MODAL');
for(let i=0;i<view_btns.length;i++)
{
    view_btns[i].addEventListener('click',function(){
        view_modal[i].classList.toggle('hidden');
    })
}


</script>




</html>