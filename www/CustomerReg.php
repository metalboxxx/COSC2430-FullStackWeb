<!DOCTYPE html>
<html>
<?php 
    require_once 'header.php'
?>

<body>
    <script src="register.js"></script>
  
	<div class="container mt-5">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>Register as Customer</h1>
                </div>
                <div class="panel-body">
                    <form class= "row g-3">
                        <div class="form-group">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname">
                        </div>
                        <div class="form-group">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label" require>Email*</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and maximum 20 characters" required>Password*</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="repass" class="form-label" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and maximum 20 characters" required>Retype Password*</label>
                            <input type="password" class="form-control" id="repass">
                            <p id="message"> </p>

                        </div>
                        <button onclick="validatePassword()" class="btn btn-secondary" id="submit">Check password</button>

                        <div class="form-group">
                            <label for="profilePicture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePicture">
                        </div>
                       
                        <div class="col-md-14">
                            <button type="submit" class="btn btn-primary" id="submit">Create account</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
                </div>               
            </div>
        </div>   
    </div>
    <footer class="container-fluid text-center">
        <p>© 2022 Copyright: Group 33</p>
    </footer>
</body>

</html>
