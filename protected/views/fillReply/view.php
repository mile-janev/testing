<?php
/* @var $this FillReplyController */
/* @var $model FillReply */

$this->breadcrumbs=array(
	'Fill Replies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FillReply', 'url'=>array('index')),
	array('label'=>'Create FillReply', 'url'=>array('create')),
	array('label'=>'Update FillReply', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FillReply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FillReply', 'url'=>array('admin')),
);
?>

<h1>View FillReply #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fill_id',
	),
)); ?>
