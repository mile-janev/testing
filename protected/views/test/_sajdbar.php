<?php
    if(Yii::app()->session['click_num']==0 && Yii::app()->session['fill_num']==0 && Yii::app()->session['complete_num']==0)
    {
        echo CHtml::link('Додади ново прашање од овој тип', $this->createUrl('test/sesnum', array('test_id'=>$test->id, 'type'=>$_GET['type'])))."</br>";
    }
    else
    {
        if(Yii::app()->session['click_num']==1)
        {
            echo CHtml::link('Продолжи со пополнување', $this->createUrl('clickQuestion/create', array('test_id'=>$test->id, 'type'=>'click')))."</br>";
        }
        else if(Yii::app()->session['fill_num']==1)
        {
            echo CHtml::link('Продолжи со пополнување', $this->createUrl('fillQuestion/create', array('test_id'=>$test->id, 'type'=>'fill')))."</br>";
        }
        else
        {
            echo CHtml::link('Продолжи со пополнување', $this->createUrl('completeQuestion/create', array('test_id'=>$test->id, 'type'=>'complete')))."</br>";
        }
    }
?>
<?php echo CHtml::link('Измени ги податоците за тестот', $this->createUrl('test/update', array('test_id'=>$test->id)))."</br>"; ?>
