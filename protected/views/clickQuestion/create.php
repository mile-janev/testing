<div class="popolnuvanje-prasanja">
    <h3>Процес на пополнување на прашања</h3>
    <?php echo $this->renderPartial('../test/_menuquestion', array('model'=>$model)); ?>
    <h3>Прашања со избор</h3>
    <?php 
        if(Yii::app()->session['click_num'] > 0)
        {
            echo $this->renderPartial('_form', array('model'=>$model));
        }
        else
        {
    ?>
    <h5>Прашањата со избор се пополнети</h5>
        <?php echo CHtml::button('Погледни тест', array('submit' => array('/clickQuestion/index&test_id='.$_GET['test_id']."&type=click"), 'class'=>'pogledni_test')); ?>
    <?php
        }
    ?>

</div>