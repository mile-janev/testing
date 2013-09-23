<?php
    if(Yii::app()->session['isadmin'])
    {
        echo $this->renderPartial('../test/_administration', array('model'=>$model));
    }
?>
<div class="popolnuvanje-prasanja">
    <h3>Наслов на тестот: <?php echo $model->tests->title; ?></h3>
    <?php echo $this->renderPartial('../test/_menuquestion2', array('model'=>$model)); ?>
    <h3>Прашањe со избор</h3>

    <?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>
</div>