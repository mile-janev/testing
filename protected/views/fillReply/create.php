<?php
/* @var $this FillReplyController */
/* @var $model FillReply */

$this->breadcrumbs=array(
	'Fill Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FillReply', 'url'=>array('index')),
	array('label'=>'Manage FillReply', 'url'=>array('admin')),
);
?>

<h1>Create FillReply</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>