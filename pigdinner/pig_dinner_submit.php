<!DOCTYPE html>
<head>
<title>Thank You</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php 
if(isset($_POST['submit'])){
    $to = "contact@fijitk.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
	//echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>


<nav class="main-nav-outer" id="welcome"><!--main-nav-start-->
	<div class="container">
        <ul class="main-nav">
        	<li><a href="../index.html">Home</a></li>
            <li><a href="../chapter.html">Chapter</a></li>
            <li><a href="../index.html#events">Events</a></li>
            <li class="small-logo"><a href="../index.html"><img src="../img/FijiShieldLogo.png" alt="" width="100" height="105"></a></li>
            <li><a href="../index.html#brothers">Brothers</a></li>
            <li><a href="http://www.phigam.org">Fiji</a></li>
            <li><a href="../index.html#contact">Contact</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav>
<!--main-nav-end-->

<!-- begin thank you message -->
<div class="page main-section" style="margin:25px auto; width:700px; max-width:80%;">
  <h2 style="font-size:60px">Thank You</h2>
  <p> 
  	<h3 style="font-family:'Roboto light'; text-transform:none; text-align:center;">Your RSVP is being confirmed! You will hear from us shortly.</h3> <br><br>
    
  	<div align="center">
    	<a class="link animated fadeInUp delay-12s" href="../index.html" >Return to Main Page</a>
    </div>
  </p>
</div>

</body>
</html>