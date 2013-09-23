<?php
/* @var $this CompleteAnswerController */
/* @var $model CompleteAnswer */

$this->breadcrumbs=array(
	'Complete Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CompleteAnswer', 'url'=>array('index')),
	array('label'=>'Create CompleteAnswer', 'url'=>array('create')),
	array('label'=>'Update CompleteAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompleteAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompleteAnswer', 'url'=>array('admin')),
);
?>

<h1>View CompleteAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'answer',
		'complete_id',
	),
)); ?>
