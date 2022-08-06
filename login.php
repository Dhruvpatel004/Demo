<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eassy Asses</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $module = stripslashes($_REQUEST['module']);
        $module = mysqli_real_escape_string($con, $module);
        // Check user is exist in the database
        if($module=="student")
        {
        $query    = "SELECT 'username,module,password' FROM `student` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }}
        else if($module=="faculty")
        {
        $query    = "SELECT 'username,module,password' FROM `faculty` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }}
        else if($module=="admin")
        {
        $query    = "SELECT 'username,module,password' FROM `admin` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: admindashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }}
    } else {
?>



    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="LOGO" width="150px">
            </div>
            <div class="title">
                <h1 class="titleOne">Eassy Asses </h1>
                <h2 class=" titleTwo">Eassy Place to Asses student</h2>
            </div>
            <div class="list">
                <ul>
                    <li class="listItem">
                        <a href="#">HOME</a>
                    </li>
                    <!-- <li class="listItem">
                        <a href="#">LOGIN</a> -->
                    </li>
                    <li class="listItem">
                        <a href="#">ABOUT US</a>
                    </li>
                    <li class="listItem">
                        <a href="#">CONTACT</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main class="main">
        <form method="post" class="login">
            <div class="titleForm">
                <h3 class="titelThree">LOGIN</h3>
            </div>
            <div class="username">
            <label for="">Username : *</label>
            <input type="text" name="username" placeholder="Username" autofocus="true"/>
            </div>
            <div class="password">
                <label for="">Password : *</label>
                <input type="password" name="password" placeholder="Password"/>
            </div>
            <div class="module">
                <label for="">Select : *</label>
                <select name="module" id="module">
                    <option value="none">Select Here</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="but">
            <input type="submit" value="Login" name="submit" class="login-button"/>
                <button type="reset">Reset</button>
            </div>

        </form>
<div class="img">
    <img src="img/image.png" alt="img">
</div>
    </main>
    <footer>
        <h4 class="titleFour">
            Eassy Assess
        </h4>
        <p>&copy; All rights are resived by 21cs036,21cs037,21cs041 </p>
    </footer>
    <?php
}
?>
</body>

</html>