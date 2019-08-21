<html>
  <head>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <title>Main Page</title>
  </head>
  <body>
    <h1>Welcome to the Database Test</h1>

    <?php
    // create varialbes
    $host = getenv("host");
    $username = getenv("username");
    $user_pass = getenv("password");
    $database = getenv("database_name");

    // create connection
    $mysqli = new mysqli($host, $username, $user_pass, $database);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // echo $mysqli->host_info . "\n";

    // create table
    $sql = "CREATE TABLE words (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      word VARCHAR(30) NOT NULL
    )";

    if ($mysqli->query($sql) === TRUE) {
      echo "New table created successfully";
    } else {
      // echo "Error: " . $sql . "<br>" . $mysqli->error;
      echo $mysqli->error;
    }

    $mysqli->close();
    ?>

    <p>This webapp is used to test databases. This webapp was specifially made to test running a MySQL database with Openshift.</p>
    <p>Using this site, you are able to fill a MySQL database with strings that are 255 characters or less. 
      These strings will be auto-incramented and stored in the order you entered them.</p>
    <p>Strings with special characters are not allowed and will not be recorded.
    <p>To begin filling the database with data, enter a word below and press "Submit"</p>

    <form action="insert.php" method="post">
      Enter a string below:<br>
      <input type="text" name="data"><br>
      <input type="submit" value="Submit">
    </form>

    <p>Click here to see what data is already in the database.</p>
    <button onclick="window.location.href = 'data_display.php';">Database</button>

    <form action="clear.php" method="post">
      <br>
      Click to clear database:
      <br>
      <br>
      <input type="submit" value="Clear">
    </form>

  </body>
</html>
