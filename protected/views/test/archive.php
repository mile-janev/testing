<div class="pregledani-tester">
    <h3>Прегледани тестови</h3>
    <?php
        foreach ($pregledani_testovi as $pregledan_test)
        {
            $start = date_format(date_create($pregledan_test->start), "H:i:s d-m-Y");
//            $end = date_format(date_create($pregledan_test->end), "H:i:s d-m-Y");
            
            echo "<div class='test_eden'>";
            echo "<b>Наслов:</b> ".CHtml::link($pregledan_test->title, Yii::app()->createUrl('clickQuestion/index/', array("test_id"=>$pregledan_test->id, "type"=>"click")))."<br />";;
            echo "<b>Одржан на:</b> ".$start."<br />";
            echo "<b>Просечна оцена:</b> ".$pregledan_test->average_grade."<br />";
            echo CHtml::button('Погледни резултати', array('submit' => array('/test/pregledajtest&test_id='.$pregledan_test->id), 'class'=>'odgovaraj_test'));
            echo "</div><br /><hr />";
        }
    ?>
</div>