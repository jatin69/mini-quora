<html>
    <head>
        <title>
            Sign up
        </title>
        <script src="Qvalidation.js"></script>
        <link  href="Qstyle.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <form action="adduser.php" method="post"  name="signupform" onsubmit="return validatesignupform()" >
            <div id="signuphome">
                <div >
                    <h2>
                        Signup form
                    </h2>
                </div>
                <div class="field">
                    <div>Name</div>
                    <input type="text" name="name" onblur="validatename(document.signupform.name)">
                </div>
                <div class="field">
                    <div>Email</div>
                    <div><input type="text" name="email" onblur="validateEmail(document.signupform.email)" ></div>
                </div>
                <div class="field">
                    <div>password</div>
                    <div><input type="password" name="password"></div>
                </div>
                <div class="field">
                    <br>
                    <div>Interests :</div>
                    <input type="checkbox" name="interests[]"  value="general">
                    general
                    <br>
                    <input type="checkbox" name="interests[]" value="tech">
                    tech
                    <br>
                    <input type="checkbox" name="interests[]" value="education">
                    Education
                    <br>
                    <input type="checkbox" name="interests[]" value="career">
                    career
                    <br>
                    <input type="checkbox" name="interests[]" value="sports">
                    sports
                    <br>
                    <input type="checkbox" name="interests[]" value="random">
                    random
                    <br>
                </div>
                <br>
                <input type="submit" value="Sign Up" name="signup"></input>
                <br>
            </div>
        </form>
    </body>
</html>
