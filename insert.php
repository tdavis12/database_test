<html>
  <head>
    <title>Insert Page</title>
  </head>
  <body>
    <h1>Data Inserted</h1>

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

    // insert data
    $sql = "INSERT INTO words (word) VALUES ('$data')";

    if ($mysqli->query($sql) === TRUE) {
        echo "\"$data\" inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    ?>

    <p>Click to enter more data:</p>
    <button onclick="window.location.href = 'home_page.php';">Return</button>  

    <p>Click to see results:</p>
    <button onclick="window.location.href = 'data_display.php';">Database</button> 

  </body>
</html>
