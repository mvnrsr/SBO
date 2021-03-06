<?php
  require_once 'inc/db.inc.php';
    $today = date('Y-m-d');
    date_default_timezone_set('Asia/Singapore');
    $currentTime = strtotime(date('H:i'));
    $getTime = date("H:i");
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <link rel="stylesheet" href="src/css/breadcrumb.css">
    <link rel="stylesheet" href="src/css/body.css">
    <script src="https://kit.fontawesome.com/e1f7070413.js" crossorigin="anonymous"></script>

  </head>
  <body class="w3-ios-background">
    <?php
      include 'header.php';
      if (isset($_SESSION['logged_in']) != TRUE) {
        header("Location: login.php?error=invader");
        exit();
      }
    ?>


    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container w3-row">
        <div class="w3-col s4">
          <img src="src/img/user.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>

        <div class="w3-col s8 w3-bar">
          <span>Welcome, <strong><?php echo $_SESSION['uname']; ?></strong></span><br>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
      </div>
      <hr>
      <div class="w3-container">
        <h5>Dashboard</h5>
      </div>
      <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="event.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-calendar-week"></i>  Events</a>
        <a href="surveylist.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fas fa-poll"></i>  Surveys</a>
        <a href="summary.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-file-contract"></i></i>  Summary</a>
        <?php if ($_SESSION['utype'] != 4): ?>
            <a href="users.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-users"></i>  Users </a>
        <a href="studentlist.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-user-graduate"></i>  Students</a>
        <a href="section.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Sections</a>
        <?php endif; ?>
        <a href="inc/logout.inc.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt fa-fw"></i>  Logout</a><br><br>
      </div>
    </nav> <!--Sidebar/menu -->

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
      <!-- Header -->
	  	<div class="w3-container">
		    <ul class="breadcrumb">
			    <li class="breadcrumb-item"><i class="fas fa-poll"></i>   Survey</li>
        </ul>
      </div>

      <div class="w3-container  w3-margin-bottom" style="width: 80%; margin-left: 1em;">
        <div class="w3-container">
          <h5 class=""><b>Survey Title</h5>
		      <p><button class="w3-button w3-blue" onclick="document.getElementById('addQuestion').style.display='block'">Add Question</button></p>
			    <p><button class="w3-button w3-blue" onclick="document.getElementById('addOption').style.display='block'">Add Option</button></p>

				<div id="addQuestion" class="w3-modal">
				  <div class="w3-modal-content w3-animate-zoom">
				  <i onclick="document.getElementById('addQuestion').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
					<div class="w3-container w3-white w3-center">
					  <h3 class="w3-wide">Add Question</h3>
					  <p><textarea rows="3" cols="110" class="w3-padding-small" name="" placeholder="Type here..."></textarea></p>
					  <button type="button" class="w3-button w3-padding-large w3-blue w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Submit</button>
					  <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Cancel</button>
					</div>
				  </div>
				</div>



				<div id="addOption" class="w3-modal">
				  <div class="w3-modal-content w3-animate-zoom">
				  <i onclick="document.getElementById('addOption').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
					<div class="w3-container w3-white w3-center">
					  <h3 class="w3-wide">Add Option</h3>
					  <p><form action="">
					<input placeholder="type here" type="text" name="">
					</form></p>
					  <button type="button" class="w3-button w3-padding-large w3-blue w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Submit</button>
					  <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Cancel</button>
					</div>
				  </div>
				</div>



          </div>
      <?php if ($_SESSION['utype'] != 4): ?>
        <!-- modal -->

      <?php endif; ?>





    </div> <!-- !PAGE CONTENT! -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <script>
    $(document).ready( function () {
      $('#table1').DataTable();
    } );
    $(document).ready( function () {
      $('#table2').DataTable();
    } );
    $(document).ready( function () {
      $('#table3').DataTable();
    } );
    $(document).ready( function () {
      $('#table4').DataTable();
    } );
    $(document).ready( function () {
      $('#table5').DataTable();
    } );
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }
  </script>

  </body>
</html>
