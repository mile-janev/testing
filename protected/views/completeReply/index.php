<?php
/* @var $this CompleteReplyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Complete Replies',
);

$this->menu=array(
	array('label'=>'Create CompleteReply', 'url'=>array('create')),
	array('label'=>'Manage CompleteReply', 'url'=>array('admin')),
);
?>

<h1>Complete Replies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
