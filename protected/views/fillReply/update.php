<?php
/* @var $this FillReplyController */
/* @var $model FillReply */

$this->breadcrumbs=array(
	'Fill Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FillReply', 'url'=>array('index')),
	array('label'=>'Create FillReply', 'url'=>array('create')),
	array('label'=>'View FillReply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FillReply', 'url'=>array('admin')),
);
?>

<h1>Update FillReply <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>