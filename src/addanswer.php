<?php

session_start();
if (isset($_POST["ans"])) {
    require 'Qconnect.php';
    $answer = $_POST["answerit"];
    echo "<strong> Your answer is : </strong><br>";
    echo $answer;

    //var_dump($sql);
    //echo $_SESSION["ques_id"];
    //echo $_SESSION["u_id"];
    // prepare and bind
    $sql = $conn->prepare("INSERT INTO `quora`.`answers` (`q_id_inherit`,`u_id_inherit`,`answer`) VALUES (?,?,?)");
    if ($sql === false) {
        die("Mysql Error: " . $conn->error);
    }
    $sql->bind_param("iis", $_SESSION["ques_id"], $_SESSION["u_id"], $answer);
    // execute
    if ($sql->execute()) {

        // +1 the no of replies by using q_id
        $sql = "UPDATE quora.questions t1, quora.answers t2
    SET t1.no_of_replies = t1.no_of_replies + 1
    WHERE
    t1.q_id = '" . $_SESSION["ques_id"] . "'";
        if ($conn->query($sql) === false) {
            echo die("Mysql Error: " . $conn->error);
        } else {
            echo "<div>";
            echo "<br>Answer added !!";
            echo "<br><br>Redirecting to MENU Now !!";
            echo "</div>";
            header("refresh:1.5;url=menu.php");
        }
    }
}
