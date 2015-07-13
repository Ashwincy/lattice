<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>TU Darmstadt Lattice Challenge</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="contextMenu/contextMenu.js"></script>
  <link rel="stylesheet" type="text/css" href="contextMenu/contextMenu.css" />
        <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />

  <!-- **** colour scheme stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/colour.css" />

</head>

<body>
  <div id="main">
    <div id="links">
<!--
          <a href="#">another link</a> | <a href="#">another link</a> | <a href="#">another link</a> | <a href="#">another link</a>
-->
    </div>
    <div id="logo"><h1>TU DARMSTADT<br />LATTICE<br />CHALLENGE</h1></div>
    <div id="content">
      <div id="menu">
<!--
        <ul>
          <li><a id="selected" href="index.html">home</a></li>
          <li><a href="page1.html">page 1</a></li>
          <li><a href="page2.html">page 2</a></li>
          <li><a href="page3.html">page 3</a></li>
          <li><a href="contact.html">contact</a></li>
        </ul>
-->
      </div>
      <div id="column1">
<!--        <div class="sidebaritem">
          <div class="sbihead">
            <h1>news</h1>
          </div>
          <div class="sbicontent">
            <h2>14.12.2007</h2>
            <p>Started the challenge.</p>
            <p></p>
            <p></p>
            <h2>13.5.2008</h2>
            <p>The challenges are online</p>
            <p></p>
            <p></p>
			<h2>17.3.2008</h2>
            <p>Initial setup</p>
            <p></p>
            <p></p>
          </div>
        </div>-->

        <div class="sidebaritem">
          <div class="sbihead">
            <h1>Submission</h1>
          </div>
          <div class="sbilinks">
            <ul>
              <li><a href="./submission.php">Submission</a></li>
            </ul>
          </div>
        </div>
        
        <div class="sidebaritem">
          <div class="sbihead">
            <h1>Download</h1>
          </div>
          
	<div class="sbicontent">
            <p>
              <a href="#" onclick="javascript:window.open('./textfiles/format.txt', 'Format of challenge files', 'width=600,height=300,left=100,top=200,scrollbars=yes')">Format of Challenge Files</a>
            </p>
          </div>
	<div class="sbicontent">
            <p>
              Toy Challenges in Dimension
            </p>
          </div>
          <div class="sbilinks">
            <!-- **** INSERT ADDITIONAL LINKS HERE **** -->
            <table>
            <tr>
                <td><a href="challenges/LWE_20_40.1000000000000">20</a></td>
                <td><a href="challenges/LWE_30_90.7000000000000">30</a></td>
                <td><a href="challenges/LWE_40_160.100000000000">40</a></td>
                <td><a href="challenges/LWE_60_360.700000000000">60</a></td>
            </tr>
           </table>
          </div>
		<div class="sbicontent">
            <p>
              Challenges in Dimension
            </p>
             <p><a href="challengesMatrix.php">Detailed List</a></p>
          </div>
          <div class="sbilinks">
            <!-- **** INSERT ADDITIONAL LINKS HERE **** -->
            
                
            
          
          </div>

	<div class="sbicontent">
            <p>
              Random Source <a href="challenges/PI_200M_mod2.bz2">PI</a>
            </p>
          </div>
          <div class="sbilinks">
          </div>

        </div>
        
        <div class="sidebaritem">
          <div class="sbihead">
            <h1>links</h1>
          </div>
          <div class="sbilinks">
            <ul>
              <li><a href="svp-challenge/index.php">SVP Challenge</a></li>
              <li><a href="ideallattice-challenge/index.php">Ideal Lattice Challenge</a></li>
            </ul>
          </div>
        </div>
        
        <div class="sidebaritem">
          <div class="sbihead">
            <h1>Contact</h1>
          </div>
          <div class="sbicontent">
            <!-- **** INSERT OTHER INFORMATION HERE **** -->
            <p>
              <a href="mailto:fgoepfert at cdc.informatik.tu-darmstadt.de">Florian G&ouml;pfert</a>
            </p>
			<p>
TU Darmstadt<br />
Department of<br />Computer Science<br />
Cryptography and Computeralgebra<br />
Hochschulstra&szlig;e 10<br />
64289 Darmstadt<br />
			</p>
          </div>
        </div>
      </div>
      <div id="column2">
<!--         <h1>soon to start</h1> -->
        <h1>introduction</h1>
        <p>
          Welcome to the lattice challenge. 
        </p>
        <p>
          Building upon a popular paper by Ajtai [1], we have constructed lattice bases for which the solution of SVP implies a solution of SVP in <i>all</i> lattices of a certain smaller dimension. This does not mean that one can solve all instances simultaneously, but rather that one can solve even the worst case instances. We think these lattice bases are hard instances and most fitting to test and compare modern lattice reduction algorithms.
        </p>
        <p>
          We show how these lattice bases were constructed and prove the existence of short vectors in each of the corresponding lattices in [2]. 
	  We challenge everyone to try whatever means to find a short vector. There are two ways to enter the hall of fame:
	</p>
	 <ol style="list-style-type: disc;">
		<li>Tackle a challenge dimension that nobody succeeded in before;</li> 
		<li>Find an even shorter vector in one of the dimensions listed in the hall of fame.</li> 
	</ol>
        
        <h2>References</h2>
        <ol>
          <li>Ajtai: <a href="http://portal.acm.org/citation.cfm?id=237838">Generating Hard Instances of Lattice Problems</a>, STOC 1996</li>
          <li>Buchmann, Lindner, R&uuml;ckert: <a href="http://eprint.iacr.org/2008/333">Explicit Hard Instances of the Shortest Vector Problem</a>, PQCrypto 2008</li>
        </ol>
        <h1>hall of fame</h1>
        <p><i>Click on the below cells to find more details</i></p>
        <p>Cells in <b>RED</b> are the ones which are solved and <b>GREEN</b> ones are the not solved once </p>
        <div clas="hall">      
<?php

$initVal = 79;
$lines = file("./textfiles/contestants.txt");
$cell_color = array_fill(0,80,"green");
$first = true;

 foreach ($lines as $line) {
	  
	// skip header
	if ($first == true)
	{
		$first = false;
		continue;
	}

    $entry = explode("|", $line);
		
        $smtg = $entry[0];
       $cell_color[$smtg]="red";

}

echo "<table id=\"fame\">";
for ($initVal ; $initVal >=0; $initVal = $initVal-2) {
     echo "<tr id=\"table_row\">";
    for($initVal2=0; $initVal2 <=79; $initVal2=$initVal2+1){
        echo "<td class=\"cell\" id=\"$initVal2\" name=\"$cell_color[$initVal2]\" title=\"$initVal2,$initVal and sigma\" style=\" border-radius: 5px;
    background: $cell_color[$initVal2];
    cursor:pointer;
    width: 10px;
    height: 5px;\"></td>";
        }
     echo"</tr>";
            
 }
 

 

?>
            
            


 <script>
   
 
     var menu = [{
        name: 'see the details',
        title: 'details',
        fun: function () {
        window.location='halloffame.php' ;
       }
    }, {
        name: 'download',       
        title: 'download',
        fun: function () {
          window.open("challenges/LWE_20_40.1000000000000");
        }
    }];
  var menu1 = [{
        name: 'submit',
        title: 'submit',
        fun: function () {
        window.location='submission.php' ;
       }
    }, {
        name: 'download',       
        title: 'download button',
        fun: function () {
          window.open("challenges/LWE_20_40.1000000000000");
        }
    }];
 /*function open_menu(){
     var $cell = document.getElementById("cell");
    console.log($cell.style.background);
 if($cell.style.background === "red")
  {
//Calling context menu
$(document).contextMenu(menu);
  }
 if($cell.style.background === "green")
  {
      console.log("inside green");
//Calling context menu
$(document).contextMenu(menu1);
  }
 }*/
    $(function()
	{
	$(".cell").click(function(e)
        {
               e.stopPropagation();

   var trid = $(this).closest('td').attr('id'); // table row ID 
 var thing = document.getElementById(trid);
 console.log(thing);
 if(thing.style.background === "red")
  {
//Calling context menu
$(document).contextMenu(menu);
  }
 if(thing.style.background === "green")
  {
      //console.log("inside green");
//Calling context menu
$(document).contextMenu(menu1);
  }
	});
     });
  
     
     
     
  </script>
        
</body>
</html>
