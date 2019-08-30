<html>
    <head>
        <title>
            Questions
        </title>
        <script src="Qvalidation.js"></script>
        <link  href="Qstyle.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <h2 class="field">
            Questions !!
        </h2>

        <?php
        require 'Qconnect.php';
        session_start();
        $sql = "SELECT * FROM quora.questions ORDER BY q_id DESC";
        $result = $conn->query($sql);
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            $sql2 = "SELECT name FROM quora.users where user_id=$row[user_id_inherit]  ";
            $result2 = $conn->query($sql2);

            $value = mysqli_fetch_object($result2);
            if ($value !== NULL) {
                echo "<li><strong>" . $value->name . "</strong> :</li> ";
            }
            /* we know that the form GET method is used to transmit data via URL
             * so here , we are passing 'u_id' & we determine its actual value by the query we just solved
             * THE ONLY PROBLEM IS : A RISK OF SQL INJECTION
             * because the id element of the URL makes our databse vulnerable
             * as changing just the id values could fetch the whole databse , one by one
             */
            echo '<form method="get" action="">';
            echo " " . $row["question"] . "";
            echo "<div>";
            echo "" . $row['no_of_replies'] . " replies till now , ";
            echo "<a href='expandques.php?q_id={$row["q_id"]}'  style='text-decoration: none'> Answer it NOW !! </a>";
            echo "</div>";
            echo "<br>";
            echo '</form>';
        }
        echo "</ul>";

        $conn->close();
        ?>
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
