

<?php 
// session_start();
// $_SESSION['unanswered_question'];
require_once ('header.inc');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Jamie Kozminska" />
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <title>assignment3</title>
</head>
<body class="page-background">

<section>
    <h1>Web Accessibility Quiz Supervisor</h1>

    <nav id=menu>
    <a href="index.php">
        <p class="menu">Home</p>
    </a>

    <a href="topic.php">
        <p class="menu">Topic Information</p>
    </a>

    <a href="quiz.php">
        <p class="menu">Quiz</p>
    </a>
    <a href="phpenhancements.php">
        <p class="menu">PHP Enhancements</p>
    </a>
    <a href="manage.php">
        <p class="menu">Supervisor</p>
    </a>
    </nav>
</section>

<form action="manage.php" method="post">
    <p>What you would like to query:</p>
    <label for="displayall">Check to Display all</label>
    <input type="checkbox" name="displayall" id="displayall">
    <br/>
    <br/>
    <label for="attemptsbystudentid">List all attempts by student ID:</label>
    <input type="text" name="attemptsbystudentid" placeholder="101114436" pattern="([0-9]{7,10})" id="attemptsbystudentid">
    <br/>
    <br/>
    <label for="correct_answersfirst_attempt">Check to list all students with 100% first attempt</label>
    <input type="checkbox" name="correct_answersfirst_attempt" id="correct_answersfirst_attempt">
    <br/>
    <br/>
    <label for="answers_third_attempt">List all students with less than 50% on their third attempt</label>
    <input type="checkbox" name="answers_third_attempt" id="answers_third_attempt">
    <br/>
    <br/>
    <label for="deleteattempts">Enter student ID to clear attempts:</label>
    <input type="text" id="deleteattempts" name="deleteattempts" placeholder="101114436" pattern="([0-9]{7,10})">
    <br/>
    <br/>
    <label for="changescorestudent">Enter student ID</label>
    <input type="text" name="changescorestudent" placeholder="101114436" pattern="([0-9]{7,10})" id="changescorestudent">
    <br/>
    <label for="changescore">Enter student new score</label>
    <input type="text" name="changescore" placeholder="1-9" pattern="([0-9])" id="changescore">

  

    <div class="button-container">
        <button type="submit">Submit</button>
    </div>
</form>

<?php
    require_once ('settings.php');
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if($conn){
        $sql_table = 'attempts';

        if(isset($_POST['displayall'])){
            $display_all_query = "SELECT * FROM attempts";
            $display_all_result = mysqli_query($conn, $display_all_query);

            if($display_all_result){
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                ."<th scope=\"col\">Date and Time</th>\n"
                ."<th scope=\"col\">Student Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">Attempt</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."</tr>\n";
                while($row = mysqli_fetch_assoc($display_all_result)){
                    echo "<tr>\n ";
                    echo "<td>", $row["date_and_time"],"</td>\n";     
                    echo "<td>", $row["first_name"],"</td>\n";            
                    echo "<td>", $row["last_name"],"</td>\n";  
                    echo "<td>", $row["student_number"],"</td>\n";            
                    echo "<td>", $row["attempt_number"],"</td>\n";            
                    echo "<td>", $row["score"],"</td>\n";            
                    echo "</tr>\n ";
                }
                echo "<table>\n";
            }
            mysqli_free_result($display_all_result);

        }
        if(isset($_POST['attemptsbystudentid'])){
            $entered_id = $_POST['attemptsbystudentid'];
            sanitise_input($entered_id);
            $attempts_by_studentid_query = "SELECT * FROM attempts WHERE student_number = $entered_id";
            $attempts_by_studentid_result  =  mysqli_query($conn, $attempts_by_studentid_query);
            if($attempts_by_studentid_result){
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                ."<th scope=\"col\">Date and Time</th>\n"
                ."<th scope=\"col\">Student Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">Attempt</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."</tr>\n";
                while($row = mysqli_fetch_assoc($attempts_by_studentid_result)){
                    echo "<tr>\n ";
                    echo "<td>", $row["date_and_time"],"</td>\n";     
                    echo "<td>", $row["first_name"],"</td>\n";            
                    echo "<td>", $row["last_name"],"</td>\n";  
                    echo "<td>", $row["student_number"],"</td>\n";            
                    echo "<td>", $row["attempt_number"],"</td>\n";            
                    echo "<td>", $row["score"],"</td>\n";            
                    echo "</tr>\n ";
                }
                echo "<table>\n";
            }
            // mysqli_free_result($attempts_by_studentid_result);
        }

        if(isset($_POST['correct_answersfirst_attempt'])){
            $part3_studentid_query = "SELECT date_and_time, first_name, last_name, student_number, attempt_number, score FROM attempts WHERE score = 9 AND attempt_number = 1";
            $part3_studentid_result  =  mysqli_query($conn, $part3_studentid_query);
            if($part3_studentid_result){
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                ."<th scope=\"col\">Date and Time</th>\n"
                ."<th scope=\"col\">Student Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">Attempt</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."</tr>\n";
                while($row = mysqli_fetch_assoc($part3_studentid_result)){
                    echo "<tr>\n ";
                    echo "<td>", $row["date_and_time"],"</td>\n";     
                    echo "<td>", $row["first_name"],"</td>\n";            
                    echo "<td>", $row["last_name"],"</td>\n";  
                    echo "<td>", $row["student_number"],"</td>\n";            
                    echo "<td>", $row["attempt_number"],"</td>\n";            
                    echo "<td>", $row["score"],"</td>\n";            
                    echo "</tr>\n ";
                }
                echo "<table>\n";
            }
            // mysqli_free_result($part3_studentid_result);
        }
        if(isset($_POST['answers_third_attempt'])){
            $part4_studentid_query = "SELECT date_and_time, first_name, last_name, student_number, attempt_number, score FROM attempts WHERE score <= 5 AND  attempt_number = 3";
            $part4_studentid_result  =  mysqli_query($conn, $part4_studentid_query);
            if($part4_studentid_result){
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                ."<th scope=\"col\">Date and Time</th>\n"
                ."<th scope=\"col\">Student Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">Attempt</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."</tr>\n";
                while($row = mysqli_fetch_assoc($part4_studentid_result)){
                    echo "<tr>\n ";
                    echo "<td>", $row["date_and_time"],"</td>\n";     
                    echo "<td>", $row["first_name"],"</td>\n";            
                    echo "<td>", $row["last_name"],"</td>\n";  
                    echo "<td>", $row["student_number"],"</td>\n";            
                    echo "<td>", $row["attempt_number"],"</td>\n";            
                    echo "<td>", $row["score"],"</td>\n";            
                    echo "</tr>\n ";
                }
                echo "<table>\n";
            }
            // mysqli_free_result($part4_studentid_result);
        }
        

        if(isset($_POST['deleteattempts']) && $_POST['deleteattempts'] != ""){
            $selected_to_clear = $_POST['deleteattempts'];
            sanitise_input($selected_to_clear);
            $deleteattempts_query = "DELETE FROM attempts WHERE student_number = $selected_to_clear"; 
            $deleteattempts_result = mysqli_query($conn, $deleteattempts_query);
            echo '<p>All attempts for this student id have been removed.</p>';
        }
     

        if(isset($_POST['changescorestudent'] )){
            $selected_student = $_POST['changescorestudent'];
            sanitise_input($selected_student);
            if($_POST['changescore'] != ""){
                $new_score = $_POST['changescore'];
                sanitise_input($new_score);
                $last_attempt_query = "SELECT attempt_id FROM attempts WHERE student_number = $selected_student ORDER BY date_and_time DESC LIMIT 1";
                $attempt_id_result = mysqli_query($conn, $last_attempt_query);
                $row = mysqli_fetch_assoc($attempt_id_result);
                $attempt_id = $row['attempt_id'];
                $change_score_query = "UPDATE attempts SET score = $new_score WHERE attempt_id = $attempt_id";
                // $change_score_query = "UPDATE attempts SET score = $new_score HAVING student_number = $selected_student AND attempt_id = SELECT max(attempt_id) ORDER BY attempt_id DESC LIMIT 1";

                $changescore_result = mysqli_query($conn, $change_score_query);
                echo "<p>Students score has succesfully been updated</p>";
            }
        }
       

        mysqli_close($conn);
    }else{
        echo "<p>Failed connection to the Database</p>";
    }



    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <footer id="indexfooter">
        <a href="mailto:101114436@student.swin.edu.au" class="indexfooter">Email student: 101114436</a>
    </footer>
</body>
</html>
