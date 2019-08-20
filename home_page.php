<html>
  <head>
    <title>Main Page</title>
  </head>
  <body>
    <h1>Welcome to the homepage.</h1>

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

    echo $mysqli->host_info . "\n";

    // create table
    $sql = "CREATE TABLE words (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      word VARCHAR(30) NOT NULL
    )";

    $mysqli->close();
    ?>

    <p>This webapp is used to test databases.</p>

    <form action="insert.php" method="get">
      Enter a word below:<br>
      <input type="text" name="data"><br>
      <input type="submit" value="Submit">
    </form>
    <p>The data enterd should be returned on the next page.</p>
    <button onclick="window.location.href = 'data_display.php';">I am a button</button>
  </body>
</html>
