<?php
/* @var $this ClickAnswerController */
/* @var $model ClickAnswer */

$this->breadcrumbs=array(
	'Click Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClickAnswer', 'url'=>array('index')),
	array('label'=>'Create ClickAnswer', 'url'=>array('create')),
	array('label'=>'Update ClickAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClickAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClickAnswer', 'url'=>array('admin')),
);
?>

<h1>View ClickAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'correct',
		'click_id',
		'student_id',
	),
)); ?>
