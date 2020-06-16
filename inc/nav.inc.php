<?php require 'inc/db_connect.inc.php'; ?>

<!-- Navbar -->
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
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogin">Login</button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalRegistration">Register</button>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>


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
                            <label for="loginName">Username</label>
                            <input type="text" name="loginName" id="loginName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" name="loginPassword" id="loginPassword" class="form-control">
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
require 'inc/form_validate.inc.php';
?>
