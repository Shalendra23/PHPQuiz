// countdown timer method , modified to display a countdown timer for the quiz to auto submit for grading when timer is up 

var seconds = 120;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60),
        remainingSeconds = seconds % 60;

    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }

    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    
    
    if (seconds < 90 && seconds >=30) {
      document.getElementById('countdown').style.color = "orange";
    }else if (seconds < 30) {
      document.getElementById('countdown').style.color = "red";
    }
    
//  var result =  " <?php echo $score ?> "; 

     if (seconds == 0) {
        clearInterval(countdownTimer);
       //quizform is your form name
        document.quizform.submitBtn.click();
       //document.forms.quizform.submit();
       } else {
        seconds--;
    }
   
}
var countdownTimer = setInterval('secondPassed()', 1000);

//used for the Restart quiz button after the Quiz review to send user back to main php page
function newDoc() {
document.location.href = "../index.php";
}

// function below to ensure that timer is visible when user scrolls thru the quiz

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var timer = document.getElementById("myTimer");

// Get the offset position of the navbar
var sticky = timer.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
if (window.pageYOffset > sticky) {
timer.classList.add("sticky");
} else {
timer.classList.remove("sticky");
}
}
