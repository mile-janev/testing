<?php
    //Presmetka na osvoenite poeni
    $poeni = 0;
    foreach ($odgovori as $odgovor) {
        $poeni = $poeni + $odgovor->points;
    }
echo "<div class='odgovor_poeni'>Вие на прашањата со целосен одговор имате освоено: ".$poeni." поени</div>";
    foreach ($odgovori as $odgovor)
    {
?>
<div id="prasanja_odgovor">
<?php
        echo "<div class='prasanje_odgovor'>";
        echo "<b>Прашање:</b> ".$odgovor->completes->question."<br />";
        echo "<b>Точен одговор е:</b> ".$odgovor->completes->correct."<br />";
        echo "<b>Вашиот одговор е:</b> ".$odgovor->answer."<br />";
        echo "<b>Поени за ова прашање:</b> ".$odgovor->points."<br /></div>";
?>
    <div class="komentar"><br />
<?php
        echo "<b>Коментари:</b><br /> ";
        
    $completeanswer_id = $odgovor->id;
    
    $repliki = CompleteReply::model()->findAllByAttributes(array('completeanswer_id'=>$odgovor->id));
    
    foreach ($repliki as $replika)
    {   
        if($replika['isstudent'] == 1)
        {
            echo "<li>Студентот: ".$replika['comment']."</li>";
        }
        else
        {
            echo "<li>Професорот: ".$replika['comment']."</li>";
        }
    }

    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'complete-reply-answer',
        'action'=>Yii::app()->createUrl('/completeReply/leavecomment'),
        'enableAjaxValidation'=>false,
        ));
        echo "<b>Коментирај:</b> ".CHtml::textField('comment')." ";
        echo CHtml::hiddenField('completeanswer_id', $completeanswer_id);
        echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test'));
    $this->endWidget();
?>
    </div>
</div>
<?php
    } 
?>
