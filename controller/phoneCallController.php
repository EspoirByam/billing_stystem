<?php
//start session
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();

$Dte = date('Y/m/d');
$y=date('Y');
$m=date('m');


//set default redirect url
$redirectURL = '../'.$db->url;
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Destination']))
    {
        $Dte = date('Y/m/d');
        $tblName = 'aidesong_exit';
            //insert data
  
            $userData = array
            (
                'Destination' =>   $_POST['Destination'],
                'Motif' =>  $_POST['Motif'],
                'TimeOut' => $_POST['Tout'],
                'DateOut' => $_POST['Dout'],
                'TimeBack' => $_POST['Tback'],
                'DateBack' => $_POST['Dback'],
                'User_ID' => (int)$_POST['user'],
            );
  $insert = $db->insert($tblName, $userData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation Réussie ';
            //set redirect url
                $redirectURL .= '?request=sortielist';

            }

            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation échouée, essayez encore  ';
                
                //set redirect 
                $redirectURL .= '?request=sortie';
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
        $redirectURL .= '?request=sortie';
       }
   





   //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);







exit();
?>