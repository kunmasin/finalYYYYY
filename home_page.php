<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="c:/Users/HP/Documents/PROJECTS_AT_PLAT/fontawesome-free-6.4.2-web/css/all.css">
    <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>
    <title>Student Page</title>
    <body>
        <?php
        /*
        define("WELCOME", "Good Evening Here, how are you doing !!!");
        function myWELCOME() {
            echo WELCOME;
        }
        myWELCOME();

        $time = date("H");
        if ($time <= "12"){
            echo "Good Morning";
        }
        elseif($time <= "12"){
            echo "<br>"."Good Afternoon";
        }
        else{
            echo "<br>"."Good Evening";
        }

        $Day= "Friday";
        switch ($Day){
            case "Monday":
                echo "<br>"."Welcome today is Monday";
                break;
            case "Tuesday":
                echo "<br>"."Welcome today is Tuesday";
                break;
            case "Wednesday":
                echo "<br>"."Welcome today is Wednesday";
                break;
            case "Thursday":
                echo "<br>"."Welcome today is Thursday";
                break;    
            case "Friday":
                echo "<br>"."Welcome today is Friday";
                break;
            case "Saturday":
                echo "<br>"."Welcome today is Saturday";
                break;
            case "Sunday":
                echo "<br>"."Welcome today is Sunday";
                break;
            }


            $Oniye= -100;
            while($Oniye <=10){
                echo "The number is: $Oniye <br>";
                $Oniye++;
            }

            $Oniye= 20;
            do{
                echo "The Number is: $Oniye <br>";
                $Oniye++;
            }
            while($Oniye<=200);

            for($Oniye=10; $Oniye <=100; $Oniye++){
                echo "<br>"."NUMBER START FROM ".$Oniye;
            }

            $Hubby= array("Cheating", "Joking", "Reading","Billing");
            foreach($Hubby as $Love){
                echo "<br>".$Love;
            }
                
                function greetings($Surname, $Year, $Level){
                    echo "Oniye $Surname, Born in $Year, in $Level level <br>";
                }
                greetings("Abdullahi", 2024, 400);
                greetings("Ibrahim", 2025, 500);
                greetings("Mustapha", 2010, 100);
                greetings("Habeebah", 2007, 200);
            

                function setHeight($minheight= 100){
                    echo "The Height of the $minheight <br>";
                }
                setHeight(50);
                setHeight();
                setHeight(-1000);
                */

                function sum($YearBorn, $YearNow){
                    $NewYear= $YearBorn + $YearNow;
                    return $NewYear ."<br>";
                }

                echo "The Number is ".sum(2000, 2024);
                echo "The Number is ".sum(2003, 2024);
                echo "The Number is ".sum(2007, 2024);
        ?>
</body>
</html>
