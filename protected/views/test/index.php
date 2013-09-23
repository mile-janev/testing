<div class="pregledani-tester">
    <h3>Пријави се за полагање на тест</h3>
    
    <?php
        foreach ($all_tests as $test)
        {
            $start1 = date_create($test['start']);
            $end1 = date_create($test['end']);
            $razlika = date_diff($end1, $start1);
            $start = date_format(date_create($test['start']), "H:i:s d-m-Y");
//            $end = date_format(date_create($test['end']), "H:i:s d-m-Y");

            echo "<div class='test_eden'>";
            echo "<b>Наслов на тестот:</b> ".$test['title']."<br />";
            echo "<b>Тестер:</b> ".$test['tester_id']."<br />";
            echo "<b>Почеток:</b> ".$test['start']."<br />";
            echo "<b>Крај:</b> ".$test['end']."<br />";
            echo "<b>Времетраење:</b> ".$razlika->h." Часови, ".$razlika->i." Минути<br />";

            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'zapisi_test',
                'enableAjaxValidation'=>false,
            )); 
            
            echo "<b>Шифра на тестот:</b> ".CHtml::passwordField('code');
            echo CHtml::hiddenField('test_id', $test['id']);
            echo CHtml::submitButton('Пријави', array('class'=>'odgovaraj_test')); 
            $this->endWidget();
            echo "</div><br /><hr />";
        }
    ?>
</div>