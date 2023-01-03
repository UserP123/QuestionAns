<?php  include 'config.php'; ?>

<?php 
// error_reporting(0);


$url ='C:xampphtdocsquestionAnswer/questions/thread.PNG';



if(isset($_FILES['file']))
{$filename= $_FILES['file']['name'];

}



if(isset($_POST['post_question']))
{



    $filename= $_FILES['file']['name'];
    $destination= __DIR__ .'/questions/'. $filename;
    move_uploaded_file($_FILES['file']['tmp_name'],$destination);




    print_r($file) ;
// $img= file_get_contents($_POST['file']);



$question = $_POST['question'];
$topic = $_POST['topic_search'];
$id=$_SESSION['id'];

$time= date("Y-m-d H:i:s");
$insertQuery = "INSERT INTO questions (question,qRelated,StudentId,isAns,time,photoQuestion) VALUES ('$question','$topic','$id',0,'$time','$destination')";

$data = mysqli_query($data,$insertQuery);
if($data) {

    echo $img2;
?>
<script>
    alert("Question Posted");
</script>
<?php



}
else
{
    echo "data not inserted";




}



}



if(isset($_POST['post_answer']))
{

    error_reporting(0);
$answer = $_POST['answer'];
$questionId = $_POST['qId'];
$id=$_SESSION['id'];

$time=date("Y-m-d H:i:s");



$query = "INSERT INTO answer (answer,qid,uId,time) VALUES ('$answer','$questionId','$id','$time')";

$answerData = mysqli_query($data,$query);
if($answerData) {
    echo "answer posted";
}
else
{
    echo "data not inserted";

}

$query_hasAns = "UPDATE questions SET isAns=1 WHERE qId='$questionId'";
try{
    $hasAns = mysqli_query($data,$query_hasAns);
}
catch(Exception $e)
{
    echo $e;








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
    <style>
        
    </style>
</head>
<body>
 
<?php
error_reporting(0);
 include 'NavBar.php';
if(isset($_SESSION['id']))
{
    
  
    
    ?>
    <div>
   <div class="w-full h-[500px] bg-blue-500 flex flex-col items-center justify-center">

   <h2 class="text-6xl font-bold text-white dark:text-white text-center py-5">Explore Yourself</h2>
        

   <form class="w-9/12 items-center flex justify-center flex-col" method="POST" action="index.php" enctype="multipart/form-data">
    
<label for="topic_search" class="block mb-2 text-sm font-medium text-white m">Select an option</label>
<select id="topic_search" name="topic_search" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <option selected>Choose a topic</option>
  <option value="java">java</option>
  <option value="html">html</option>
  <option value="css">css</option>
  <option value="web">web</option>
</select>

   <div class="w-full md:w-10/12 mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">


       <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
        
           <label for="question" class="sr-only">Your question</label>

           <input id="question" name="question"   type="text" rows="4" class="w-full h-24 px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a question..." required/>
       </div>
       <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
           <button type="submit" name="post_question" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
               Post question
           </button>
           <?php   echo $filename; ?>
           <div class="flex pl-0 space-x-1 sm:pl-2">
               <label for="file" class="cursor-pointer">
               <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
               </label>
               <input type="file" id="file" name="file" class="inline-flex hidden justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                  
                 
               </input>
           </div>
       </div>
   </div>
</form>




   </div>
  





        




<?php 


$query = "SELECT * FROM questions JOIN user ON questions.studentId=user.iduser  ORDER BY time DESC ";
$data2 = mysqli_query($data,$query);
echo '<div class="w-screen flex  flex-wrap gap-x-6 mt-32 items-center justify-between">';
while($row = mysqli_fetch_assoc($data2))
{
        
    // echo '<h2>' . $row['question'] . '</h2>';
    // echo '<h2>' . $row['qRelated'] . '</h2>';

    // echo '<h2>' . $row['time'] . '</h2>';

    // echo '<h2>' . $row['name'] . '</h2>';
   
    // echo '<h2>' . $row['iduser'] . '</h2>';
  

?>
<form class="w-2/5 flex items-center flex-col justify-center h-80 mb-52" action="index.php" method="POST">
           
           <div class="bg-blue-500 border-grey-500 flex flex-col rounded-lg border-2 border-blue-500  w-10/12 px-2 items-center justify-center shadow-lg shadow-grey-600">
               <!-- start of questionbox nav -->
                   <div class="flex items-center justify-between w-full h-12  p-2 mt-2 ">
               <input type="hidden" name="qId" value="<?php echo $row['Qid'];?>"/>
               <div class="flex flex-row items-center justify-between gap-x-2 w-2/7 ">
               <div class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center ">A</div>
               <h5 class="font-medium text-white">question By</h5>
               <h5 class=" font-semibold capitalize"><?php echo $row['name']; ?></h5>
</div>

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






<?php
  
  
}
echo '</div>';


?>



</div>
</div>

  
<?php  }

else

{?>
 <div>needs validation</div>
 
<?php }?>





<img src="./questions/thread.PNG" alt="" height="300" width="300">




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




</script>
          
</html>