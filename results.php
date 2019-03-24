
<?php
if(isset($_POST["submitBtn"])){
                    calcScore($score);
                }

                // calcSore Function thats takes the accumulated score variable and uses a switch statment to grade the quiz taker & display the approiate message

                 function calcScore($score){


                    switch ($score) {
                        // case ($score == 0 ):
                        // {
                        //     $message = "zero score : " . $score;
                        //     echo "<script type='text/javascript'>alert('$message');</script>";
                        //     echo '<img src="images/zeroscore.gif"/>';
                        // }
                        //     break;
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
                            echo '<img src="images/perfectscore.gif"/>';
                        }
                            break;
                        default:
                            echo "Error , please retry quiz";
                    }
                    }

                ?>