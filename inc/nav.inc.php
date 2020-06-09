<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">OrgReview</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul id="navItems" class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="reviews.php">Reviews</a></li>
            <li class="nav-item"><a class="nav-link" href="writereview.php">Write</a></li>
        </ul>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLogin">Login</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistration">Register</button>
    </div>
</nav>

<?php require 'inc/db_connect.inc.php'; ?>

<!-- Login form - modal -->
<div class="modal" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h2>Login</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        <input type="hidden" name="action" value="login">
                    </form>
            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<!-- Registration form - modal -->

<div class="modal" id="modalRegistration" tabindex="-1" role="dialog" aria-labelledby="modalRegistration" aria-hidden="true">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2>Register for Org Review</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                    <input type="submit" name="submit" class="btn btn-primary" value="Register">
                    <input type="hidden" name="action" value="register">
                </form>
            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<?php
// logic
if (is_post()){
    switch ($_POST['action']) {
        case 'login':
            $username = $db->real_escape_string($_POST['username']);
            $password = hash('sha512', $db->real_escape_string($_POST['password']));

            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = $db->query($sql);
            // echo $sql;
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $row['username'];
                echo "<div>You have successfully logged in " . $_SESSION['username'] . ".</div>";
            } else {
                echo "<div>Incorrect username or password. Please try again</div>";
            }
            break;
        case 'register':
            $fname = $db->real_escape_string($_POST['fname']);
            $lname = $db->real_escape_string($_POST['lname']);
            $username = $db->real_escape_string($_POST['username']);
            // add regex for email
            $email = $db->real_escape_string($_POST['email']);
            $password = hash('sha512', $db->real_escape_string($_POST['password']));
    
            $sql = "INSERT INTO user (fname,lname,username,email,password,verification)
                        VALUES('$fname','$lname','$username','$email','$password',0)";
            // echo $sql;
            $result = $db->query($sql);
    
            if (!$result) {
                echo "<div>Something went wrong... Please try again.</div>";
            } else {
                echo "<p>Sucess! Please login to view and review!</p>";
            }
            break;
        default:
            echo "<div>Something went wrong.. Please try again.</div>";
            break;
    }
}
?>
