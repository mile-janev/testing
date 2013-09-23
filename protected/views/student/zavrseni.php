<div class="pregledani-tester">
    <h3>Завршени тестови</h3>
    <?php 
        foreach($zavrseni as $zavrsen)
        { 
            $start = date_format(date_create($zavrsen['start']), "H:i:s d-m-Y");
//            $end = date_format(date_create($zavrsen['end']), "H:i:s d-m-Y");
            $student_id = Yii::app()->user->id;
            $testerr = Tester::model()->findByPk($zavrsen['tester_id']);
            if($zavrsen['checked']==1){$pregledan = "<img src='images/yes-mini.png' />";}else{$pregledan = "<img src='images/no-mini.png' />";}

            echo "<div class='test_eden'>";
            echo "<b>Наслов на тестот:</b> ".$zavrsen['title']."<br />";
            echo "<b>Тестер:</b> ".$testerr->firstname." ".$testerr->lastname."<br />";
            echo "<b>Одржан на:</b> ".$start."<br />";
            echo "<b>Прегледан:</b> ".$pregledan."<br />";
            
            if($zavrsen['checked']==1)
            {   
                echo "<b>Поени:</b> ".$zavrsen['points']."<br />";
                echo "<b>Оцена:</b> ".$zavrsen['grade']."<br />";
                echo CHtml::button('Резултати', array('submit' => array('/clickAnswer/proveri&test_id='.$zavrsen['id'].'&student_id='.$student_id), 'class'=>'odgovaraj_test'));
            }
            echo "</div><br /><hr />";
        }
        ?>
</div>