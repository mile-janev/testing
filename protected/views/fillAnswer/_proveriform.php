<?php
    //Presmetka na osvoenite poeni
    $poeni = 0;
    foreach ($odgovori as $odgovor) {
        $poeni = $poeni + $odgovor->points;
    }
echo "<div class='odgovor_poeni'>Вие на дополнување имате освоено: ".$poeni." поени</div>";
    foreach ($odgovori as $odgovor)
    {
?>
<div id="prasanja_odgovor">
<?php
        echo "<div class='prasanje_odgovor'>";
        echo "<b>Прашање:</b> ".$odgovor->fills->question."<br />";
        echo "<b>Точен одговор е:</b> ".$odgovor->fills->correct."<br />";
        echo "<b>Вашиот одговор е:</b> ".$odgovor->answer."<br />";
        echo "<b>Поени за ова прашање:</b> ".$odgovor->points."<br /></div>";
?>
    <div class="komentar"><br />
<?php
        echo "<b>Коментари:</b><br /> ";
    
    $fillanswer_id = $odgovor->id;
    
    $repliki = FillReply::model()->findAllByAttributes(array('fillanswer_id'=>$odgovor->id));
?>

<?php
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
        'id'=>'fill-reply-answer',
        'action'=>Yii::app()->createUrl('/fillReply/leavecomment'),
        'enableAjaxValidation'=>false,
        ));
        echo "Коментирај: ".CHtml::textField('comment')." ";
        echo CHtml::hiddenField('fillanswer_id', $fillanswer_id);
        echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test'));
    $this->endWidget();
?>
    </div>
</div>
<?php
    }
?>

