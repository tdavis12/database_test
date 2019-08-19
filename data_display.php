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
      $conn = mysqli_connect("localhost", "root", "", "company");
      if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
      }

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