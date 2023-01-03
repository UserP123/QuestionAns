<?php 
    function dropdownComp($data)
    {




        echo ' 
        <form action="subject.php"  method="POST" class="flex flex-col">
        <input type="hidden" name="topic" value="'.$data.'"/>
        <button name="topic_select" type="submit" >
        <div  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
          <div class="inline-flex items-center">'.$data.'
           
          </div>
        <div>
      </button>
      </form>
      
      ';

    }



?>