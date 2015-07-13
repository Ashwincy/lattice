<?php

class Entry {
  public $id;
  public $dim;
  public $len;
  public $name;
  public $sol;
  public $email;
  public $algorithm;
  public $hardware;
  public $runtime;
  public $notes;
  public $date;
}

/*
function writeToFile($id, $e)
{
	 $write = true; // set to true if you want to regenerate

	$myFile = "sol/$id.txt";
	
	if ($write)
	{
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $e->sol."\n";
		fwrite($fh, $stringData);
		fclose($fh);
	}
}
*/
function buildNameString($namesArray) {
  $nameString = "";
  foreach ($namesArray as $n => $name) {
    if ($nameString == "")
      $nameString = $name;
    else
      $nameString = $nameString . "<br />" . $name;  
  }  
  return $nameString;
}


function top5()
{

$results = array();
$lines = file("./textfiles/contestants.txt");

$first = true;
$id = 0;

foreach ($lines as $line) {
  $id = $id + 1;
	// skip header
	if ($first == true)
	{
		$first = false;
		continue;
	}

    $entry = explode("|", $line);
	if (count($entry) != 10) {
		continue;
	}
	
	$e = new Entry();
  $e->id = $id;
	$e->dim		= $entry[0];
  $e->len   = $entry[1];
	$e->name  = explode(",", $entry[2]);
	$e->sol 	= $entry[3];
  $e->email   = $entry[4];
  $e->algorithm   = $entry[5];
  $e->hardware   = $entry[6];
  $e->runtime   = $entry[7];
  $e->notes   = $entry[8];
  $e->date   = $entry[9];
  

	if ($results["$e->dim"] == null || $results["$e->dim"]->len > $e->len) {
		$results["$e->dim"] = $e;
	}
}

krsort($results);

/*
$i = 1;
foreach ($results as $dim => $entry)
{
	if ($i > 5)
		break;	
	writeToFile("t$i", $entry); 
	$i++;
}
*/


return $results;
}

/*function show_submit($dim_find) {
    $students = array();
    $lines_1 = file("./textfiles/contestants.txt");
    foreach($lines_1 as $line){
        
    
    }
}*/

function all()
{
$results = array();
$lines = file("./textfiles/contestants.txt");

$first = true;
$id = 0;
foreach ($lines as $line) {
	  
	$id = $id + 1;
	// skip header
	if ($first == true)
	{
		$first = false;
		continue;
	}

    $entry = explode("|", $line);
	if (count($entry) != 10) {
		continue;
	}
	
	$e = new Entry();
  $e->id = $id;
  $e->dim   = $entry[0];
  $e->len   = $entry[1];
  $e->name  = explode(",", $entry[2]);
  $e->sol   = $entry[3];
  $e->email   = $entry[4];
  $e->algorithm   = $entry[5];
  $e->hardware   = $entry[6];
  $e->runtime   = $entry[7];
  $e->notes   = $entry[8];
  $e->date   = $entry[9];

	if ($results["$e->dim"] == null) {
		$results["$e->dim"] = array();
	}
	
	$results["$e->dim"]["$e->len"] = $e;
}


krsort($results);
foreach ($results as $key => $value)
{
	ksort($value);
	$results[$key] = $value; 
}

/*
$i = 1;
foreach($results as $key => $value)
{
	$rec = $value;
	
	foreach ($rec as $len => $entry)
	{
		writeToFile("$i", $entry); 
		$i++;
	}
}
*/

return $results;
}


?>
