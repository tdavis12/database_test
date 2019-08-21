<!DOCTYPE html>
<html>
  <head>
    <title>Database Table</title>
  </head>
  <body>
    <table>
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

      <p>Click to enter more data:</p>
      <button onclick="window.location.href = 'home_page.php';">Database</button>

      <form action="clear.php" method="post">
        Click to clear database:<br>
        <input type="submit" value="Clear">
      </form>

    </table>
  </body>
</html>