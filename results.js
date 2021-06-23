
"use strict";
function init() {
    var totalScore = localStorage.getItem('score');
    var studentid = localStorage.getItem('studentid');
    var q1result = localStorage.getItem('q1Point');
    var q2result = localStorage.getItem('q2Point');
    var q3result = localStorage.getItem('q3Point');
    var q4result = localStorage.getItem('q4Point');
    var q5result = localStorage.getItem('q5Point');
    var userattempts = localStorage.getItem('attempt-' + studentid);

    if (totalScore != null) {
        document.getElementById('totalscore').innerHTML = totalScore;
    }

    document.getElementById('studentidresult').innerHTML += studentid;
    document.getElementById('q1result').innerHTML = q1result;
    document.getElementById('q2result').innerHTML = q2result;
    document.getElementById('q3result').innerHTML = q3result;
    document.getElementById('q4result').innerHTML = q4result;
    document.getElementById('q5result').innerHTML = q5result;
    document.getElementById('userattempts').innerHTML += userattempts;
}


window.onload = init;