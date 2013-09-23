<?php
/* @var $this CompleteReplyController */
/* @var $model CompleteReply */

$this->breadcrumbs=array(
	'Complete Replies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CompleteReply', 'url'=>array('index')),
	array('label'=>'Create CompleteReply', 'url'=>array('create')),
	array('label'=>'Update CompleteReply', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CompleteReply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CompleteReply', 'url'=>array('admin')),
);
?>

<h1>View CompleteReply #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'complete_id',
	),
)); ?>
