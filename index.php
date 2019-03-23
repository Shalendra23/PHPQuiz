<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP 20 Question Quiz - CodeSpace Project</title>

    <style>
    input[type="submit"] {
        background-color: orange;
            border: none;
            text-decoration: none;
            color: white;
            padding: 20px 20px;
            margin: 20px 20px;
            cursor: pointer;
}</style>
</head>
<body> <!--onclick="printID(this.name);"-->

<!-- 
Copyright 2019 Shalendra Singh

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 
-->
<div class="timer">
   <time id="countdown">5:00</time>
</div>


<form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<?php


// the 2d array taht contains the questions , options and choices for the quiz

$questions=array(array('What is 1+0?', '1', '2', '3', '4', '1'));
                // array('What is 1+1?', '1', '2', '3', '4', '2'),
                // array('What is 1+2?', '1', '2', '3', '4', 'c'),  
                // array('What is 1+3?', '1', '2', '3', '4', 'd'));


        //if(isset($_REQUEST[]))

              for($row=0; $row<count($questions); $row++){
                echo "<h2>".$questions[$row][0]."</h2>"; // displays the questions form the 2d array called questions
                  for($colum=1; $colum<(count($questions[0]))-1; $colum++){
                        $ques = $questions[$row][$colum];
                        echo '<input type="radio" value="'.$questions[$row][$colum].'" name="btn_'.$row.'" id="btn_'.$row.$colum.'">'.$ques.'</input>'; // creates the answer buttons for the questiosn

                        
                        // if ($colum % 2 == 0) // displays ony 2 buttons per line
                        echo "<br />";
                  
                                           
                    }

                    if(isset($_POST["btn_".$row])){
                        $choice = $_POST["btn_".$row];
                    }
                    else{
                        $choice = NULL;
                    }

                    $answer = $questions[0][5];
                    echo "$answer";

                          if ($choice != NULL){
                        if ($choice != $answer)
                        {
                            echo "incorrect . $choice ";
                        }else{
                            echo"correct . $choice";
                        }
                    }else{
                            echo "please enter choice . $choice";
                            
                    }     
                }

// switch ($age) {
//     case ($age < 2):
//         echo "Entry is Free";
//         break;
//     case ($age >= 2 && $age <= 12):
//         echo "Entry is R20";
//         break;
//     case ($age >= 13  && $age <= 17):
//         echo "Entry is R30";
//         break;
//     case ($age >= 18 && $age <= 25):
//         echo "Entry is R40";
//         break;
//     case ($age >= 26  && $age <= 64):
//         echo "Entry is R60";
//         break;
//     case ($age >= 65):
//         echo "Entry is R30";
//         break;
//     default:
//         echo "Please enter a valid age";
// }


?>
       <p><input type="submit" name="Submit"></p>
</form>
 <script>

  var seconds = 300;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name
            this.form.submit();
          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);
 

function printID(e)
{
    e = e || window.event;
    e = e.target || e.srcElement;
    console.log("Name: " + e.name); 
}


 </script>

</body>
</html>