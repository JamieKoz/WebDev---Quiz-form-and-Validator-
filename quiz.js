/**
 * Author : Jamie Kozminska ID 101114436
 * Target : 
 * Purpose : This file is for assign2 task
 * Created : 18/9/2020
 * Last updated : 
 * Credits : 
 */

"use strict";


var wrongAnswerMsg = "";

function validate(event) {
    if (!validateUserDetails()) {
        return;
    }

    if (!makeAttempt(document.getElementById("studentid").value)) {
        event.preventDefault();
        return;
    }

    var answer1Point = checkAnswer1();
    var answer2Point = checkAnswer2();
    var answer3Point = checkAnswer3();
    var answer4Point = checkAnswer4();
    var answer5Point = checkAnswer5();
    const total = answer1Point + answer2Point + answer3Point + answer4Point + answer5Point;

    if (wrongAnswerMsg != "") {
        alert(wrongAnswerMsg + "\n");
    }

    localStorage.setItem('score', total);
    localStorage.setItem('q1Point', answer1Point);
    localStorage.setItem('q2Point', answer2Point);
    localStorage.setItem('q3Point', answer3Point);
    localStorage.setItem('q4Point', answer4Point);
    localStorage.setItem('q5Point', answer5Point);


    console.log('LocalStorage score is', localStorage.getItem("score"));
    console.log('Wrong answer message is', wrongAnswerMsg);

    if (localStorage.getItem("score") > 0 && wrongAnswerMsg == "") {
        // location.href = "./result.html";
    } else {
        alert("You need to score higher than 1 to receive any results in this quiz.\n")
        event.preventDefault();
        return;
    }
}

function validateUserDetails() {
    var studentid = document.getElementById("studentid").value;
    var studentname = document.getElementById("studentname").value;
    var familyname = document.getElementById("familyname").value;
    localStorage.setItem('studentid', studentid)
    var isValid = true;
    var error = ""
    if (!studentname.match(/^[a-zA-Z]+$/)) {
        error = error + "Your first name must only contain alpha characters\n";
        isValid = false;
    }

    if (!familyname.match(/^[a-zA-Z._-]+$/)) {
        error = error + "Your last name must only contain alpha characters or hyphens\n";
        isValid = false;
    }
    if (!studentid.match(/^[a-z0-9]+$/i)) {
        error = error + "Your studentid must only contain alpha-numeric characters\n";
        isValid = false;
    }

    if (error != "") {
        alert(error);
        return isValid;
    }
    return isValid;
}


function checkAnswer1() {
    var answer1 = document.getElementById("writtenanswer1").value.toLowerCase();
    //all falling through if correct and then returning to caller 
    //if incorrect answer will return to 0
    switch (answer1) {
        case "screen reader":
        case "screen magnification software":
        case "alternative input device":
        case "head pointer":
        case "motion tracker":
        case "eye tracker":
        case "single switch entry device":
        case "speech input":
            return 1
    }
    // wrongAnswerMsg += "Answer 1 Incorrect\n";
    return 0;
}


function checkAnswer2() {
    var radioArray = Array.from(document.getElementById("question2").getElementsByTagName("input"));

    const answerRadio = radioArray.find(radio => radio.checked);

    if (answerRadio && answerRadio.id === "W3C") {
        // It's correct
        return 1;

    }
    else {
        //     /// It's either not set or incorrect.
        // wrongAnswerMsg += "Answer 2 Incorrect\n";
        return 0;
    }
}

function checkAnswer3() {
    //creating an array from the HTML collection of checked answers, and comparing them with the correct answer map
    //this is done by calling the filter method. 
    //even though user experience checkbox should be unchecked, selecting no answers at all will error.
    const totalPossibleScore = 5;
    const correctAnswerMap = {
        'signposts': true,
        'dynamic': true,
        'eka': true,
        'controls': true,
        'userexperience': false,
    }

    var correctAnswers = Object.keys(correctAnswerMap)
        .filter(id => document.getElementById(id).checked === correctAnswerMap[id]);

    var checkedAnswers = Object.keys(correctAnswerMap)
        .filter(id => document.getElementById(id).checked);

    var answer3Point = correctAnswers.length * (Object.keys(correctAnswerMap).length) / totalPossibleScore;


    if (checkedAnswers.length == 0) {
        wrongAnswerMsg += "You must select at least one answer for Question 3.\n"
    }
    return answer3Point;
}

//simple comparison to the string of the correct answer
function checkAnswer4() {
    var answer4Point = 0;
    if (document.getElementById("question4").value == "1999") {
        answer4Point = 1;
    }
    else if (document.getElementById("question4").value == "") {
        wrongAnswerMsg += "Please select an option for Question 4\n";
    }
    return answer4Point;
}

function checkAnswer5() {
    var answer5Point = 0;
    if (document.getElementById("selectanswer").value == "Screen Reader") {
        answer5Point = 1;
    }
    else if (document.getElementById("selectanswer").value == "") {
        wrongAnswerMsg += "Please select an Answer for Question 5\n";
    }
    return answer5Point;
}

// trying to set attempts to 0 and put that into local storage. Then when reattempting quiz to get attempts from local storage and increment by 1
// i want to check attempts before seeing to set to 0 the first time.
function makeAttempt(studentid) {
    //attempts are different for all student id's, storing their id appended onto attempt-
    var haventHitLimit = attemptChecker(studentid);
    var attemptKey = "attempt-" + studentid;
    //if the attempt key returns null
    if (haventHitLimit) {
        var currentAttempts = localStorage.getItem(attemptKey) ? localStorage.getItem(attemptKey) : 0;
        currentAttempts++;
        localStorage.setItem(attemptKey, currentAttempts);
        return true;
    } else {
        // DO the alert.
        wrongAnswerMsg += alert("You have exceeded your limit of attempts");
        return false;
    }
}

// Takes a student id to check for attempt as a parameter.
// Returns true if under the attempt limit. Otherwise returns false if hit the limit.
function attemptChecker(studentId) {
    const LIMIT = 3;
    var attemptKey = "attempt-" + studentId;


    var attempts = localStorage.getItem(attemptKey);

    if (attempts && attempts >= LIMIT) {
        return false;
    }
    return true;
}
//setInterval method needs a method for it to perform, and a number. This is set to 1000ms or 1second
//Every one second it will perform the method, which is putting the newly decremented number in the DOM.
var counter = 60;
var interval = setInterval(() => {
    if (counter === 0) {
        document.getElementById("timer").innerHTML = "Time Limit Reached!";
        wrongAnswerMsg += 'You have exceeded the time limit to finish this quiz\n';
        clearInterval(interval);
    }

    document.getElementById("timer").innerHTML = counter;
    counter--;
}, 1000)


function init() {
    var quizForm = document.getElementById("quizForm");// get ref to the HTML element
    // quizForm.onsubmit = validate;

    // quizForm.onsubmit = (event) => {

    //     validate(event);
    // };
};

//    //register the event listener     
window.onload = init;
