<?php
/* @var $this FillAnswerController */
/* @var $model FillAnswer */

$this->breadcrumbs=array(
	'Fill Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FillAnswer', 'url'=>array('index')),
	array('label'=>'Create FillAnswer', 'url'=>array('create')),
	array('label'=>'Update FillAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FillAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FillAnswer', 'url'=>array('admin')),
);
?>

<h1>View FillAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'correct',
		'fill_id',
	),
)); ?>
