<?php
$pageTitle = "Review your Organization";
require 'inc/header.inc.php';
require 'inc/functions.inc.php';
require 'inc/nav.inc.php';
?>
<div class="writePage col-lg-10 col-md-10 col-sm-12">

<?php
if (!isset($_SESSION['username'])){
    echo '<div class="alert alert-warning" role="alert">Please log in to write a review</div>';
    } else {
    $orgSql = "SELECT * FROM `organization`";
    // echo $orgSql;
    $orgResult = $db->query($orgSql);
    ?>
    
    <div class="row">
        <h1>Welcome, <?= $_SESSION['username']?></h1>
    </div>
    <div class="row">
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST" id="reviewForm">
            <div class="form-group">
                <label for="org_id">Select Organization: </label><br>
                <select name="org_id" id="org_id">
                <?php
                while ($row = $orgResult->fetch_assoc()){
                    echo "<option value=\"{$row['org_id']}\" class=\"form-control\">{$row['name']}</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Review Title:</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <p>Your review:</p>
                <input type="hidden" id="trix" name="review">
                <trix-editor input="trix" maxlength="1500"></trix-editor>
            </div>
            <input type="submit" name="submit" class="btn btn-secondary" value="Submit Review">
            <input type="reset" class="btn btn-danger" value="Clear">
            <input type="hidden" name="action" value="review">
        </form>
    </div>
    <?php


}
?>
</div>

<?php require 'inc/footer.inc.php'; ?>