<?php
//start session
//start session
session_start();

//load and initialize database class
require_once 'core/db.php';
$db = new db();
?>


<!doctype html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/docs/4.3/examples/dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 09:06:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Billing System</title>

    <link rel="canonical" href="index.html">

    <!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-uppercase" href="#">Billing System</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#customer">
              <span data-feather="user-plus"></span>
              Create customer
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#phone-call">
              <span data-feather="phone"></span>
              Phone call
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#cost-plan">
              <span data-feather="bar-chart-2"></span>
              Cost Plan
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#bill">
              <span data-feather="bar-chart-2"></span>
              Get Bill
            </a>
          </li>
           -->
        </ul>

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 >Report</h4>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?request=customers">
              <span data-feather="user-plus"></span>
            All Customer</a>
          </div>
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?request=costplans">
              <span data-feather="bar-chart-2"></span>
            All Cost Plan</a>
          </div>
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?request=calls">
              <span data-feather="phone"></span>
            All Calls</a>
          </div>
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?request=bill">
              <span data-feather="calendar"></span>
            All Bills</a>
          </div>          
        </div>
      </div>


      <div class="table-responsive">
 <?php
            if (isset($_REQUEST['request']))
                  {
                    if ($_REQUEST['request']=='bill')
                    {

                       $condition =array 
                (
                  'order_by'=>'id desc'
                );
          $bill = $db->getRows('bill',$condition);
?>


        <table class="table table-bordered table-striped table-sm">
          <thead>
            <tr>              
              <th>Customer</th>
              <th>Month</th>
              <th>Year</th>
              <th>Amount</th>
              <th>Total Bill</th>
            </tr>
          </thead>
          <tbody>
             <?php if(!empty($bills)): $count = 0; foreach($bills as $bill): $count++; ?>
            <tr> 
             <?php 
                 // $condition =array 
                 //  (
                 //    'order_by'=>'CustomerID desc',
                 //    'where'=>array('CustomerId' => $bill['CustomerID'] )
                 //  );
                 // $customers = $db->getRows('CustomerId',$condition);

                 //  if(!empty($customers)) :  foreach($customers as $list): 
             ?>             
              <td><?php echo  $bill['name']; ?></td>

              <td> <?php echo $bill['Month_Bill']; ?></td>
              <td> <?php echo $bill['Year_Bill']; ?></td>
              <td> <?php echo $bill['amount']; ?></td>
              <?php endforeach; else: ?>
              <?php endif; ?>


            </tr>
          </tbody>
        </table>

<?php      
   } elseif ($_REQUEST['request']=='customers') {

      $condition =array 
                (
                  'order_by'=>'CustomerID desc'
                );
          $customers = $db->getRows('customer',$condition);
     
?>
     <table class="table table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Surname</th>
              <th>Phone Number</th>
              <th>Cost Plan</th>
            </tr>
          </thead>
          <tbody>
              <?php if(!empty($customers)): $count = 0; foreach($customers as $cust): $count++; ?>
            <tr>              
              <td> <?php echo $cust['CustomerID']; ?></td>
              <td> <?php echo $cust['name']; ?></td>
              <td> <?php echo $cust['surname']; ?></td>
              <td> <?php echo $cust['phoneNumber']; ?></td>
              <td> <?php echo $cust['costPlan']; ?></td>

              <?php endforeach; else: ?>
              <?php endif; ?>

            </tr>
          </tbody>
        </table>
<?php

   }elseif ($_REQUEST['request']=='calls') {
    $condition =array 
                (
                  'order_by'=>'CustomerId desc'
                );
          $calls = $db->getRows('phonecall',$condition);
     

      ?>
        <table class="table table-bordered table-striped table-sm">
          <thead>
             <?php if(!empty($calls)): $count = 0; foreach($calls as $phoneCall): $count++; ?>
            <tr>
              <th>Customer</th>
              <th>Date</th>
              <th>Time</th>
              <th>Called Number</th>
              <th>Duration</th>
            </tr>
          </thead>
          <tbody>
            <tr>              
              <td> <?php echo $phoneCall['CustomerId']; ?></td>
              <td> <?php echo $phoneCall['Date_Call']; ?></td>
              <td> <?php echo $phoneCall['Time_Call']; ?></td>
              <td> <?php echo $phoneCall['calledNumber']; ?></td>
              <td> <?php echo $phoneCall['duration']; ?></td>
              <?php endforeach; else: ?>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
      <?php

   }elseif ($_REQUEST['request']=='costplans') {
    $condition =array 
                (
                  'order_by'=>'Code desc'
                );
          $costPlan = $db->getRows('costplan',$condition);
     

      ?>
        <table class="table table-bordered table-striped table-sm">
          <thead>
             <?php if(!empty($costPlan)): $count = 0; foreach($costPlan as $CostPlan): $count++; ?>
            <tr>
              <th>Code</th>
              <th>Cost at response</th>
              <th>Cost per second</th>
            </tr>
          </thead>
          <tbody>
            <tr>  
              <td> <?php echo $CostPlan['Code']; ?></td>          
              <td> <?php echo $CostPlan['costAtResponse']; ?></td>
              <td> <?php echo $CostPlan['costPerSecond']; ?></td>
              <?php endforeach; else: ?>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
      <?php

   }  
 }else{


    ?>

        <h4 class="text-center text-info" style="margin-top: 20%;">Welcome into your Billing System...</h4>
    <?php
   }

?>

      
      </div>


    </main>
  </div>
</div>

<!-- CREATE CUSTOMER Modal-->
<div class="modal fade col-md-12" tabindex="-1" id="customer"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="controller/phoneCallController.php" method="POST">
                      <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Name </label>
                           <div class="col-sm-9">
                               <input type="text" name="name" class="form-control form-control-sm" required>
                           </div>
                         </div>
                      <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Surname </label>
                           <div class="col-sm-9">
                               <input type="text" name="surname" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Phone Number </label>
                           <div class="col-sm-9">
                               <input type="text" name="phone" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Cost plan </label>
                           <div class="col-sm-9">
                               <select type="text" name="cost_plan" class="form-control form-control-sm" required>
                                <option selected disabled>[SELECT]</option>
                                <option value="1">class A</option>
                                <option  value="2">class B</option>
                               </select>
                           </div>
                       </div>
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" class="btn btn-primary btn-sm pull-right" name="newCustomer" style="margin-left: 5px;" >Save</button>
                           <button class="btn btn-danger btn-sm pull-right "  data-dismiss="modal"  type="button">Cancel</button>            
               </div>
                     </form>
            </div>
         
        </div>
    </div>
</div>

<!-- COST PLAN MODAL -->
<div class="modal fade col-md-12" tabindex="-1" id="cost-plan" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cost Plan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="controller/phoneCallController.php" >
                     
                      <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Cost at response </label>
                           <div class="col-sm-9">
                               <input type="text" name="costAtResponse" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Cost per Second</label>
                           <div class="col-sm-9">
                               <input type="text" name="costPerSecond" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" class="btn btn-primary btn-sm pull-right" name="newCostPlan" style="margin-left: 5px;" >Save</button>
                           <button class="btn btn-danger btn-sm pull-right "  data-dismiss="modal"  type="button">Cancel</button>            
               </div>
                     </form>
            </div>
         
        </div>
    </div>
</div>

<!-- PHONE CALL MODAL -->
<div class="modal fade col-md-12" tabindex="-1"  id="phone-call" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Phone call</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="controller/phoneCallController.php" >
                       <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Customer </label>
                           <div class="col-sm-9">
                               <select type="text" name="customer" class="form-control form-control-sm" required>
                                <option selected disabled>[SELECT]</option>
                                <option value="1">Espoir</option>
                                <option  value="2">Joseph</option>
                                <option  value="3">Bojos</option>
                               </select>
                           </div>
                       </div>
                      <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Date </label>
                           <div class="col-sm-9">
                               <input type="Date" name="call_date" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label"> Time </label>
                           <div class="col-sm-9">
                               <input type="time" name="call_time" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Called No.</label>
                           <div class="col-sm-9">
                               <input type="text" name="called_number" class="form-control form-control-sm" required>                                
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Duration </label>
                           <div class="col-sm-9">
                               <input type="text" name="duration" class="form-control form-control-sm" required>
                           </div>
                       </div>
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" name="newPhoneCall" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px;" >Save</button>
                           <button class="btn btn-danger btn-sm pull-right "  data-dismiss="modal"  type="button">Cancel</button>            
               </div>
                     </form>
            </div>
         
        </div>
    </div>
</div>

<script src="assets/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/jquery-slim.min.js"><\/script>')</script><script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="ajax/feather.min.js"></script>
        <script src="ajax/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>

<!-- Mirrored from getbootstrap.com/docs/4.3/examples/dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 May 2019 09:06:21 GMT -->
</html>
