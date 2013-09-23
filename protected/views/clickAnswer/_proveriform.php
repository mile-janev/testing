<?php
    //Presmetka na osvoenite poeni
    $poeni = 0;
    foreach ($odgovori as $odgovor) {
        $poeni = $poeni + $odgovor->points;
    }
echo "<div class='odgovor_poeni'>Вие на кликање имате освоено: ".$poeni." поени</div>";
    foreach ($odgovori as $odgovor)
    {
        echo "<div id='prasanja_odgovor'>";
        //Gledame koj e tocen za da go ispecatime
        if($odgovor->clicks->correct == 'answer1')
        {
            $tocen = $odgovor->clicks->answer1;
        }
        else if($odgovor->clicks->correct == 'answer2')
        {
            $tocen = $odgovor->clicks->answer2;
        }
        else
        {
            $tocen = $odgovor->clicks->answer3;
        }
        
        //Gledame koj e izbraniot odgovor za da go ispecatime
        if($odgovor->answer == 'answer1')
        {
            $izbran = $odgovor->clicks->answer1;
        }
        else if($odgovor->answer == 'answer2')
        {
            $izbran = $odgovor->clicks->answer2;
        }
        else
        {
            $izbran = $odgovor->clicks->answer3;
        }
        
        echo "<b>Прашање</b>: ".$odgovor->clicks->question."<br />";
        echo "<b>Понуден одговор 1:</b> ".$odgovor->clicks->answer1."<br />";
        echo "<b>Понуден одговор 2:</b> ".$odgovor->clicks->answer2."<br />";
        echo "<b>Понуден одговор 3:</b> ".$odgovor->clicks->answer3."<br />";
        echo "<b>Точен одговор е:</b> ".$tocen."<br />";
        echo "<b>Вие избравте:</b> ".$izbran."<br />";
        echo "</div>";
    }
?>
