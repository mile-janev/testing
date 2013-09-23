<table class="tabeli">
    <tr><th>Прегледан</th><th>Прашање</th><th>Точен</th><th>Одговорил</th><th>Поени</th></tr>
    <?php
        foreach($odgovori as $odgovor)
        {
            if($odgovor->checked == 1){$odgovoreno = "<img src='images/yes.png' />";}else{$odgovoreno = "<img src='images/no.png' />";}
            echo "<tr><td>".$odgovoreno."</td><td>".$odgovor->completes->question. "</td><td>".$odgovor->completes->correct."</td><td>".$odgovor->answer."</td><td id='tabela_levo'>";
    ?>
    
    <?php
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
            'id'=>'complete-question-answer',
            'action'=>Yii::app()->createUrl('/completeAnswer/savepoints'),
            'enableAjaxValidation'=>false,
        ));
    ?>
    
    <div id="prasanje">
        <?php echo $form->radioButtonList($odgovor, 'points', array('0'=>'0','0.5'=>'0.5','1'=>'1','1.5'=>'1.5','2'=>'2'), array('separator'=>' ')); ?>
        <?php echo CHtml::textField('comment'); ?>
        <?php echo CHtml::hiddenField('completeanswer_id', $odgovor->id); ?>
        <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
    </div>
<?php $this->endWidget(); ?>
    
<?php echo "</td></tr>";
    }
?>
</table>