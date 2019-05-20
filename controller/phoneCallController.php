<?php
//start session
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new DB();


$redirectURL = '../'.$db->url;

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['newPhoneCall']))
    {
        
            $phoneCallData = array
            (
                'CustomerId' =>  (int) $_POST['customer'],
                'Date_Call' =>  $_POST['call_date'],
                'Time_Call' => $_POST['call_time'],
                'calledNumber' => $_POST['called_number'],
                'duration' => (int)$_POST['duration'],
            );

  $insert = $db->insert('phonecall', $phoneCallData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation Réussie ';
            //set redirect url
                $redirectURL .= 'index.php';

            }

            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation échouée, essayez encore  ';
                
                //set redirect 
                $redirectURL .= 'index.php';
            }
    } 

    else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['newCustomer']))
    {
        
            $customerData = array
            (
                'name' => $_POST['name'],
                'surname' =>  $_POST['surname'],
                'phoneNumber' => $_POST['phone'],
                'costPlan' => $_POST['cost_plan'],
            );
  $insert = $db->insert('customer', $customerData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                $redirectURL .= 'index.php';

            }

            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed , try again  ';
                
                //set redirect 
                $redirectURL .= 'index.php';
            }
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['newCostPlan']))
    {
        
            $costData = array
            (
                'costAtResponse' => $_POST['costAtResponse'],
                'costPerSecond' =>  $_POST['costPerSecond'],
            );
  $insert = $db->insert('costplan', $costData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operation done successfully ';
            //set redirect url
                $redirectURL .= 'index.php';

            }

            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed , try again  ';
                
                //set redirect 
                $redirectURL .= 'index.php';
            }
    }

    else 
    {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'fill all required fields';
        
        //set redirect url
        $redirectURL .= 'index.php';
       }
   





   //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);







exit();
?>