<?php
/* @var $this ClickAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Click Answers',
);

$this->menu=array(
	array('label'=>'Create ClickAnswer', 'url'=>array('create')),
	array('label'=>'Manage ClickAnswer', 'url'=>array('admin')),
);
?>

<h1>Click Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
