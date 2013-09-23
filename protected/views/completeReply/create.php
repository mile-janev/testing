<?php
/* @var $this CompleteReplyController */
/* @var $model CompleteReply */

$this->breadcrumbs=array(
	'Complete Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompleteReply', 'url'=>array('index')),
	array('label'=>'Manage CompleteReply', 'url'=>array('admin')),
);
?>

<h1>Create CompleteReply</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>