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

      $result = mysqli_query($mysqli,"SELECT * FROM words");

      echo "<table border='1'>
      <tr>
      <th>id</th>
      <th>word</th>
      </tr>";

      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['word'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";

      $mysqli-> close();
      ?>
    </table>
  </body>
</html>