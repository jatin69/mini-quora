<?php

session_start();

if (isset($_POST["ask"])) {
    require 'Qconnect.php';

    $question = $_POST["question"];
    echo $question;
    if (isset($_POST["tags"])) {
        $tags_all = $_POST["tags"];
    } else {
        $tags_all = array("None");
    }
    $tags = implode(' , ', $tags_all);

    //initially no of replies is zero
    $no_of_replies = 0;

    // prepare and bind
    $sql = $conn->prepare("INSERT INTO `quora`.`questions` (`user_id_inherit`, `tags`, `question`, `no_of_replies`) VALUES (?,?,?,?)");
    if ($sql === false) {
        die("Mysql Error: " . $conn->error);
    }
    $sql->bind_param("ssss", $_SESSION["u_id"], $tags, $question, $no_of_replies);
    // execute
    // execute
    if ($sql->execute()) {
        echo "<div>";
        echo "<br>Question added !!";
        echo "<br><br>Redirecting to MENU Now !!";
        echo "</div>";
        header("refresh:2;url=menu.php");
    }
}
$conn->close();
