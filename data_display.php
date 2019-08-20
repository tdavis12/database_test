<!DOCTYPE html>
<html>
  <head>
    <title>Database Table</title>
  </head>
  <body>
    <table>
      <tr>
        <th>Id</th>
        <th>Word</th>
      </tr>
      <?php
      $host = getenv("host");
      $username = getenv("username");
      $user_pass = getenv("password");
      $database = getenv("database_name");

      $mysqli = new mysqli($host, $username, $user_pass, $database);
      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }

      // $sql = "SELECT id, firstname, lastname FROM MyGuests";
      // $result = $conn->query($sql);
      
      // if ($result->num_rows > 0) {
      //     // output data of each row
      //     while($row = $result->fetch_assoc()) {
      //         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      //     }
      // } else {
      //     echo "0 results";
      // }
      // $conn->close();

      $sql = "SELECT id, word from words";
      $result = $conn -> query($sql);

      if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
          echo "<tr><td>". $row["Id"] ."</td><td>". $row["Word"] ."</td></tr>";
        }
        echo "</table>";
      }
      else {
        echo "0 result";
      }

      $conn-> close();
      ?>
    </table>
  </body>
</html>