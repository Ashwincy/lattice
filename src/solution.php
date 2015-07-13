
<?php

$id=$_GET['id'];

if (!is_numeric($id)) {
	echo("Parameter id is non-numeric");
	exit();
}

require_once('db.php');

$res = all(false);

echo($res[$id]->sol);

$i = 1;
foreach ($res as $key => $value) {
	foreach ($value as $key => $value) {
		if ($i == $id)  {
		  ?>
		  <head>
        <title><?php echo("Solution for ID: " . $id); ?></title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
      
        <!-- **** layout stylesheet **** -->
        <link rel="stylesheet" type="text/css" href="style/style.css" />
      
        <!-- **** colour scheme stylesheet **** -->
        <link rel="stylesheet" type="text/css" href="style/colour.css" />
      
      </head>
		  <body>
        <div id="main_halloffame">
          <div id="detailscontent">
            <div id="column3">
      
              <h1>Solution</h1>
              <div class="center">
        		  <?php
        			echo($value->sol . "\n");
              ?>
            </div>
            </div>
          </div>
        </div>
      </body>
      <?php
			exit();
		}
		$i++;
	}
}
echo("Could not find a solution with rank " . $id);

?>
