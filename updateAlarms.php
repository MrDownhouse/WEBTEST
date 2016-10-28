<?php
$databasehost = "localhost"; 
$databasename = "test"; 
$databasetable = "alarm"; 
$databaseusername="root"; 
$databasepassword = ""; 
$fieldseparator = ";"; 
$lineseparator = "\n";
$fieldenclosure = '"';
$csvfile = "C:\Users\Erik\Documents\TESTSHARE\Alarm_log_10.csv";

if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

try {
    $pdo = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        $databaseusername, $databasepassword,
        array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    die("database connection failed: ".$e->getMessage());
}

$sql = "TRUNCATE TABLE alarm";
$command = $pdo->prepare($sql);
$command->execute();

$affectedRows = $pdo->exec("
    LOAD DATA LOCAL INFILE ".$pdo->quote($csvfile)." 
		INTO TABLE `$databasetable` 
		FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
		ENCLOSED BY ".$pdo->quote($fieldenclosure)."
		LINES TERMINATED BY ".$pdo->quote($lineseparator)."
		IGNORE 1 LINES");

echo "Loaded a total of $affectedRows ALARMS from PLC. Update the page to refresh table\n";

?>