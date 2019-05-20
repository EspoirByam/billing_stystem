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
    <title>Dashboard Template · Bootstrap</title>

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
            <button type="button" class="btn btn-sm btn-outline-secondary">Today</button>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>


      <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Calls</th>
              <th>Amount</th>
              <th>Total Bill</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>001</td>
              <td>Espoir Byamungu</td>
              <td>25</td>
              <td>25000</td>
              <td>20000</td>
            </tr>
            <tr>
              <td>002</td>
              <td>amet djamila</td>
              <td>30</td>
              <td>35000</td>
              <td>30000</td>
            </tr>
           
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- CREATE CUSTOMER Modal-->
<div class="modal fade col-md-12" tabindex="-1" id="customer" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data" id="new_customer">
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
                               <select type="text" name="type" class="form-control form-control-sm" required>
                                <option selected disabled>[SELECT]</option>
                                <option value="class A">class A</option>
                                <option  value="class B">class B</option>
                               </select>
                           </div>
                       </div>
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px;" >Save</button>
                           <button class="btn btn-danger btn-sm pull-right "  data-dismiss="modal"  type="button">Cancel</button>            
               </div>
                     </form>
            </div>
         
        </div>
    </div>
</div>

<!-- BILL CREATION MODAL -->
<div class="modal fade col-md-12" tabindex="-1" id="cost-plan" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cost Call</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data" id="new_bill">
                <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Customer </label>
                           <div class="col-sm-9">
                               <select type="text" name="customer" class="form-control form-control-sm" required>
                                  <option selected disabled> [ SELECT ] </option>
                                  <option value="Espoir"> Espoir</option>
                                  <option  value="Joseph"> Joseph</option>
                                  <option  value="Bojos"> Bojos</option>
                               </select>
                           </div>
                       </div>
                      <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Month </label>
                           <div class="col-sm-9">
                              <select type="text" name="type" class="form-control form-control-sm" required>
                                <option selected disabled>[SELECT]</option>
                                <option value="January">January</option>
                                <option  value="February">February</option>
                                <option  value="March">March</option>
                                <option  value="April">April</option>
                                <option  value="May">May</option>
                                <option  value="June">June</option>
                                <option  value="July">July</option>
                                <option  value="August">August</option>
                                <option  value="September">September</option>
                                <option  value="October">October</option>
                                <option  value="November">November</option>
                                <option  value="December">December</option>
                              </select>

                           </div>
                         </div>
                      <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Year </label>
                           <div class="col-sm-9">
                               <input type="text" name="Year" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Amount</label>
                           <div class="col-sm-9">
                               <input type="text" name="phone" class="form-control form-control-sm" required>
                           </div>
                       </div>
                        
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px;" >Save</button>
                           <button class="btn btn-danger btn-sm pull-right "  data-dismiss="modal"  type="button">Cancel</button>            
               </div>
                     </form>
            </div>
         
        </div>
    </div>
</div>

<!-- PHONE CALL MODAL -->
<div class="modal fade col-md-12" tabindex="-1" id="phone-call" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Phone call</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data" id="new_customer">
                       <div class="form-group row">
                           <label class="col-sm-3 col-form-label">Customer </label>
                           <div class="col-sm-9">
                               <select type="text" name="customer" class="form-control form-control-sm" required>
                                <option selected disabled>[SELECT]</option>
                                <option value="Espoir">Espoir</option>
                                <option  value="Joseph">Joseph</option>
                                <option  value="Bojos">Bojos</option>
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
                               <input type="time" name="duration" class="form-control form-control-sm" required>
                           </div>
                       </div>
                       
                        <div class="col-md-6 col-sm-12  col-sm-offset-4" style="margin-left: 50%;">                
                          <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px;" >Save</button>
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
