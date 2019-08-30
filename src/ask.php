<html>
    <head>
        <title>
            Ask any Question
        </title>
        <script src="Qvalidation.js"></script>
        <link  href="Qstyle.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <form action="addques.php" method="post"  name="askform" onsubmit="return validateaskform()">
            <div >
                <div class="field">
                    <h2>
                        Ask any Question , anytime
                    </h2>
                </div>
                <div class="field">
                    <div>Type your question</div>
                    <input class="field" type="text"  name="question" >
                </div>
                <div class="field">
                    <br>
                    <div>tags :</div>
                    <input type="checkbox" name="tags[]"  value="general">
                    general
                    <br>
                    <input type="checkbox" name="tags[]" value="tech">
                    tech
                    <br>
                    <input type="checkbox" name="tags[]" value="education">
                    Education
                    <br>
                    <input type="checkbox" name="tags[]" value="career">
                    career
                    <br>
                    <input type="checkbox" name="tags[]" value="sports">
                    sports
                    <br>
                    <input type="checkbox" name="tags[]" value="random">
                    random
                    <br>
                </div>
                <div  class="field">
                    <input type="submit" value="Ask Now" name="ask"></input>
                </div>

                <br>
                <hr>
                <a class="field" href="menu.php" style='text-decoration: none'>
                    Return to MENU
                </a>
                <br>
                <br>
                <a class="field" href="logout.php" style='text-decoration: none'>
                    Logout
                </a>
            </div>

        </form>
    </body>
</html>
