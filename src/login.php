<html>
    <head>
        <title>
            Login
        </title>
        <script src="Qvalidation.js"></script>
        <link  href="Qstyle.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <form action="session.php" method="post"  name="loginform" onsubmit="return validateloginform()">
            <div id="signuphome">

                <h2 >
                    Login with me
                </h2>
                <div class="field">
                    <div>Email</div>
                    <div><input type="text" name="email" onblur="validateEmail(document.loginform.email)" ></div>
                </div>
                <div class="field">
                    <div>password</div>
                    <div><input type="password" name="password"></div>
                </div>
                <br>
                <div class="field">
                    <input  type="submit" value="LOGIN" name="login"></input>
                </div>
            </div>
        </form>
    </body>
</html>
