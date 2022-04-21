<?php
include 'includes/connect.php';
	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>All orders</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /*.modal { max-height: 85%; overflow: visible}*/

        div#modal1 {
            /*width: 50%;*/
            max-height: 80%;
            min-height: 79%;
            /*overflow: visible;*/
            /*bottom: 20%;*/
        }
        td {
            border-right: solid 1px #15957d;
            border-left: solid 1px #15957d;
            border-bottom: solid 1px #15957d;
        }

    </style>
</head>

<body>
  <!-- Start Page Loading -->
<!--  <div id="loader-wrapper">-->
<!--      <div id="loader"></div>-->
<!--      <div class="loader-section section-left"></div>-->
<!--      <div class="loader-section section-right"></div>-->
<!--  </div>-->
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar navbar-light" style="background-color: #5a5a42;">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/logo.png" alt="logo"></a> <span class="logo-text">Logo</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
				<div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Uniform Types</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
								<li class="<?php
								if(!isset($_GET['status'])){
										echo 'active';
									}?>
									"><a href="all-orders.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
									while($row = mysqli_fetch_array($sql)){
									if(isset($_GET['status'])){
										$status = $row['status'];
									}
                                    echo '<li class='.(isset($_GET['status'])?($status == $_GET['status'] ? 'active' : ''): '').'><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-tickets.php">All Tickets</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>			
            <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">All Orders</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
<p class="center-align">
          <a style="width: 200px;" class="waves-effect waves-light btn modal-trigger " href="#modal1">Statistics</a>


</p>
          <!-- Modal Structure -->

          <div  style="width: 80%; left: 10%; " id="modal1" class="modal bottom-sheet modal-fixed-footer">
              <div  class="modal-content">
                  <h4>Statistics<i class="modal-close small material-icons right">close</i></h4>

<!--                  <h5>Information of all orders...</h5>-->
                  <div class="row">
                      <div class="col s6 l3">
                          <h5  style="color: #1d7d74;font-size: 22px;">
                  <?php
                  //                mysql_select_db($db);

                  //                 = "select sum(total) from orders";
                  $sqlx = mysqli_query($con, "SELECT count(id) FROM orders");
                  //                $q = mysql_query($sql);
                  while($rowx = mysqli_fetch_array($sqlx)){
                      echo 'Total Orders: ' . $rowx[0];
                  }

                  ?>
                          </h5>
                  </div>
                      <div class="col s6 l3">
                          <h5 style="color: #1d7d74; font-size: 22px;">

                          <?php
                          //                mysql_select_db($db);

                          //                 = "select sum(total) from orders";
                          $sqlx = mysqli_query($con, "SELECT sum(total) FROM orders");
                          //                $q = mysql_query($sql);
                          while($rowx = mysqli_fetch_array($sqlx)){
                              echo 'Total Income: Rs.' . $rowx[0];
                          }


                          ?>
                          </h5>
                      </div>
                      <div class="col s6 l3">
                          <h5 style="color: #1d7d74;font-size: 22px;">

                          <?php
                          //                mysql_select_db($db);
$count=0;
                          //                 = "select sum(total) from orders";
                          $sqlx = mysqli_query($con, "SELECT count(payment_type) FROM orders WHERE payment_type LIKE 'Voucher'");
                          //                $q = mysql_query($sql);
                          while($rowx = mysqli_fetch_array($sqlx)){
                              echo 'Purchased by Voucher: ' . $rowx[0];
//                              if ($rowx['payment_type']=='Voucher'){
//                                  $count++;
//                              }
                          }
//
                          ?>
                          </h5>
                      </div>
                       <div class="col s6 l3">
                           <h5 style="color: #1d7d74;font-size: 22px;">

                           <?php
                          $sqlx = mysqli_query($con, "SELECT count(payment_type) FROM orders WHERE payment_type LIKE 'Cash On Delivery'");
                          //                $q = mysql_query($sql);
                          while($rowx = mysqli_fetch_array($sqlx)) {
                              echo 'Purchased by cash: ' . $rowx[0];
                          }
                          ?>
                           </h5>
                      </div>
                  </div>
                  <div style="margin-top: 30px;" class="row">
<!--                     -->
                      <table>
                          <thead>
                          <tr>
                              <th style="text-align: center;">Delivered</th>
                              <th style="text-align: center;">Not Delivered</th>
                              <th style="text-align: center;">Admin Cancelled</th>
                          </tr>
                          </thead>

                          <tbody>
                          <tr>
                              <td><h6 style="text-align: center; ">
                                   <?php
                          //                mysql_select_db($db);

                          //                 = "select sum(total) from orders";
                          $sqlx = mysqli_query($con, "SELECT DISTINCT id FROM orders WHERE status LIKE 'Delivered'");
                          //                $q = mysql_query($sql);
                          while($rowx = mysqli_fetch_array($sqlx)){
                              echo 'Order No. ' . $rowx['id'].'<br><br>';
                          }
                          ?>
                             </h6> </td>
                              <td><h6 style="color: #0D47A1; text-align: center; border-bottom: #5e5252">
                                      <?php
                                      //                mysql_select_db($db);

                                      //                 = "select sum(total) from orders";
                                      $sqlx = mysqli_query($con, "SELECT DISTINCT id FROM orders WHERE status LIKE 'Yet to be delivered'");
                                      //                $q = mysql_query($sql);
                                      while($rowx = mysqli_fetch_array($sqlx)){
                                          echo 'Order No. ' . $rowx['id'].'<br><br>';
                                      }
                                      ?>
                                  </h6></td>
                              <td><h6 style="color: #820f26;text-align: center; vertical-align: top">
                                      <?php
                                      //                mysql_select_db($db);

                                      //                 = "select sum(total) from orders";
                                      $sqlx = mysqli_query($con, "SELECT DISTINCT id FROM orders WHERE status LIKE 'Cancelled by Admin'");
                                      //                $q = mysql_query($sql);
                                      while($rowx = mysqli_fetch_array($sqlx)){
                                          echo 'Order No. ' . $rowx['id'].'<br><br>';
                                      }
                                      ?>
                                  </h6></td>
                          </tr>
<!--                          <tr>-->
<!--                              <td>Alan</td>-->
<!--                              <td>Jellybean</td>-->
<!--                              <td>$3.76</td>-->
<!--                          </tr>-->
<!--                          <tr>-->
<!--                              <td>Jonathan</td>-->
<!--                              <td>Lollipop</td>-->
<!--                              <td>$7.00</td>-->
<!--                          </tr>-->
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK</a>
              </div>
          </div>


        <!--start container-->
        <div class="container">
          <p class="caption">List of orders by customers with details</p>


          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
             
					<?php
					if(isset($_GET['status'])){
						$status = $_GET['status'];
					}
					else{
						$status = '%';
					}
					$sql = mysqli_query($con, "SELECT * FROM orders WHERE status LIKE '$status';");
					echo '<div class="row">
                <div>
                    <h4 class="header">List</h4>
                    <ul id="issues-collection" class="collection">';
					while($row = mysqli_fetch_array($sql))
					{
						$status = $row['status'];
						$deleted = $row['deleted'];
						echo '<li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No. '.$row['id'].'</span>
                              <p><strong>Date:</strong> '.$row['date'].'</p>
                              <p><strong>Payment Type:</strong> '.$row['payment_type'].'</p>							  
							  <p><strong>Status:</strong> '.($deleted ? $status : '
							  <form method="post" action="routers/edit-orders.php">
							    <input type="hidden" value="'.$row['id'].'" name="id">
								<select name="status">
								<option value="Yet to be delivered" '.($status=='Yet to be delivered' ? 'selected' : '').'>Yet to be delivered</option>
								<option value="Delivered" '.($status=='Delivered' ? 'selected' : '').'>Delivered</option>
								<option value="Cancelled by Admin" '.($status=='Cancelled by Admin' ? 'selected' : '').'>Cancelled by Admin</option>
								<option value="Paused" '.($status=='Paused' ? 'selected' : '').'>Paused</option>								
								</select>
							  ').'</p>
                              <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                              </li>';
						$order_id = $row['id'];
						$customer_id = $row['customer_id'];
						$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
						$sql3 = mysqli_query($con, "SELECT * FROM users WHERE id = $customer_id;");
							while($row3 = mysqli_fetch_array($sql3))
							{
							echo '<li class="collection-item">
                            <div class="row">
							<p><strong>Name: </strong>'.$row3['name'].'</p>
							<p><strong>Address: </strong>'.$row['address'].'</p>
							'.($row3['contact'] == '' ? '' : '<p><strong>Contact: </strong>'.$row3['contact'].'</p>').'	
							'.($row3['email'] == '' ? '' : '<p><strong>Email: </strong>'.$row3['email'].'</p>').'		
							'.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'								
                            </li>';							
							}
						while($row1 = mysqli_fetch_array($sql1))
						{
							$item_id = $row1['item_id'];
							$measures = $row1['measures'];
							$sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
							while($row2 = mysqli_fetch_array($sql2)){
								$item_name = $row2['name'];
								$measurements = $row2['measurements'];
                            }
							echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s7">
                            <p class="collections-title"><strong>#'.$row1['item_id'].'</strong> '.$item_name.'</p>
                            </div>
                            <div class="col s2">
                            <span>'.$row1['quantity'].' Pieces</span>
                            </div>
                            <div class="col s2">
                            <span>'.$measurements.' : '.$measures.'</span>
                            </div>
                            <div class="col s3">
                            <span>Rs. '.$row1['price'].'</span>
                            </div>
                            </div>
                            </li>';
						}
								echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
											<span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>Rs. '.$row['total'].'</strong></span>
                                            </div>';										
								if(!$deleted){
								echo '<button class="btn waves-effect waves-light right submit" type="submit" name="action">Change Status
                                              <i class="mdi-content-clear right"></i> 
										</button>
										</form>';
								}
								echo'</div></li>';
					}
					?>
					</ul>
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer" style="background-color: #5a5a42;">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2020 <a class="grey-text text-lighten-4" href="#" target="_blank">prabhashmj</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">prabhashmj</a></span>
        </div>
    </div>
  </footer>
    <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>       
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_id']==session_id())
		{
			header("location:orders.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>