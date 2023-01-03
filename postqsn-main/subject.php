<?php

require 'config.php';
error_reporting(0);
if(isset($_POST['topic_select']))
{

$_SESSION['selected_topioc']= $_POST['topic'];

$selected_topic = $_SESSION['selected_topioc'];
}


$queryTopic= "SELECT * FROM `questions` JOIN `user` ON questions.StudentId=user.iduser WHERE qRelated='$selected_topic' ORDER BY time DESC";
$topicData = mysqli_query($data,$queryTopic);






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'GlobalStyleLink.php'; ?>
    <title>Document</title>
</head>
<body>
<?php include 'NavBar.php'; ?>
<div class="w-screen flex items-center text-lg md:text-4xl justify-center font-semibold  text-center bg-blue-600 text-white h-[200px] uppercase">
QUESTION OF <?php echo $selected_topic; ?>

</div>
<div class="container w-full flex flex-col mt-32">




    <?php
      
    
        while($row=mysqli_fetch_assoc($topicData))
        {


            // echo "./questions/".basename($row['photoQuestion']);
?>


            <form class="w-full flex items-center flex-col justify-center h-80 mb-52" action="index.php" method="POST">
           

                <div class="absolute hidden h-[300px] w-[300px] z-50 bg-black inset-x-3/4 rounded-lg PHOTO_VIEW">

                    <?php 
                        if($row['photoQuestion']!=null)
                        {
                            echo '<img src="./questions/'.basename($row['photoQuestion']).'" class="h-full w-full object-cover rounded-lg" alt="">';
                        }
                        else
                        {
                            echo '<img src="./questions/NoImage.png" class="h-full w-full object-cover rounded-lg" alt="">';
                        }
                    
                    ?>


                </div>

           <div class="bg-blue-500 border-grey-500 flex flex-col rounded-lg border-2 border-blue-500  w-10/12 px-2 items-center justify-center shadow-lg shadow-grey-600">
               <!-- start of questionbox nav -->
                   <div class="flex items-center justify-between w-full h-12  p-2 mt-2 ">
               <input type="hidden" name="qId" value="<?php echo $row['Qid'];?>"/>
               <div class="flex flex-row items-center justify-between gap-x-2 w-2/7 ">
               <div class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center ">A</div>
               <h5 class="font-medium text-white">question By</h5>
               <h5 class=" font-semibold capitalize"><?php echo $row['name']; ?></h5>
</div>
            <button type="button" class="text-white PHOTO_VIEW_BTN">
            <i class="fa-solid fa-image"></i>
            photo qsn
            </button>
                   <div><?php echo $row['time']; ?></div>
</div>     
               <!-- end of question box navbar -->
               <hr class="my-2 h-px bg-white border-0 dark:bg-gray-700">
               <div class='w-full flex flex-row items-center flex-end px-12'>
                   <h2 class="text-lg  font-bold text-white tracking-wide text-right">
                       <?php echo $row['qRelated']; ?>


                   </h2>

               </div>
       <!-- start of question box -->
       <div class="w-11/12 bg-white m-2 rounded-lg text-lg text-blue-600 font-semibold min-h-32 h-32 mb-4 px-3  pt-1 shadow-lg shadow-blue-900">

              <?php echo $row['question']; ?>
           </div>
           <!-- end of question box -->
          
         

</div> 

    <!-- start of answer box --> 
    <ol   class="answer hidden border-l border-gray-200 dark:border-gray-700 w-9/12 flex items-center flex-col mt-2 items-center">     
    <?php
    // require 'config.php';
    $queryAns = "SELECT * FROM answer JOIN user ON answer.uId=user.iduser WHERE answer.qid = {$row['Qid']} ORDER BY time DESC ";
    
    $answerData2 = mysqli_query($data,$queryAns);

    while($row2 = mysqli_fetch_assoc($answerData2))
    {
    

     $initial =  substr($row2['name'],0,1);




    ?>

<li class="w-full">
       
       <div class="justify-between items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
           <div class="flex flex-row items-center justify-between w-1/7">
       <div class="flex justify-center items-center w-6 h-6 bg-blue-200 rounded-full  ring-white dark:ring-gray-900 dark:bg-blue-900">
       <div class="h-5 w-5 text-xs rounded-full bg-blue-600 text-white flex items-center justify-center ">

            <?php echo $initial; ?>


       </div>
       </div>
           <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                <?php echo $row2['name']; ?>
           </div>

       </div>
       <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
              <?php echo $row2['answer']; ?>
           
       </div>
           <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">1 day ago</time>
   
       
   </li>




    <?php
    }

    
    
    
    
    ?>










             
  
 
  
   
   <div class="mb-6 w-9/12">
   <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">your answer</label>
   <input type="text" id="large-input" name="answer" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
   
</div>  

<button type="submit" name="post_answer" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">answer it</button>
</ol>
<!-- end of answer box        -->
       

<button class="btn text-white mt-2 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="button" >open</button>



</form>

<?php  }
    
 ?>
 </div>

</body>



<script>

    const btn=document.getElementsByClassName('btn')
const ols = document.getElementsByClassName('answer')


   for(let i=0;i<btn.length;i++){
       btn[i].addEventListener('click',function(){
         
        
         ols[i].classList.toggle('hidden');
         btn[i].innerHTML=ols[i].classList.contains('hidden')?'open':'close';
       })
   }

const photo_btn =document.getElementsByClassName('PHOTO_VIEW_BTN');
const photo = document.getElementsByClassName('PHOTO_VIEW');

for(let i=0;i<photo_btn.length;i++){
    photo_btn[i].addEventListener('click',function(){
        photo[i].classList.toggle('hidden');
        photo_btn[i].innerHTML=photo[i].classList.contains('hidden')?'photo qsn':'close';
    })
}


</script>
</html>