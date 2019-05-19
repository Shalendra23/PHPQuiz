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

<!-- takes the username from index.php and displays in this quiz -->
<?php
    if(isset($_POST['userName'])){
        $userName = $_POST['userName'];
        echo "<h1 id='heading'> Welcome $userName to your PHP Quiz , I hope you enjoy it and 'Ace the Test' ps. tick tok</h1>";
        } else {
            echo "<h1 id='heading'> Welcome to your PHP Quiz , I hope you enjoy it and 'Ace the Test' ps. tick tok</h1>";}
?>

    <div class="timer" id="myTimer">
        Time Remaining to complete the Quiz : 
            <time id="countdown">2:00</time>
    </div>

    <img name="quizImage" class="center" id="imageid" src="/images/PHP-Quiz.png">

    <!-- Main form for the quiz that sumbits to itsself to calculate the score -->

    <form name="quizform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> <!-- add in html special chars-->

<?php
    // the 2d array taht contains the questions , options and choices for the quiz
    $questions=array(array('1. From which language is the word ‘ketchup’ derived?', 'Chinese', 'English', 'German', 'Italian', 'Chinese'),
                    array('2. Which is the country with the biggest population in Europe?', 'England', 'Russia', 'Spain', 'Iceland', 'Russia'),
                    array('3. Who portrayed Edward Scissorhands?', 'George Clooney', 'Tom Cruise', 'Johnny Depp', 'Robert Downey Jr', 'Johnny Depp'),  
                    array('4. What are made and repaired by a cobbler?', 'Cobbles', 'Hats', 'Bridges', 'Shoes', 'Shoes'),
                    array('5. What is an endoscope used to examine?', 'The inside of the body', 'The outside of the body', 'Drain Pipes', 'The weather', 'The inside of the body'),

                    array('6. Apart from womanizing and producing films, what was the other passion of Howard Hughes?', 'Sleeping', 'Aviation', 'Surfing', 'Singing', 'Aviation'),
                    array('7. What colour are the four stars on the flag of New Zealand?', 'Green', 'Blue', 'Red', 'White', 'Red'),
                    array('8. How many states make up the United States of America?', '50 states', '51 states', '150 states', '31 states', '50 states'),  
                    array('9. Which English football team plays its home matches at Old Trafford?', 'New Castle', 'Manchester United', 'Man City', 'Liverpool', 'Manchester United'),
                    array('10. Mr. Carson is the name of the butler in which popular TV costume drama?', 'Prsion Break', 'Power', 'Friends', 'Downton Abbey', 'Downton Abbey'),

                    array('11. Comedy duo Ant and Dec are originally from which English city?', 'Newcastle upon Tyne', 'London', 'Kent', 'Manchester', 'Newcastle upon Tyne'),
                    array('12. In the medical profession, what do the initials ‘GP’ stand for?', 'Good People', 'General practitioner', 'Generalus Practiotionier', 'Genera Physician', 'General practitioner'),
                    array('13. Which German football team won the Champions League in 2013?', 'Liverpool', 'Real Madrid', 'Bayern Munich', 'Borussia Dortmund', 'Bayern Munich'),  
                    array('14. Maris Piper and King Edward are varieties of what?', 'Potato', 'Apples', 'Trees', 'Dogs', 'Potato'),
                    array('15. H2O is the chemical formula for what?', 'Ice', 'Alchol', 'Hydrogen', 'Water', 'Water'),

                    array('16.Which English king married six times?', 'Charles VIII', 'Henry VIII', 'Edward VIII', 'Henry II', 'Henry VIII'),
                    array('17. Whom did David Cameron succeed as the British prime minister?', 'Margret Tatcher', 'Huge Grant', 'Gordon Brown', 'The Queen', 'Gordon Brown'),
                    array('18. Blandenburg, Bremen and Lower Saxony are states in which European country?', 'Spain', 'Germany', 'Holland', 'France', 'Germany'),  
                    array('19. Complete the title of the play by Shakespeare – ‘The Merchant of …’?', 'Drugs', 'Italy', 'Rome', 'Venice', 'Venice'),
                    array('20. By what name is the TV adventurer Edward Michael Grylls more commonly known?', 'Steve Irwin', 'Bear Grylls', 'Polarbear Grylls', 'EM Grylls', 'Bear Grylls'));

                    //score vaiable that tracks the users score 
                    $score = 0;                

                    // nested for loop that dynamically creates the questions , radio button and answers

                for($row=0; $row<count($questions); $row++){
                    echo "<h2>".$questions[$row][0]."</h2>"; // displays the questions form the 2d array called questions
                    for($colum=1; $colum<(count($questions[0]))-1; $colum++){
                            $ques = $questions[$row][$colum];
                            echo '<label><input type="radio" value="'.$questions[$row][$colum].'" name="btn_'.$row.'" id="btn_'.$row.$colum.'">'.$ques.'</input></label>'; // creates the answer buttons for the questiosn
                            echo "<br />";
                    
                        }

                        if(isset($_POST["btn_".$row])){
                            $choice = $_POST["btn_".$row];
                        }
                        else{
                            $choice = NULL;
                        }

                        // stores the answers from the 2d array into this variable for checking if use is correct
                    $answer = $questions[$row][5];
             
                        if ($choice != NULL){
                            if ($choice != $answer)
                            {
                            echo "<input size='50' value='Incorret, the correct answer is $answer' style='background-color: red;'>";
                            }else{
                                $score++;
                                echo "<input size='50' value='$answer is the correct answer' style='background-color: green;'>";
                            }
                        }else{
                                echo "<input size='50' value=' ' style='background-color: gray;'>";
                            }  
                    }  

                // calls calcScore function on click of the submit for grading function
                        
    
                    if(isset($_POST["submitBtn"])){
                        calcScore($score);
                        }

                    // calcSore Function thats takes the accumulated score variable and uses a switch statment to grade the quiz taker & display the approiate message

                    function calcScore($score){

                        // switch statment to display message for trhe score groups and also displays the SUPRISE for 0 and 20 scores
                      
                        switch (true) {
                            case ($score == 0):
                            {
                                $message = " You got a Zero score :( " . $score;
                                echo "<script type='text/javascript'>alert('$message');</script>";
                                echo "<script type='text/javascript'>document.getElementById('imageid').src = 'images/zeroscore.gif'</script>";
                                              
                            }
                                break;
                            case ($score >= 1 && $score < 10 ): {
                                $message = "Try Harder Next Time ! Your Score is : " . $score;
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                                break;
                            case ($score >= 10 && $score <= 15):
                            {
                                $message = "Good Job , Try Harder to get a A+ ! Your Score is :  " . $score;
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                    
                                break;
                            case ($score >= 16 && $score < 20):
                            {
                                $message = "Awesome Job - A+ Score ! Your Score is : " . $score;
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                            break;
                            case ($score == 20 ):
                            {
                                $message = "Perfect Score ! Your Score is :  " . $score;
                                echo "<script type='text/javascript'>alert('$message');</script>";
                                echo "<script type='text/javascript'>document.getElementById('imageid').src = 'images/perfectscore.gif'</script>";
                            }
                                break;
                            default:
                                echo "Error , please retry quiz";
                        }
            // replaces the timer when the quiz is in REVIEW mode
                        echo "<script type='text/javascript'>document.getElementById('heading').innerHTML = 'This is your Test Review - please check your answers and if you want to retake the quiz click RESTART QUIZ below'</script>";
                        echo "<script type='text/javascript'>document.getElementById('myTimer').innerHTML = ' Your Score is : '</script>";
                        echo "<script type='text/javascript'>document.getElementById('myTimer').innerHTML += $score</script>";
                        }
                    
            
?>
    <!-- submit and reset buttons for the Quiz form  -->
       <p><input type="submit" id="submitId" name="submitBtn" value="Submit for Grading"></p>
       <p><button id="resetBtn" value="Restart Quiz" onclick="newDoc()">  Restart Quiz  </button></p>

</form>

<script type="text/javascript" src="quiz.js"></script>

</body>
</html>