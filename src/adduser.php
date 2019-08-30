<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST["signup"])) {
    require 'Qconnect.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($_POST["interests"])) {
        $interests_all = $_POST["interests"];
    } else {
        $interests_all = array("None");
    }
    $interests = implode(' , ', $interests_all);

    $password = md5($password);
    // prepare and bind
    $sql = $conn->prepare("INSERT INTO `quora`.`users` (`name`, `email`, `password`, `interests`) VALUES (?,?,?,?)");
    $sql->bind_param("ssss", $name, $email, $password, $interests);

    // execute
    if ($sql->execute()) {
        echo "<div>";
        echo "signup successful !!";
        echo "<br><br>";
        echo "Now login through the home page to enter the website!!";
        echo "<br><br>Redirecting to Home page Now !!";
        echo "</div>";
        header("refresh:2;url=home.php");
    }
}
$conn->close();
