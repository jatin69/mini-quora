<html>
    <head>
        <title>
            Answer a Question
        </title>
        <script src="Qvalidation.js"></script>
        <link  href="Qstyle.css" rel="stylesheet" type="text/css" >
    </head>
    <body>

        <h2 class="field">
            Answer this Question !!
        </h2>
        <h3 class="field">
            Question :
        </h3>
        <?php
session_start();
require 'Qconnect.php';
$ques_id = $_GET['q_id'];
$_SESSION["ques_id"] = $ques_id;
$sql = "SELECT * FROM quora.questions where q_id=$ques_id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo " <div  class='field'>" . $row["question"] . "</div>";
echo " <span class='field'> asked by - ";
$sql2 = "SELECT name FROM quora.users where user_id=$row[user_id_inherit]";
$result2 = $conn->query($sql2);

$value = mysqli_fetch_object($result2);
if ($value !== null) {
    echo "<strong>" . $value->name . "</strong>";
}
?>
        <br>


        <br>
        <?php
if (isset($_POST['view_all'])) {
    // fetching all replies
    $sql4 = "SELECT * FROM quora.answers where q_id_inherit=$ques_id";
    $result4 = mysqli_query($conn, $sql4);
    //$row4 = mysqli_fetch_assoc($result4);
    echo "<ul>";
    //if ($row4 < 1) {
    //    echo "Oops !! NO replies yet !!";
    //}
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $user = $row4["u_id_inherit"];
        $sql5 = "SELECT t1.name FROM quora.users t1 , quora.answers t2 where t1.user_id=$user";
        $result5 = $conn->query($sql5);
        $value2 = mysqli_fetch_object($result5);
        if ($value2 !== null) {
            echo "<li><strong>" . $value2->name . "</strong> :</li>";
        }
        echo "<div  class='field' >" . $row4["answer"] . "</div>";
        echo "<br>";
    }
    echo "</ul>";
} else {
    ?>
            <form  class="field" action="" method="post">
                <input type="submit" name="view_all" value="View all replies "></input>
            </form>
            <br>
            <?php
}
?>
        <h3  class="field">
            Answer :
        </h3>
        <form  class="field" action="addanswer.php" method="post"  name="answerform" onsubmit="return validateanswerform()">
            <div>
                <div>Type your answer</div>
                <input  class="field" type="text"  name="answerit" >
            </div>
            <br>
            <input type="submit" name="ans" value="answer NOW" >
        </form>

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
    </body>
</html>


