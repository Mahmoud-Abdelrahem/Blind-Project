<?php 
function auth($role1 = null , $role2 = null)
{
   if($_SESSION['user']){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['statues_id']== $role1 || $_SESSION['user']['statues_id']==$role2){
        }else{
            header("location: /Projects/BlindProject/auth/login.php");
        }
        
    }else{
        header("location: /Projects/BlindProject/auth/login.php");
    }
   }else{
    header("location: /Projects/BlindProject/auth/login.php");
   }
}



?>