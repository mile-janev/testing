<?php echo $this->renderPartial('../test/_administration', array('model'=>$model)); ?>

<h2>Менаџирај Тестери</h2>
<h3><?php echo $model->firstname." ".$model->lastname; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
//		'password',
		'institution',
		'firstname',
		'lastname',
	),
)); ?>
