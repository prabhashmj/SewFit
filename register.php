<?php  
session_start(); 
if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))
{
	header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Register</title>

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
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after,
  .left-alert input[type=password] + label:after,
  .left-alert input[type=email] + label:after,
  .left-alert input[type=url] + label:after,
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after,
  .left-alert input[type=datetime-local] + label:after,
  .left-alert input[type=tel] + label:after,
  .left-alert input[type=number] + label:after,
  .left-alert input[type=search] + label:after,
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after,
  .right-alert input[type=password] + label:after,
  .right-alert input[type=email] + label:after,
  .right-alert input[type=url] + label:after,
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after,
  .right-alert input[type=datetime-local] + label:after,
  .right-alert input[type=tel] + label:after,
  .right-alert input[type=number] + label:after,
  .right-alert input[type=search] + label:after,
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style>
</head>

<body class="cyan">
  <!-- Start Page Loading -->
<!--  <div id="loader-wrapper">-->
<!--      <div id="loader"></div>-->
<!--      <div class="loader-section section-left"></div>-->
<!--      <div class="loader-section section-right"></div>-->
<!--  </div>-->
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">

      <form class="formValidate" id="formValidate" method="post" action="routers/register-router.php" enctype="multipart/form-data" novalidate="novalidate" class="col s12">
        <div class="row">
          <div style="width: 400px;" class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Join us now!</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" id="username" type="text"  data-error=".errorTxt1">
            <label for="username" class="center-align">Username</label>
			<div class="errorTxt1"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input name="name" id="name" type="text" data-error=".errorTxt2">
            <label for="name" class="center-align">Name</label>
			<div class="errorTxt2"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password" data-error=".errorTxt3">
            <label for="password">Password</label>
			<div class="errorTxt3"></div>			
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
            <input name="phone" id="phone" type="number" data-error=".errorTxt4">
            <label for="phone">Phone</label>
			<div class="errorTxt4"></div>			
          </div>
        </div>
          <div class="row margin">
          <div class="file-field input-field">
              <div class="btn">
                  <span>Photo 1</span>
                  <input type="file" name="NIC_photo" id="NIC_photo" accept="image/*" multiple required>
              </div>
              <div class="file-path-wrapper">
                  <input class="file-path validate"  type="text" placeholder="Upload front side of your NIC" required>
              </div>
          </div>
          </div>
          <div class="row margin">
              <div class="file-field input-field">
                  <div class="btn">
                      <span>Photo 2</span>
                      <input type="file" name="NIC_photo2" id="NIC_photo2" accept="image/*" multiple required>
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate"  type="text" placeholder="Upload back side of your NIC" required>
                  </div>
              </div>
          </div>
        <div class="row">
          <div class="input-field col s12">
			<a href="javascript:void(0);" onclick="document.getElementById('formValidate').submit(); " id="insert" class="btn waves-effect waves-light col s12">Login</a>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="login.php">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>

  <script>
      $(document).ready(function(){
          $('#insert').click(function(){
              var image_name = $('#NIC_photo').val();
              if(image_name == '')
              {
                  alert("Please Select Image");
                  window.location.replace("http://sewfit.pramesh/register.php");
              }
              else if
              {
                  var extension = $('#NIC_photo').val().split('.').pop().toLowerCase();
                  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                  {
                      alert('Invalid Image File');
                      $('#NIC_photo').val('');
                      window.location.replace("http://sewfit.pramesh/register.php");
                  }
                  // else {
                  //     alert("Your account created successfully! Please login to Sew-Fit using given username and password...");
                  // }
              }

          });
      });
  </script>  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>

  <script>

      $(document).ready(function(){
          $('#insert').click(function(){
              var image_name = $('#NIC_photo2').val();
              if(image_name == '')
              {
                  alert("Please Select Image");
                  window.location.replace("http://sewfit.pramesh/register.php");
              }
              else
              {
                  var extension = $('#NIC_photo2').val().split('.').pop().toLowerCase();
                  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                  {
                      alert('Invalid Image File');
                      $('#NIC_photo2').val('');
                      window.location.replace("http://sewfit.pramesh/register.php");
                  }
                  else{
                      alert("Your account created successfully! Please login to Sew-Fit using given username and password...");
              }


              }

          });
      });
  </script>

<!--  <script>-->
<!--      function filevalidate() {-->
<!--          document.getElementById("NIC_photo").required=true;-->
<!--      }-->
<!--  </script>-->
  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->


  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.min.js"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="js/custom-script.js"></script>
  <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 5				
            },
			password: {
				required: true,
				minlength: 5
			},
            phone: {
				required: true,
				minlength: 4
			},
            NIC_photo: {
                required: true,
                minlength: 2
            },
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required."
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required."
            },
			password: {
				required: "Enter password",
				minlength: "Minimum 5 characters are required."
			},
            phone:{
				required: "Specify contact number.",
				minlength: "Minimum 4 characters are required."
			},
            NIC_photo:{
                required: "Upload clear photos of both sides of your NIC.",
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });


    </script>
</body>
</html>
<?php
}
?>