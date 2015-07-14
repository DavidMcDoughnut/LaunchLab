<?php
/*

Notes for dmcd:

1.Script to connect to mySQL DB "crunchiot" and select table "iotcompanies" 
2.then sets up row of field names
3. uses cURL to pull JSON data from iot category of Crunchbase API: category_uuids=ed3a589dc9a73cbb9feb245f011e1d54
4. holds data in an array which is looped through with SQL which INSERTS into db table: `crunchiot`.`iotCompanies`
5. SQL order is echoed and success is printed (ideally)
*/
{
$stage = $_REQUEST['stage'];
$ftes = $_REQUEST['ftes'];
$bizmodel = $_REQUEST['bizmodel'];
$industry = $_REQUEST['industry'];
$region = $_REQUEST['region'];
$country = $_REQUEST['country'];

$profit = $_REQUEST['nonprofit'];
$office = $_REQUEST['office'];
$runway = $_REQUEST['runway'];

$founder1sex = $_REQUEST['founder1sex'];
$founder1race = $_REQUEST['founder1race'];
$founder1age = $_REQUEST['founder1age'];
$founder1mom = $_REQUEST['founder1mom'];

$founder2sex = $_REQUEST['founder2sex'];
$founder2race = $_REQUEST['founder2race'];
$founder2age = $_REQUEST['founder2age'];

$founder3sex = $_REQUEST['founder3sex'];
$founder3race = $_REQUEST['founder3race'];
$founder3age = $_REQUEST['founder3age'];
}


{   //Connect and Test MySQL and specific DB (return $dbSuccess = T/F)
        
      include "connect.php";



      $dbConnected = @mysql_connect($hostname, $username, $password);
      $dbSelected = @mysql_select_db($databaseName,$dbConnected);

      $dbSuccess = true;
      if ($dbConnected) {
        if (!$dbSelected) {
          echo "DB connection FAILED<br /><br />";
          $dbSuccess = false;
        }   
      } else {
        echo "MySQL connection FAILED<br /><br />";
        $dbSuccess = false;
      }
}  

if ($dbSuccess) {
  
  $crunchiot_SQLselect = "SELECT ";
  $crunchiot_SQLselect .= "name ";
  $crunchiot_SQLselect .= "FROM "; 
  $crunchiot_SQLselect .= "launchpad1 ";  
  $crunchiot_SQLselect .= "WHERE ";
  $crunchiot_SQLselect .= "stage = $stage ";
  
  
  $crunchiot_SQLselect_Query = mysql_query($crunchiot_SQLselect); 

while($row = mysql_fetch_array($crunchiot_SQLselect_Query)) {
echo $row['name'];
}   

}

/*for($indx = 1; $row = mysql_fetch_array($crunchiot_SQLselect_Query, MYSQL_ASSOC); $indx++) {
      if($indx<6) { continue; }
      $Name = $row['name'];
      
     if($indx<11){
      echo $indx." - ".$Name;

      }
      
  }
  mysql_free_result($crunchiot_SQLselect_Query); 


}
*/
{ //Echo and Execute the SQL and test for success   
    echo "<strong><u>SQL:<br /></u></strong>";
    echo $crunchiot_SQLselect."<br /><br />";
      
    if (mysql_query($crunchiot_SQLselect))  {        
      echo "was SUCCESSFUL.<br /><br />";
    } else {
      echo "FAILED.<br /><br />";   
    }

  }
 
/*$indx = 1;  
  while ($row = mysql_fetch_array($crunchiot_SQLselect_Query, MYSQL_ASSOC)) {
      $Name = $row['name'];
      $Created = $row['created'];
      $Db = $row['db'];

      if ($indx <6){
      echo $indx." - ".$Name;

      $indx++; }
      
  }
  
  mysql_free_result($crunchiot_SQLselect_Query);    
}
*/







/*$stage = $_REQUEST['stage'];
$ftes = $_REQUEST['ftes'];
$bizmodel = $_REQUEST['bizmodel'];
$industry = $_REQUEST['industry'];
$region = $_REQUEST['region'];
$country = $_REQUEST['country'];

$profit = $_REQUEST['nonprofit'];
$office = $_REQUEST['office'];
$runway = $_REQUEST['runway'];

$founder1sex = $_REQUEST['founder1sex'];
$founder1race = $_REQUEST['founder1race'];
$founder1age = $_REQUEST['founder1age'];
$founder1mom = $_REQUEST['founder1mom'];

$founder2sex = $_REQUEST['founder2sex'];
$founder2race = $_REQUEST['founder2race'];
$founder2age = $_REQUEST['founder2age'];

$founder3sex = $_REQUEST['founder3sex'];
$founder3race = $_REQUEST['founder3race'];
$founder3age = $_REQUEST['founder3age'];

echo("<br><br><h3>Stage: </h3>" . $stage);
echo("<br><br><h3># of Full Time Employees: </h3>" . $ftes);
echo("<br><br><h3>Business Model: </h3>" . $bizmodel);
echo("<br><br><h3>Industry: </h3>" . $industry);
echo("<br><br><h3>Region: </h3>" . $region);
echo("<br><br><h3>Country: </h3>" . $country);

echo("<br><br><h3>For-profit or non-profit: </h3>" . $nonprofit);
echo("<br><br><h3>Office space: </h3>" . $office);
echo("<br><br><h3>One year worth of runway: </h3>" . $runway);

echo("<br><br><h3>Founder 1 sex: </h3>" . $founder1sex);
echo("<br><br><h3>Founder 1 race: </h3>" . $founder1race);
echo("<br><br><h3>Founder 1 age: </h3>" . $founder1age);
echo("<br><br><h3>Is founder 1 a mom: </h3>" . $founder1mom);

echo("<br><br><h3>Founder 2 sex: </h3>" . $founder2sex);
echo("<br><br><h3>Founder 2 race: </h3>" . $founder2race);
echo("<br><br><h3>Founder 2 age: </h3>" . $founder2age);

echo("<br><br><h3>Founder 3 sex: </h3>" . $founder3sex);
echo("<br><br><h3>Founder 3 race: </h3>" . $founder3race);
echo("<br><br><h3>Founder 3 age: </h3>" . $founder3age);
*/
?>