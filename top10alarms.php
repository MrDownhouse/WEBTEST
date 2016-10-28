<?php
	// Connect to MySQL
	$link = mysql_connect( 'localhost', 'root', '' );
	if ( !$link ) {
	  die( 'Could not connect: ' . mysql_error() );
	}
	//select database
	mysql_select_db("test") or die(mysql_error());
	// Retrieve all the data from the "alarm" table
	$result = mysql_query("SELECT * FROM alarm ORDER BY TimeString DESC LIMIT 9") or die(mysql_error());
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