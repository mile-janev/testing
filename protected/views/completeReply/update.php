<?php
/* @var $this CompleteReplyController */
/* @var $model CompleteReply */

$this->breadcrumbs=array(
	'Complete Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompleteReply', 'url'=>array('index')),
	array('label'=>'Create CompleteReply', 'url'=>array('create')),
	array('label'=>'View CompleteReply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CompleteReply', 'url'=>array('admin')),
);
?>

<h1>Update CompleteReply <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>