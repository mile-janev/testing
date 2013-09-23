<table class="tabeli">
    <tr><th>Прегледан</th><th>Прашање</th><th>Точен</th><th>Одговорил</th><th>Поени</th></tr>
    <?php
        foreach($odgovori as $odgovor)
        {   
            if($odgovor->checked == 1){$odgovoreno = "<img src='images/yes.png' />";}else{$odgovoreno = "<img src='images/no.png' />";}
            echo "<tr><td>".$odgovoreno. "</td><td>".$odgovor->fills->question. "</td><td>".$odgovor->fills->correct."</td><td>".$odgovor->answer."</td><td id='tabela_levo'>";
    ?>
    
        <?php 
            $repliki = FillReply::model()->findAllByAttributes(array('fillanswer_id'=>$odgovor->id));
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
                'id'=>'fill-question-answer',
                'action'=>Yii::app()->createUrl('/fillAnswer/savepoints'),
                'enableAjaxValidation'=>false,
            ));
        ?>
            <?php echo $form->radioButtonList($odgovor, 'points', array('0'=>'0','1'=>'1'), array('separator'=>' ')); ?>
            <?php echo CHtml::textField('comment'); ?>
            <?php echo CHtml::hiddenField('fillanswer_id', $odgovor->id); ?>
            <?php echo CHtml::submitButton('Внеси', array('class'=>'odgovaraj_test')); ?>
        <?php $this->endWidget(); ?>

    <?php echo "</td></tr>";
        }
    ?>
</table>