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
  SELECT fornoedritt.TimeString, ROUND(fornoedritt.VarValue,0) AS RoundedValue, 
	sinvalue.TimeString, ROUND(sinvalue.VarValue,0) AS RoundedSin 
  FROM fornoedritt INNER JOIN sinvalue
  ON fornoedritt.TimeString = sinvalue.TimeString";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}
$results = array();
// Print out rows
while ( $row = mysql_fetch_assoc( $result ) ) {
  $results[] = array(
      'category' => $row['TimeString'],
      'value1' => $row['RoundedValue'],
      'value2' => $row['RoundedSin']
   );
}

$json = json_encode($results);

echo $json;

// Close the connection
mysql_close( $link );
?>