<?php
//start session
//start session
session_start();

//load and initialize database class
require_once '../core/db.php';
$db = new db();


$redirectURL = '../'.$db->url;

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['newPhoneCall']))
    {
        
        $planId=0;
            $phoneCallData = array
            (
                'Customerid' =>  (int) $_POST['customer'],
                'Date_Call' =>  $_POST['call_date'],
                'Time_Call' => $_POST['call_time'],
                'calledNumber' => $_POST['called_number'],
                'duration' => (int)$_POST['duration'],
            );

                                    $ConCust =array 
                                      (
                                        'order_by'=>'CustomerID desc',
                                        'where'=>array('CustomerID' =>(int) $_POST['customer'],),
                                        'select'=>'costPlan'
                                      );

                                     $customers = $db->getRows('customer',$ConCust);
                                     if (!empty($customers)) : foreach ($customers as $val)  :
                                         # code...
                                        $planId=$val['costPlan'] ; endforeach ;

                                        else : $planId; endif;
                                     

            $insert = $db->insert('phonecall', $phoneCallData);
            if($insert)

            {

            }

            else{
                echo $planId  ;

        $condit =array 
                (
                  'order_by'=>'Code desc',
                  'where'=>array('Code'=>$planId,  ),
                  'select'=>'costPerSecond'
                );
                     $costPlan = $db->getRows('costplan',$condit);

            if(!empty($costPlan)): foreach ($costPlan as $plan) :

               
                
             $billCondition =array 
                (
                  'order_by'=>'id desc',
                  'where'=>array('CustomerId' =>(int) $_POST['customer'] ,'Month_Bill'=>(int) date('n'),'Year_Bill'=>date('Y')) ,
                  'select'=>'amount,id'
                );
            $checkBill = $db->getRows('bill',$billCondition);

                if(!empty($checkBill)):  foreach ($checkBill as $bill) :
                        
                $Total = $bill['amount']+((int)$_POST['duration']*$plan['costPerSecond']);
                $updateBill=$db->update('bill',$data=array('amount'=>$Total,),$conditions=array('id' =>$bill['id'] , ));
                if ($updateBill) echo  $redirectURL .= 'index.php?request=bill'; else   $redirectURL .= 'index.php?request=bill';
;

              endforeach;
                else :


                     $insertBill = $db->insert('bill', $BillData=array('CustomerId' =>(int) $_POST['customer'] ,'Month_Bill'=>date('n'),'Year_Bill'=> (int) date('Y') ,'amount'=>  (int)$_POST['duration']*$plan['costPerSecond'] ),);
                     if ($insertBill) 
                            

                            {
                                 $redirectURL .= 'index.php?request=bill';
                            }
                           
                               
                       
                endif;

  endforeach ;

            else :


                
 echo "bojo";


            endif;


                // $sessData['status']['type'] = 'error';
                // $sessData['status']['msg'] = 'Operation échouée, essayez encore  ';
                
                // //set redirect 
                // $redirectURL .= 'index.php';

                // echo  "ok".$planId;
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
                $redirectURL .= 'index.php?request=customers';

            }

            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Operation failed , try again  ';
                
                //set redirect 
                $redirectURL .= 'index.php?request=customers';
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