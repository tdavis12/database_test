<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Clear Page</title>
  </head>
  <body>
    <h1>Data Cleared</h1>

    <?php

    // create varialbes
    $host = getenv("host");
    $username = getenv("username");
    $user_pass = getenv("password");
    $database = getenv("database_name");
    $data = htmlspecialchars($_POST['data']);

    // create connection
    $mysqli = new mysqli($host, $username, $user_pass, $database);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // echo $mysqli->host_info . "\n";

    // clear data
    $sql = "DROP TABLE words";

    if ($mysqli->query($sql) === TRUE) {
        echo "Cleared successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    ?>

    <button onclick="window.location.href = 'home_page.php';">Return to home page</button>  

  </body>
</html>
