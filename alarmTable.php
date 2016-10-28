<?php require "login/loginheader.php"; ?>

<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'test', $link );
if ( !$db ) {
  die ( 'Error selecting database \'test\' : ' . mysql_error() );
}

// Fetch the data
$query = "
  SELECT *
  FROM alarm";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

//test

while ($row = mysql_fetch_array($result)) {
   echo "<tr>";
   echo "<td>".$row[TimeString]."</td>";
   echo "<td>".$row[MsgText]."</td>";
   //echo "<td>".$row[Title]."</td>";
   echo "</tr>";
}

// Close the connection
mysql_close( $link );
?>