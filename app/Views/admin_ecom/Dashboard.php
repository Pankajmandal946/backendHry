<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <!-- Google-Fonts -->
      <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
      <link href="../../template/css/bootstrap-reset.css" rel="stylesheet">
      <!--Icon-fonts css-->
      <link href="../../template/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="../../template/css/style.css" rel="stylesheet">
      <link href="../../template/css/style-responsive.css" rel="stylesheet" />
      
   </head>
   <body>
      <!-- Aside Start-->
      <aside class="left-panel">
         <!-- brand -->
         <div class="logo">
            <a href="index-2.html" class="logo-expanded">
            <img src="img/single-logo.png" alt="logo">
            <span class="nav-label">Admin</span>
            </a>
         </div>
         <!-- / brand -->
         <!-- Navbar Start -->
         <nav class="navigation">
            <ul class="list-unstyled">
               <li class="has-submenu"><a href="form-elements.html"><i class="ion-compose"></i> <span class="nav-label">Forms</span></a>
               </li>
               <li class="has-submenu"><a href="tables.html"><i class="ion-grid"></i> <span class="nav-label">Tables</span></a>
               </li>
               <li class="has-submenu"><a href="login.html"><i class="ion-grid"></i> <span class="nav-label">Login</span></a>
               </li>
            </ul>
         </nav>
      </aside>
      <!-- Aside Ends-->
      <!--Main Content Start -->
      <section class="content">
         <!-- Header -->
         <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Right navbar -->
            <ul class="list-inline navbar-right top-menu top-right-menu">
               <!-- user login dropdown start-->
               <li class="dropdown text-center">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                  <span class="username">John Deo </span> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                     <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
                  </ul>
               </li>
               <!-- user login dropdown end -->       
            </ul>
            <!-- End right navbar -->
         </header>
         <!-- Header Ends -->
         <!-- Page Content Start -->
         <!-- ================== -->
         <div class="wraper container-fluid">
            <div class="page-title">
               <h3 class="title">Basic Tables</h3>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title">Responsive Table</h3>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Username</th>
                                          <th>Age</th>
                                          <th>City</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>1</td>
                                          <td>Mark</td>
                                          <td>Otto</td>
                                          <td>@mdo</td>
                                          <td>20</td>
                                          <td>Cityname</td>
                                       </tr>
                                       <tr>
                                          <td>2</td>
                                          <td>Jacob</td>
                                          <td>Thornton</td>
                                          <td>@fat</td>
                                          <td>20</td>
                                          <td>Cityname</td>
                                       </tr>
                                       <tr>
                                          <td>3</td>
                                          <td>Larry</td>
                                          <td>the Bird</td>
                                          <td>@twitter</td>
                                          <td>20</td>
                                          <td>Cityname</td>
                                       </tr>
                                       <tr>
                                          <td>4</td>
                                          <td>Steve</td>
                                          <td>Mac Queen</td>
                                          <td>@steve</td>
                                          <td>20</td>
                                          <td>Cityname</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
         <!-- Page Content Ends -->
         <!-- ================== -->
         <!-- Footer Start -->
         <footer class="footer">
            2015 © Admin.
         </footer>
         <!-- Footer Ends -->
      </section>
      <!-- Main Content Ends -->
      <!-- js placed at the end of the document so the pages load faster -->
      <script src="../../template/js/jquery.js"></script>
      <script src="../../template/js/bootstrap.min.js"></script>
      <script src="../../template/js/jquery.app.js"></script>
   </body>
</html>