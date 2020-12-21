<?php include('abstract-views/header.php'); ?>
<h1>Registration</h1>
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="register_user">

        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname">
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname">
        </div>

        <div class="form-group">
            <label for="bday">Birthday</label>
            <input type="text" name="bday">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email">
        </div>

        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass">
        </div>

        <input type="submit" class="btn-primary" value="Register">

    </form>
<?php include('abstract-views/footer.php'); ?>