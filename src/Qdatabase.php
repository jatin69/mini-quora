<?php

require_once 'Qconnect.php';
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Quora";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database created successfully";
} else {
    echo "Database creation failed: (" . $conn->errno . ") " . $conn->error;
}
// switch to database
if (mysqli_select_db($conn, "quora")) {
    echo "<br>Switching to Quora database";
}

//create required tables
$create_users = "CREATE TABLE IF NOT EXISTS `quora`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `interests` VARCHAR(250) NULL  ,
  PRIMARY KEY (`user_id`)  ,
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC)
)";

if (!$conn->query($create_users)) {
    echo "<br>Table creation failed: (" . $conn->errno . ") " . $conn->error;
} else {
    echo "<br>users created successfully";
}

$create_questions = "CREATE TABLE IF NOT EXISTS `quora`.`questions` (
  `q_id` INT NOT NULL AUTO_INCREMENT ,
  `user_id_inherit` INT NOT NULL ,
  `tags` VARCHAR(45) NOT NULL ,
  `question` VARCHAR(1100) NOT NULL ,
  `no_of_replies` INT NULL,
  PRIMARY KEY (`q_id`),
  UNIQUE INDEX `q_id_UNIQUE` (`q_id` ASC)
)";

if (!$conn->query($create_questions)) {
    echo "<br>Table creation failed: (" . $conn->errno . ") " . $conn->error;
} else {
    echo "<br>Questions created successfully";
}

$create_answers = "CREATE TABLE IF NOT EXISTS `quora`.`answers` (
  `a_id` INT NOT NULL AUTO_INCREMENT,
  `q_id_inherit` INT NOT NULL ,
  `u_id_inherit` INT NOT NULL ,
  `answer` VARCHAR(1100) NOT NULL ,
  PRIMARY KEY (`a_id`) ,
  UNIQUE INDEX `a_id_UNIQUE` (`a_id` ASC)
)";

if (!$conn->query($create_answers)) {
    echo "<br>Table creation failed: (" . $conn->errno . ") " . $conn->error;
} else {
    echo "<br>Answers created successfully";
}

$conn->close();

echo "<br><br>successful<br>";
