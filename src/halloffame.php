<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Hall of Fame</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

  <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />

  <!-- **** colour scheme stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/colour.css" />

</head>

<body>
  <div id="main_halloffame">
    <div id="links">
    </div>
    <div id="logo"><h1>TU DARMSTADT<br />LATTICE<br />CHALLENGE</h1></div>
    <div id="content">
      <div id="menu"></div>
      <div id="column3">

        <h1>hall of fame</h1>
                        <table style="text-align:center;" width="100%">
                        <thead>
                        <tr>
                        <th>Position</th>
                        <th>Dimension</th>
                        <th>Euclidean norm</th>
                        <th>Contestant</th>
                        <th>Submission</th>
                        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>


<?php

include_once('db.php');

$res = all(false);
$i = 1;
$lastdim = 0;
foreach($res as $key => $value) {
        $rec = $value;
        
        foreach ($rec as $len => $entry)
        {
                print "<tr>";
                if($lastdim != $entry->dim && $entry->dim >= 500) {
                    $lastdim = $entry->dim;
                    print "<td>" . $i . "</td>";
                    $i++;
                } else {
                    print "<td></td>";
                }
                print "<td>" . $entry->dim . "</td>";
                // print "<td>" . round (sqrt ($entry->len) * 100) / 100 . "</td>";
                print "<td>" . number_format(sqrt($entry->len), 2, '.', '') . "</td>";
                print "<td>" . buildNameString($entry->name) . "</td>";
	            print "<td><a  href=\"details.php?id=".$entry->id."\">Details</a></td>";
                print "<td>" . $entry->date . "</td>";
                print "</tr>";
        }

}

?>

                        </tbody></table>
                        <div class="center">
            <a href="./">Back</a><br/>
                        </div>
      </div>
    </div>
    <div id="footer">
      copyright &copy; 2010 R. Lindner, M. Rueckert, P. Baumann, L. Nobach | <a href="http://validator.w3.org/check?uri=referer">XHTML 1.1</a> |  <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a>
    </div>
  </div>
</body>
</html>


