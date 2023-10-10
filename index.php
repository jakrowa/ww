<?php
session_start();

$baza= new mysqli('localhost','root','','gasnica');
$but=$_POST['but'] ?? 0;

try{
    if ($baza->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {

        if($but ==1){
            $baza->query("UPDATE counter SET count = count + 1 ");
        } else if($but ==2){
            $baza->query("UPDATE counter SET count = count + 2 ");
        }else if($but ==5){
            $baza->query("UPDATE counter SET count = count + 5 ");
        }else if($but ==10){
            $baza->query("UPDATE counter SET count = count + 10 ");
        }else if($but ==15){
            $baza->query("UPDATE counter SET count = count + 15 ");
        }else if($but ==20){
            $baza->query("UPDATE counter SET count = count + 20 ");
        }

        $count=$baza->query("SELECT * FROM counter")->fetch_row()[0];
        $_SESSION['select']=$count;


    }   
} catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! </span>';

    }

?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="top">
            WITAJ TUTAJ NALICZYSZ PIERDOLENIE GASNICY
        </div>
        <div class="left">
            DODAJ DO LICZNIKA PIERDOLENIA<br>
            <form method="post">
                <button name="but" value="1">DODAJ +1</button>
                <button name="but"value="2">DODAJ +2</button>
                <button name="but"value="5">DODAJ +5</button>
                <button name="but"value="10">DODAJ +10</button>
                <button name="but"value="15">DODAJ +15</button>
                <button name="but"value="20">DODAJ +20</button>
            </form>
        </div>
        <div class="right">
            <img src="golisz1.jpg" class="golsisz" style="transform:rotate(180deg)">
        <table class="timer">
            <td>
                <span name='count'>
                <?php
                    
                    echo  $_SESSION['select'];
                
                ?></span>
            </td>
        </table>
        <img src="golisz1.jpg" class="golsisz2" >

        <span class="straz">A WYNIKU STRZEŻE </span>

        </div>
    </body>
</html>