<?php
session_start();
require_once "../admin/controllers/public_controller.php";
require_once "../admin/controllers/category_controller.php";
$public_controller->add_visit();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>life news</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="css/fontawesome/css/brands.css" rel="stylesheet">
        <link href="css/fontawesome/css/solid.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Long+Cang&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Cute+Font|Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Cute+Font|Karla|Markazi+Text&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        
        <script src="js/jquery-3.4.1.min.js"></script> 
    </head>

    <body>

        <div class="container-fluid" style="background-color: #fff" >
        
            <div class="row">
                <div class="col-lg-2  " >
                        <img src="img/logo.png" style="width: 150px; height:80px; margin-top:10px; margin-left:20px; " alt="">
                </div>
                <div class="col-lg-10 float-lg-right ">
                    <div class="form-group row mt-lg-5 mr-5 float-right">
               
                        <form class="form-inline ">
                        <input class="form-control " type="search" id='topSearch' placeholder="Search" aria-label="Search">
                        <button class="btn btn-default  ml-2" style="background-color: #29a0da; color:#fff; " type="submit"><i class="fa fa-search " ></i></button>
                        </form>                   
                    </div>
                </div>
            </div>

            <div class="row  " style="background-color: #2a4191;">
                <nav class="navbar navbar-expand-lg navbar-light " >
                    <button class="navbar-toggler  " onclick="openNav()" type="button"  style="position: fixed; top:10px;right:10px;border:none;" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link foc" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <?php 
                        
                          $cats=$category_controller->get_category();
                          foreach($cats as $cat){
                            
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="category.php?cat=<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></a>
                        </li>
                        <?php }?>
                        <?php  if(isset($_SESSION['priv'])){
                                    if($_SESSION['priv']==1 or $_SESSION['priv']==2 ){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/">Dashboard</a>
                        </li>
                        <?php } } ?>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <?php if(!isset($_SESSION['id'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link login" href="#" >Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link signup" href="#" >SignUp</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" >Logout</a>
                        </li>
                        <?php }?>
                        </ul>
                     </div>
                </nav>
            </div>
        </div>
        
    <div id="mySidebar" class="sidebar" style="background-color: #FFF">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link ml-5 active" style="color:#2a5d8e !important; font-style:bold;" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php 
                 foreach($cats as $cat){
                        ?>
                  <li class="nav-item">
                            <a class="nav-link ml-5" style="color:#2a3d8e !important;" href="category.php?cat=<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></a>
                   </li>
                 <?php }?>
        </ul>
    </div>

 <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>signup</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <form id="break_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>Full Name</label>
                      <input type="text"class="form-control" name="name" id="un" placeholder="Username" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required="required">  
                    </div>
                    <div class="modal-footer">
                                <input type="hidden" value="4" name="type">
                                  <button type="button" class="btn btn-secondary" id="btn-add">confirm</button>
                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="cancel">
                              </div>
                    <hr>
                  </form>
                  </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>Login</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <form id="login_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="emaillog" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="passlog" placeholder="Password" required="required">  
                    </div>
                    <div class="modal-footer">
                                <input type="hidden" value="5" name="type">
                                  <button type="button" class="btn btn-secondary" id="btn-login">confirm</button>
                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="cancel">
                              </div>
               
                    <hr>
                  </form>
               
                  </div>
        </div>
    </div>
  </div>
</div>

