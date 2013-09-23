<div class="prasanja_test">
    Наслов на тестот: <?php echo $test->title; ?>
</div>

<div class="pregledaj_left">
    <h3>Прегледани тестови</h3>
    <?php
        foreach ($studenti_pregledani as $studenti_pregledan)
        {
            echo "<b>".$studenti_pregledan->students->firstname." ".$studenti_pregledan->students->lastname.", индекс бр.".$studenti_pregledan->students->index.", Оцена: ".$studenti_pregledan->grade."</b>, Поени: ".$studenti_pregledan->points." ".CHtml::button('Промени', array('submit' => array('test/pregledajtest&test_id='.$_GET['test_id'].'&student_id='.$studenti_pregledan->student_id.''), 'class'=>'odgovaraj_test'))."<br /><br /><hr />";
        }
    ?>
</div>

<div class="pregledaj_right">
    <h3>Непрегледани тестови</h3>
    <?php
        if($nepregledani_broj == 0)
        {
            echo "Сите тестови на студентите се прегледани<br />";
            echo "<b>Просечна оцена на тестот е: ".$test->average_grade."</b>";
            
            if($test->checked == 0)
            {
                echo CHtml::button('Маркирај го тестот како прегледан', array('submit' => array('/test/markirajtest&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test'));
            }
            else
            {
                echo CHtml::button('Зачувај го во Ексел', array('submit' => Yii::app()->createUrl('export/usersexcel&test_id='.$_GET['test_id']), 'class'=>'odgovaraj_test'));
            }
        }
        else
        {
            foreach ($studenti_nepregledani as $studenti_nepregledan)
            {
                echo "<b>Шифра:</b> ".$studenti_nepregledan->students->username." ".CHtml::button('Прегледај', array('submit' => array('test/pregledajtest&test_id='.$_GET['test_id'].'&student_id='.$studenti_nepregledan->student_id.''), 'class'=>'odgovaraj_test'))."<br /><br /><hr />";
            }
        }
    ?>
</div>
