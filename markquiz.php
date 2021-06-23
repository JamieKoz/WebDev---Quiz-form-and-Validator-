

<?php
    require_once ('settings.php');
    require_once ('header.inc');
    require_once ('menu.inc');

    session_start();


    if(isset($_POST['studentname'])){
        $first_name = $_POST['studentname'];
        $first_name = sanitise_input($first_name);
    }
    if(isset($_POST['familyname'])){
        $last_name = $_POST['familyname'];
        $last_name = sanitise_input($last_name);
    }
    if(isset($_POST['studentid'])){
        $student_number = $_POST['studentid'];
        $student_number = sanitise_input($student_number);
    }

    $errMsg = "";
    if ($first_name == "") {
        $errMsg .= "<p>You must enter your first name.</p>";
    }else if (!preg_match("/^[a-zA-Z]*$/", $first_name)){
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }
    if ($last_name == "") {
        $errMsg .= "<p>You must enter your last name.</p>";
    }else if (!preg_match("/^[a-zA-Z-]*$/", $last_name)){
        $errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
    }
    if ($student_number == ""){
        $errMsg .= "<p>You must enter a student Id.</p>";
    }else if (!preg_match("/^[0-9]*$/", $student_number)){
        $errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
    }

    $answer1point = checkAnswer1();
    $answer2point = checkAnswer2();
    $answer3point = checkAnswer3();
    $answer4point = checkAnswer4();
    $answer5point = checkAnswer5();


    $score = $answer1point + $answer2point + $answer3point + $answer4point + $answer5point;

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
   
    if($conn){
        $sql_table = 'attempts';
        if(empty($result)) {
            $query = "CREATE TABLE attempts (
                attempt_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                date_and_time DATETIME NOT NULL,
                first_name VARCHAR(25) NOT NULL ,
                last_name VARCHAR(40) NOT NULL ,
                student_number VARCHAR(25) NOT NULL ,
                attempt_number INT NOT NULL DEFAULT 0 ,
                score INT NOT NULL )";
            $result = mysqli_query($conn, $query);
        } 

        // Check the number of attempts the student has made
        $check_query = "SELECT count(*) FROM attempts WHERE student_number = $student_number";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $check_query));
        $number_of_attempts =  $row["count(*)"] ;

        // if less than 3. allow making a new attempt.
        if($number_of_attempts <= 2) { // needs to be 2
            // allow attempt
            $attempt_number = $number_of_attempts + 1;
            $attempt_query = "INSERT INTO $sql_table(date_and_time, first_name, last_name, student_number, attempt_number, score) VALUES (NOW(),'$first_name', '$last_name', '$student_number', '$attempt_number', '$score')";
            mysqli_query($conn, $attempt_query);
            // show resit quiz button
            echo "<section>
            <nav id=menu>
                <a href='quiz.php'>
                    <p class='menu'>Resit Quiz</p>
                </a>
            </nav>
                </section>";
        }
        else if ($_POST['Q1']==NULL || $_POST['Q2']==NULL || $_POST['question4']==NULL || $_POST['selectanswer']==NULL ){
            // do something else.
        $_SESSION['error'] = "You need to enter answers.";
        header("location: quiz.php");
        // redirect back.
        }
        else if($score == 0){
            $_SESSION['error'] = "<p>You must score higher than 1 to pass the quiz.</p>";
            header("location: quiz.php");
        }else {
        $_SESSION['error'] = "You have exceeded your limit of attempts.";
        header("location: quiz.php");
        }


        $all_data_query = "SELECT * FROM attempts WHERE student_number = $student_number";
        $all_data_result  =  mysqli_query($conn, $all_data_query);
      
        if($all_data_result){
            echo "<table border=\"1\">\n";
            echo "<tr>\n"
            ."<th scope=\"col\">Date and Time</th>\n"
            ."<th scope=\"col\">Student Name</th>\n"
            ."<th scope=\"col\">Last Name</th>\n"
            ."<th scope=\"col\">Student ID</th>\n"
            ."<th scope=\"col\">Attempt</th>\n"
            ."<th scope=\"col\">Score</th>\n"
            ."</tr>\n";
            while($row = mysqli_fetch_assoc($all_data_result)){
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
            mysqli_free_result($all_data_result);
        }
        mysqli_close($conn);
    } 
    else{
        echo "<p>Failed connection to the Database</p>";
    }


    function checkAnswer1(){
        if(isset ($_POST['Q1'])){
            $user_answer = $_POST['Q1'];
            sanitise_input($user_answer);
            switch ($user_answer){
                case "screen reader":
                case "screen magnification software":
                case "alternative input device":
                case "head pointer":
                case "motion tracker":
                case "eye tracker":
                case "single switch entry device":
                case "speech input":
            return 1;
            }
        }
            return 0;
    }
    

    function checkAnswer2(){
        if(isset($_POST['Q2'])){
            $user_answer = $_POST['Q2'];
            if($user_answer == "W3C"){
            sanitise_input($user_answer);
            return 1;
            }
        }
        return 0;
    }

    function checkAnswer3(){
        $point_tally = 0;
       
        if (isset($_POST['Signposts'])){
        $point_tally += 1;
        }
        if (isset($_POST['Dynamic'])){
            $point_tally += 1;
        }
        if (isset($_POST['Controls'])){
            $point_tally += 1;
        }
        if (isset($_POST['Eka'])){
            $point_tally += 1;
        }
        if (!isset($_POST['userexperience'])){
            $point_tally += 1;
        }
        return $point_tally;
    }

    function checkAnswer4(){
        $user_answer = $_POST['question4'];
        sanitise_input($user_answer);
        if($user_answer == "1999")
        {
          return 1;
        }
        else{
            return 0;
        }
    }
    function checkAnswer5(){
        $user_answer = $_POST['selectanswer'];
        sanitise_input($user_answer);
        if($user_answer == "Screen Readers"){
            return 1;
        }else {
            return 0;
        }
    }



  

    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // if($_POST['Q1'] == ""){
    //     header("location: quiz.php");
 
    // }
    // if($_POST['Q2'] == ""){
    //     header("location: quiz.php");
   
    // }
    
    // if (!isset($_POST['Signposts']) && !isset($_POST['Dynamic']) && !isset($_POST['Controls']) && !isset($_POST['Eka']) && !isset($_POST['userexperience'])){
    //     header("location: quiz.php");
  
    // }
    // if($_POST['question4'] == ""){
    //     header("location: quiz.php");
   
    // }
    // if($_POST['selectanswer'] == ""){
    //     header("location: quiz.php");
    // }
    require_once ('footer.inc');
    
?>

