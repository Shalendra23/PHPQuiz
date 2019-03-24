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

<?php
    if(isset($_POST['userName'])){
        $userName = $_POST['userName'];
        echo "<h1> Welcome $userName to your PHP Quiz , I hope you enjoy it and 'Ace the Test'</h1>";
        } else {
            echo "<h1> Welcome to your PHP Quiz , I hope you enjoy it and 'Ace the Test'</h1>";}
?>

<div class="timer" id="myTimer">
    Time Remaining to complete the Quiz : 
        <time id="countdown">5:00</time>
</div>

<img name="quizImage" class="center" id="imageid" src="/images/PHP-Quiz.png" onclick="changeImg();">

<form name="quizform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 

<?php
// the 2d array taht contains the questions , options and choices for the quiz
$questions=array(array('1. From which language is the word ‘ketchup’ derived?', 'Chinese', '2', '3', '4', 'Chinese'),
                array('2. Which is the country with the biggest population in Europe?', '1', 'Russia', '3', '4', 'Russia'),
                array('3. Who portrayed Edward Scissorhands?', '1', '2', 'Johnny Depp', '4', 'Johnny Depp'),  
                array('4. What are made and repaired by a cobbler?', '1', '2', '3', 'Shoes', 'Shoes'),
                array('5. What is an endoscope used to examine?', 'The inside of the body', '2', '3', '4', 'The inside of the body'),

                array('6. Apart from womanizing and producing films, what was the other passion of Howard Hughes?', '1', 'Aviation', '3', '4', 'Aviation'),
                array('7. What colour are the four stars on the flag of New Zealand?', '1', '2', 'Red', '4', 'Red'),
                array('8. How many states make up the United States of America?', '50 states', '2', '3', '4', '50 states'),  
                array('9. Which English football team plays its home matches at Old Trafford?', '1', 'Manchester United', '3', '4', 'Manchester United'),
                array('10. Mr. Carson is the name of the butler in which popular TV costume drama?', '1', '2', '3', 'Downton Abbey', 'Downton Abbey'),

                array('11. Comedy duo Ant and Dec are originally from which English city?', 'Newcastle upon Tyne', '2', '3', '4', 'Newcastle upon Tyne'),
                array('12. In the medical profession, what do the initials ‘GP’ stand for?', '1', 'General practitioner', '3', '4', 'General practitioner'),
                array('13. Which German football team won the Champions League in 2013?', '1', '2', 'Bayern Munich', '4', 'Bayern Munich'),  
                array('14. Maris Piper and King Edward are varieties of what?', 'Potato', '2', '3', '4', 'Potato'),
                array('15. H2O is the chemical formula for what?', '1', '2', '3', 'Water', 'Water'),

                array('16.Which English king married six times?', '1', 'Henry VIII', '3', '4', 'Henry VIII'),
                array('17. Whom did David Cameron succeed as the British prime minister?', '1', '2', 'Gordon Brown', '4', 'Gordon Brown'),
                array('18. Blandenburg, Bremen and Lower Saxony are states in which European country?', '1', 'Germany', '3', '4', 'Germany'),  
                array('19. Complete the title of the play by Shakespeare – ‘The Merchant of …’?', '1', '2', '3', 'Venice', 'Venice'),
                array('20. By what name is the TV adventurer Edward Michael Grylls more commonly known?', '1', 'Bear Grylls', '3', '4', 'Bear Grylls'));

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
                           echo "<input size='50' value='Incorret, the correct answer is $answer' style='background-color: red;'>";
                        }else{
                            $score++;
                            echo "<input size='50' value='Correct $answer the correct answer' style='background-color: green;'>";
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


                    switch (true) {
                        case ($score == 0):
                        {
                            $message = " You got a Zero score :( " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            echo "<script type='text/javascript'>document.getElementById('imageid').src = 'images/zeroscore.gif'</script>";
                            echo "<script type='text/javascript'>document.getElementById('countdown').style.display = 'none';</script>";
                        }
                            break;
                        case ($score >= 1 && $score < 10 ): {
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
                        case ($score >= 16 && $score < 20):
                        {
                            $message = "Awesome Job - A+ Score : " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                 
                        }
                           break;
                        case ($score == 20 ):
                        {
                            $message = "Perfect Score : " . $score;
                            echo "<script type='text/javascript'>alert('$message');</script>";
                         echo "<script type='text/javascript'>document.getElementById('imageid').src = 'images/perfectscore.gif'</script>";
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