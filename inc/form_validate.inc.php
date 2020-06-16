<?php // Form Validation and Submission Logic
$error_bucket = [];

if (is_post()){
    switch ($_POST['action']) {
        case 'login':
            if (empty($_POST['loginName'])) {
                array_push($error_bucket,"Username required to log in.");
            } else {
                $username = $db->real_escape_string($_POST['loginName']);
            }
            if (empty($_POST['loginPassword'])) {
                array_push($error_bucket,"Password is required to log in.");
            } else {
                $password = hash('sha512', $db->real_escape_string($_POST['loginPassword']));
            }
            if (count($error_bucket) == 0) {
                $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
                $result = $db->query($sql);
                // echo $sql;
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    echo '<div class="alert alert-success">You have successfully logged in, ' . $_SESSION['username'] . ".</div>";
                } else {
                    echo '<div class="alert alert-danger" role="alert">Incorrect username or password. Please try again</div>';
                }
            } else {
                display_errors($error_bucket);
            }
            break;
        case 'register':
            if (empty($_POST['fname'])) {
                array_push($error_bucket,"First name is required to register your account.");
            } else {
                $fname = $db->real_escape_string($_POST['fname']);
            }
            if (empty($_POST['lname'])) {
                array_push($error_bucket,"Your last name is required to register your account.");
            } else {
                $lname = $db->real_escape_string($_POST['lname']);
            }
            if (empty($_POST['username'])) {
                array_push($error_bucket,"A username is required to register your account.");
            } else {
                $username = $db->real_escape_string($_POST['username']);
            }
            if (empty($_POST['email'])) {
                array_push($error_bucket,"An email address is required to register your account.");
            } else {
                $email = $db->real_escape_string($_POST['email']);
            }
            if (empty($_POST['password'])) {
                array_push($error_bucket,"Please enter a secure password to create your account.");
            } else {
                $password = hash('sha512', $db->real_escape_string($_POST['password']));
            }
            if (count($error_bucket) == 0) {
                $sql = "INSERT INTO user (fname,lname,username,email,password,verification)
                        VALUES('$fname','$lname','$username','$email','$password',0)";
                // echo $sql;
                $result = $db->query($sql);
    
                if (!$result) {
                    echo '<div class="alert alert-danger" role="alert">Something went wrong... Please try again.</div>';
                } else {
                    echo "<div>Sucess! Please login to view and review!</div>";
                }
            } else {
                display_errors($error_bucket);
            }
            break;
        case 'review':
            $user_id = $db->real_escape_string($_SESSION['user_id']);
            $org_id = $db->real_escape_string($_POST['org_id']);
            if (empty($_POST['title'])) {
                array_push($error_bucket,"Please enter a title for your review.");
            } else {
                $title = $db->real_escape_string($_POST['title']);
            }
            if (empty($_POST['review'])) {
                array_push($error_bucket,"Please enter a valid review.");
            } else {
                $description = $db->real_escape_string($_POST['review']);
            }
            if (count($error_bucket) == 0) {
                $sql = "INSERT INTO review (user_id,org_id,title,description)
                            VALUES('$user_id','$org_id','$title','$description')";
                // echo $sql;
                $result = $db->query($sql);
                if (!$result) {
                    echo "<div>Something went wrong... Sorry about that.</div>";
                } else {
                    echo "<div>Your review has been posted, you can see it &nbsp;<a href=\"reviews.php\">here</a>.</div>";
                }
            } else {
                display_errors($error_bucket);
            }
            break;
        default:
            echo "<div>Something went wrong.. Please try again.</div>";
            break;
    }
}