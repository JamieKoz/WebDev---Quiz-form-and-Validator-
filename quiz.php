<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Jamie Kozminska" />
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <script src="scripts/quiz.js"></script>
    <title>Quiz</title>
</head>
<?php 
// session_start();
// $_SESSION['unanswered_question'];
?>
<body class="page-background">

    <section>
        <h1>Web Accessibility Quiz</h1>

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
    <p>Time remaining:
        <span id="timer">60</span>
    </p>
    <?php
    if(isset($_SESSION['error'])) {
        echo "<p>ERROR IS ".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    }
    ?>

    <form id="quizForm" method="post" action="markquiz.php" >
        <fieldset>
            <legend>Student Details</legend>
            <label for="studentid">Student ID</label>
            <input type="text" name="studentid" id="studentid" placeholder="0000000" pattern="([0-9]{7,10})" required>
            <br />

            <label for="studentname">Given Name</label>
            <input type="text" name="studentname" id="studentname" placeholder="John" pattern="[a-zA-Z]+" required>
            <br />

            <label for="familyname">Family Name</label>
            <input type="text" name="familyname" id="familyname" placeholder="Smith" pattern="[a-zA-Z]+" required>
        </fieldset>
        <br>
        <br>
        <br>
        <fieldset>
            <legend>Question 1</legend>
            <p>Name a technology that assists in accessibility.</p>
            <label for="writtenanswer1">Answer:</label>
            <input type="text" name="Q1" id="writtenanswer1" placeholder="Answer" pattern="[A-Za-z\s]+$" required>
        </fieldset>
        <br>
        <fieldset id="question2">
            <legend>Question 2</legend>
            <p>Who is responsible for managing the guidelines of Web accessibility?</p>
            <label for="WAIARIA">WAI-ARIA?</label>
            <input type="radio" value="WAIARIA" name="Q2" id="WAIARIA" required>
            <label for="W3C">W3C</label>
            <input type="radio" name="Q2" value="W3C" id="W3C" required>
            <label for="W3A">W3A</label>
            <input type="radio" name="Q2" value="W3A" id="W3A" required>
        </fieldset>
        <br>

        
        <fieldset id="question3">
            <legend>Question 3</legend>
            <p>When should you use WAI-ARIA?</p>
            <p>Select one or more correct answers (multiple):</p>

            <label for="signposts">Signposts/Landmarks<input type="checkbox" name="Signposts" id="signposts"></label>
            <br>
            <label for="dynamic">Dynamic content updates</label>
            <input type="checkbox" name="Dynamic" id="dynamic">
            <label for="eka">Enhancing Keyboard accessibility</label>
            <input type="checkbox" name="Eka" id="eka">
            <br>
            <label for="controls">Accessibility of non-semantic controls</label>
            <input type="checkbox" name="Controls" id="controls">
            <label for="userexperience">User Experience</label>
            <input type="checkbox" name="userexperience" id="userexperience">
        </fieldset>
        <br>
        <fieldset>
            <legend>Question 4</legend>
            <p>What year was the WCAG 1.0 released?</p>
            <label for="question4">Year:<input type="number" id="question4" name="question4" min="1995" max="2002">
            </label>

        </fieldset>
        <br>
        <fieldset>
            <legend>Question 5</legend>
            <p>Which web accessible technology aids the visually impaired?</p>
            <label for="selectanswer">Answer:</label>
            <select name="selectanswer" id="selectanswer">
                <option value="" id="null">Please Select</option>
                <option value="Mouse">Mouse</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Head Pointer">Head Pointer</option>
                <option value="Screen Readers" id="screenreader">Screen Readers</option>
            </select>
        </fieldset>
        <div class="button-container">
            <button type="submit">Submit</button>
            <button type="reset">Reset Quiz</button>
        </div>

    </form>
    <footer id="topicfooter">
        <a href="mailto:101114436@student.swin.edu.au">Email student: 101114436</a>
    </footer>
</body>

</html>



<!-- // if($_POST['Q1'] == NULL){
  
//     echo "<p>You must enter an answer for Question 1.</p>";
// }
// if($_POST['Q2'] == NULL){
 
//     echo "<p>You must enter an answer for Question 2.</p>";
// }

// if ($_POST['Signposts']==NULL && $_POST['Dynamic']==NULL && $_POST['Controls']==NULL && $_POST['Eka']==NULL && $_POST['userexperience']==NULL){

//     echo "<p>You must enter an answer for Question 3.</p>";
// }
// if($_POST['question4'] == NULL){
  
//     echo "<p>You must enter an answer for Question 4.</p>";
// }
// if($_POST['selectanswer'] == NULL){

//     echo "<p>You must enter an answer for Question 5.</p>";
// } -->
