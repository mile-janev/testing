<div class="tester-left">
<h3>Тестови во тек</h3>
<?php
    foreach ($vo_tek as $votek)
    {
        $start = date_format(date_create($votek->start), "H:i:s d-m-Y");
        $end = date_format(date_create($votek->end), "H:i:s d-m-Y");
        
        echo "<div class='test_eden'>";
        echo "<b>Наслов:</b> ".CHtml::link($votek->title, Yii::app()->createUrl('clickQuestion/index/', array("test_id"=>$votek->id, "type"=>"click")))."<br />";
        echo "<b>Започнат во:</b> ".$start."<br />";
        echo "<b>Завршува во:</b> ".$end."<br />";
        echo "</div><br /><hr />";
    }
?>
</div>

<div class="tester-center">
    <h3>Непрегледани тестови</h3>
    <?php
        foreach ($nepregledani as $nepregledan)
        {
            $start = date_format(date_create($nepregledan->start), "H:i:s d-m-Y");
            $end = date_format(date_create($nepregledan->end), "H:i:s d-m-Y");
            
            echo "<div class='test_eden'>";
            echo "<b>Наслов:</b> ".CHtml::link($nepregledan->title, Yii::app()->createUrl('clickQuestion/index/', array("test_id"=>$nepregledan->id, "type"=>"click")))."<br />";
            echo "<b>Започнал:</b> ".$start."<br />";
            echo "<b>Завршил:</b> ".$end."<br />";
        
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'pregledaj_test',
                'action'=>Yii::app()->createUrl('/test/pregledajtest', array("test_id"=>$nepregledan->id)),
                'enableAjaxValidation'=>false,
            )); 
            echo CHtml::hiddenField('test_id', $nepregledan['id']);
            echo CHtml::submitButton('Прегледај', array('class'=>'odgovaraj_test')); 
            $this->endWidget();
            
            echo "</div><br /><hr />";
        }
    ?>
</div>

<div class="tester-right">
<h3>Незапочнати тестови</h3>
    <?php
        foreach ($nezapocnati as $nezapocnat)
        {
            $start = date_format(date_create($nezapocnat->start), "H:i:s d-m-Y");
            $end = date_format(date_create($nezapocnat->end), "H:i:s d-m-Y");
            
            echo "<div class='test_eden'>";
            echo "<b>Наслов:</b> ".CHtml::link($nezapocnat->title, Yii::app()->createUrl('clickQuestion/index/', array("test_id"=>$nezapocnat->id, "type"=>"click")))."<br />";
            echo "<b>Почеток:</b> ".$start."<br />";
            echo "<b>Крај:</b> ".$end."<br />";
            echo "</div><br /><hr />";
        }
    ?>
</div>