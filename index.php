<?php require "login/loginheader.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REMOTE SERVER</title>
	
	<!--Laster AmChart grafer, rekkefølge er viktig-->
	<script src="amcharts/amcharts.js"></script>
	<script src="amcharts/serial.js"></script>
	<script src="amcharts/plugins/dataloader/dataloader.min.js"></script>
	
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">ESNA REMOTE VIEWER</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
				  <li><a href="login/logout.php">Logout</a></li>
                </ul>
              </nav>
            </div>
          </div>
		  
		  <!--<div class="inner cover">
            <h1 class="cover-heading">Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
          </div>-->
		  
		<div class="bs-docs-header" id="content" tabindex="-1"> 
		<div class="container"> 
		<h1>Layer Test</h1>
		
		<p>Grid System</p>
		
		<button type="button" class="btn btn-primary" onclick="foo()">Update</button>
	<p></p>
	<script type="text/javascript">
		function foo() {
			$.ajax({
				url : "updateAlarms.php",
				type : "POST",
				success : function (result) {
					alert(result);

				}
			});

			$.ajax({
				url : "updatePressure.php",
				type : "POST",
				success : function (result) {
					alert(result);

				}
			});

			$.ajax({
				url : "updateSin.php",
				type : "POST",
				success : function (result) {
					alert(result);

				}
			});

		}
	</script>
		
		</div>
		</div>
		  
		<div class="row show-grid">
	    <div class="col-xs-12 col-sm-6 col-md-8"><div id="chartdiv" style="width: 100%; height: 500px;"></div>
		
		</div>
	    <div class="col-xs-6 col-sm-4"><!-- Alarm Tabell -->
		<div class="table-responsive">
		<table class="table-hover">
		  <thead>
			<tr>
			  <th>TimeString</th>
	 
			  <th>Message</th>
			</tr>
		  </thead>
 
        <tbody>
		<?php
			// Connect to MySQL
			$link = mysql_connect( 'localhost', 'root', '' );
			if ( !$link ) {
			  die( 'Could not connect: ' . mysql_error() );
			}
			//select database
			mysql_select_db("test") or die(mysql_error());
			// Retrieve all the data from the "alarm" table
			$result = mysql_query("SELECT * FROM alarm ORDER BY TimeString DESC LIMIT 10") or die(mysql_error());
			// store the record of the "alarm" table into $row

			while ($row = mysql_fetch_array($result)) {
				// Print out the contents of the entry 
				echo '<tr>';
				echo '<td>' . $row['TimeString'] . '</td>';
				echo '<td>' . $row['MsgText'] . '</td>';
			}
			
			//close connection
			mysql_close( $link );
		?>      
 
      </tbody>
 
      <tbody></tbody>
    </table>
	
	
	
		</div></div>
		<div class="col-xs-6 col-sm-4"></div>
		</div>


		
		
          <div class="mastfoot">
            <div class="inner">
              <p>Test site for REMOTE SERVER</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/CreateChart.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>
