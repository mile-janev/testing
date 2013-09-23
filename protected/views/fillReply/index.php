<?php
/* @var $this FillReplyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fill Replies',
);

$this->menu=array(
	array('label'=>'Create FillReply', 'url'=>array('create')),
	array('label'=>'Manage FillReply', 'url'=>array('admin')),
);
?>

<h1>Fill Replies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
