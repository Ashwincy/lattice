<?php
header('Content-type: text/plain');

class Entry {
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

require_once("includes/submission.inc.php");

function vectorTest($rec) {
  $norm = getEuclideanNorm($rec->sol);
	echo "" . $rec->dim . "|" . $norm . "|" . $rec->name . "|" . $rec->sol . "|" . "|" . "|" . "|\n";
	
}

function all()
  {
  $results = array();
  $lines = file("./textfiles/contestants.txt");
  
  $first = true;
  $i = 0;
  
  foreach ($lines as $line) {
    // skip header
    if ($first == true)
    {
      $first = false;
      continue;
    }
  
      $entry = explode("|", $line);
    if (count($entry) != 10 && count($entry) != 4) {
      continue;
    }

    $e = new Entry();
    $e->dim   = $entry[0];
    $e->len   = $entry[1];
    $e->name  = $entry[2];
    $e->sol   = $entry[3];
    if (count($entry) == 10) {
      $e->email   = $entry[4];
      $e->algorithm   = $entry[5];
      $e->hardware   = $entry[6];
      $e->runtime   = $entry[7];
      $e->notes   = $entry[8];
      $e->date   = $entry[9];
    }
  
    $results[$i] = $e;
    $i = $i + 1;
  }
  
  return $results;
}
$res = all();
$i = 1;
foreach($res as $key => $value) {
        $rec = $value;
        
        vectorTest($rec);
        $i++;
}

?>
