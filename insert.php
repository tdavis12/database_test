<html>
  <head>
    <title>Insert Page</title>
  </head>
  <body>
    <h1>Data inserting.</h1>

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

    // insert data
    $sql = "INSERT INTO words (word)
    VALUES (NULL, '$data')";

    if ($mysqli->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    ?>

  </body>
</html>
