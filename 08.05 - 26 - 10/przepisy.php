<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    

    <?php
    
        $conn = mysqli_connect('localhost', 'root', '', 'przepisy');

        if(isset($_GET['id']))
        {

            $id = $_GET['id'];

        }
        else
        {

            $id = 7;
        
        }

    ?>


    <aside>

        <a href="przepisy.php?id=1">Sernik</a><br>
        <a href="przepisy.php?id=2">Sałatka</a><br>
        <a href="przepisy.php?id=3">Pankejki</a><br>
        <a href="przepisy.php?id=4">Nugetsy</a><br>
        <a href="przepisy.php?id=5">Łosoś</a><br>
        <a href="przepisy.php?id=6">Kociołek</a><br>
        <a href="przepisy.php?id=7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8">Hamburgery</a><br>
        <a href="przepisy.php?id=9">Eklerki</a><br>
        <a href="przepisy.php?id=10">Churros</a>            

        <p>Autor: 10101010101</p>


    </aside>

    <main>

        <h1>

            <!--SKRYPT 1-->

            <?php
            
                $sql = 'SELECT nazwa, rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE idPotrawy = '.$id.';';

                $ret = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($ret);

                echo $row['rodzaj'];
            
            ?>


        </h1>

        <!--SKRYPT 2-->
        <?php
        
            $sql2 = 'SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = '.$id.';';

            $ret2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($ret2);

            if($row2['trudnosc'] == 1)
            {
                $turd = "latwe";
            }
            else if($row2['trudnosc'] == 2)
            {
                $turd = "srednie";
            }
            else if($row2['trudnosc'] == 3)
            {
                $turd = "trudne";
            }

            echo "<h2>".$row2['nazwa']."</h2>";
            echo "<p>Trudnosc: ".$turd.", Kalorie: ".$row2['kalorie']."</p>";    
        
        ?>

        <img src="pliki14/separator.png" alt="przepis">

        <p>Alergeny: <!--SKRYPT 3-->

                <?php
                
                    $sql3 = 'SELECT nazwa, alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = '.$id.';';
                
                    $ret3 = mysqli_query($conn, $sql3);

                    $row3 = mysqli_fetch_assoc($ret3);

                    echo $row3['alergen']." ";

                ?>

        </p>

        <ul>

            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>

        </ul>

        <p><!--SKRYPT -->


            <?php
            
                $sql4 = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id";
                
                $ret4 = mysqli_query($conn, $sql4);

                $row4 = mysqli_fetch_assoc($ret4);

                echo $row4['przepis'];


            ?>

        </p>

    </main>
 
    <section style="background-image: url('pliki14/<?php echo $row4['plik'] ?>  ');">  

        <h1>Blog Kulinarny</h1>

    </section>

    <?php

        mysqli_close($conn)

    ?>

</body>
</html>