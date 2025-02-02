
<?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "Mysqldatabase.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: ../profile.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
                  $redis = new Redis();
    $redis->connect('localhost', 6379);

    // generate a unique session ID and store it in Redis
    $sessionId = uniqid();
    $redis->setex('session:' . $sessionId, 3600, $user['email']);
  echo json_encode($response);
  exit();
        ?>
        ?>
