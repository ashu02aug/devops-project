<?php
  
   $dbhost = "localhost";
   $dbuser = "testdb";
   $dbpass = "testdb";
   $dbname = "testdb";
  $con = mysqli_connect($dbhost,'testdb','testdb',$dbname,'8001');

if(!$con)
{
  die("Connection failed: " .mysqli_connect_error());
}


$firstname = $_POST['fname'];
   $lastname = $_POST['lname'];
   $age = $_POST['age'];


$query1= "Insert into users (firstname,lastname,age) values ('$firstname','$lastname',$age)";


//build select query
   $query = "SELECT firstname,lastname,age,createddatetimestamp FROM users";
 if(mysqli_query($con,$query1))
{
echo "New record created <br /> <br />";
}
else
{
echo "Error: " .$query1."<br>".mysqli_error($con);
}
  
   //Execute query
   $qry_result = mysqli_query($con,$query) or die(mysqli_error());
  
   //Build Result String
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>FirstName</th>";
   $display_string .= "<th>LastName</th>";
   $display_string .= "<th>Age</th>";
   $display_string .= "<th>CreatedDateTimeStamp</th>";
   $display_string .= "</tr>";
  
   // Insert a new row in the table for each person returned
   while($row = mysqli_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[firstname]</td>";
      $display_string .= "<td>$row[lastname]</td>";
      $display_string .= "<td>$row[age]</td>";
      $display_string .= "<td>$row[createddatetimestamp]</td>";
	
       $display_string .= "</tr>";
   }
  
  
   $display_string .= "</table>";
   echo $display_string;
mysqli_close($con);

    
?>

