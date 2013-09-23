<?php echo $this->renderPartial('../test/_administration', array('model'=>$model)); ?>

<h2>Менаџирај Тестери</h2>

<div class="popolnuvanje-prasanja">
    <h3><?php echo $model->firstname." ".$model->lastname; ?></h3>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>