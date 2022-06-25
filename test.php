<?php
include "dbConnection.php";

$sql = "SELECT * FROM client";
$result = $conn->query($sql) ;

if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc())
    {
      echo"<tr>";
      echo" <td>".$row['userID']."</td>";
      echo" <td>".$row['clientPhoto']."</td>";
      echo"</tr>";
    }
}


?>