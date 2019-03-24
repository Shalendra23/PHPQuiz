<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP 20 Question Quiz - CodeSpace Project</title>

 
</head>
<body> <!--onclick="printID(this.name);"-->

<!-- 
Copyright 2019 Shalendra Singh

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 
-->
<div class="timer" id="myTimer">
    Time Remaining to complete the Quiz : 
        <time id="countdown">5:00</time>
</div>

<div class="heading" id="myHeading">
    <h1> Welcome to my PHP Quiz , I hope you enjoy it and 'Ace the Test'</h1>
</div>

<img name="quizImage" id="imageid">

<form name="quizform" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<?php

// the 2d array taht contains the questions , options and choices for the quiz

$questions=array(array('What is 1+0?', '1', '2', '3', '4', '1'),
                array('What is 1+1?', '1', '2', '3', '4', '2'),
                array('What is 1+2?', '1', '2', '3', '4', '3'),  
                array('What is 1+3?', '1', '2', '3', '4', '4'));

$score = 0;                


               for($row=0; $row<count($questions); $row++){
                echo "<h2>".$questions[$row][0]."</h2>"; // displays the questions form the 2d array called questions
                  for($colum=1; $colum<(count($questions[0]))-1; $colum++){
                        $ques = $questions[$row][$colum];
                        echo '<span><input type="radio" value="'.$questions[$row][$colum].'" name="btn_'.$row.'" id="btn_'.$row.$colum.'">'.$ques.'</input></span>'; // creates the answer buttons for the questiosn

                        
                        // if ($colum % 2 == 0) // displays ony 2 buttons per line
                        echo "<br />";
                  
                                           
                    }

                    if(isset($_POST["btn_".$row])){
                        $choice = $_POST["btn_".$row];
                    }
                    else{
                        $choice = NULL;
                    }

                  $answer = $questions[$row][5];
               
                          if ($choice != NULL){
                        if ($choice != $answer)
                        {
                           echo "<input size='50' value='Incorret, the correct answer is $choice' style='background-color: red;'>";
                        }else{
                            $score++;
                            echo "<input size='50' value='Correct $choice was the correct answer' style='background-color: green;'>";
                        }
                    }else{
                            echo "<input size='50' value='No Answer Selected' style='background-color: gray;'>";
                    
                            
                    }  

                 }

                        // calls calcScore function on click of the submit for grading function

                        
 
                 if(isset($_POST["submitBtn"])){
                    calcScore($score);
                }

                // calcSore Function thats takes the accumulated score variable and uses a switch statment to grade the quiz taker & display the approiate message

                 function calcScore($score){


                    switch ($score) {
                        case ($score < 10): {
                            $message = "Try Harder Next Time : " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                            break;
                        case ($score >= 10 && $score <= 15):
                        {
                            $message = "Good Job , Try Harder to get a A+ : " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                   
                            break;
                        case ($score >= 16 ):
                        {
                            $message = "Awesome Job - A+ Score : " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                           break;
                        case ($score == 4 ):
                        {
                            $message = "Perfect Score : " . $score;
                            echo '<img src="images/perfectscore.gif"/>';
                        }
                            break;
                        default:
                            echo "Error , please retry quiz";
                    }
                    }
                 
            
?>
       <p><input type="submit" name="submitBtn" value="Submit for Grading"></p>

</form>
 <script>

// countdown timer method , modified to display a countdown timer for the quiz to auto submit for grading when timer is up 

  var seconds = 300;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          
          
          if (seconds < 120 && seconds >=60) {
            document.getElementById('countdown').style.color = "orange";
          }else if (seconds < 60) {
            document.getElementById('countdown').style.color = "red";
          }
          
        var result =  " <?php echo $score ?> "; 

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

    //  alert('Time Up , your score is :' + result + '');
 
//used for geting the ID of any element clicked on page , was used for building the solution, to be removed
function printID(e)
{
    e = e || window.event;
    e = e.target || e.srcElement;
    console.log("Name: " + e.name); 
}


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

 </script>

</body>
</html>