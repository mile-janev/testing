<?php
/* @var $this CompleteAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Complete Answers',
);

$this->menu=array(
	array('label'=>'Create CompleteAnswer', 'url'=>array('create')),
	array('label'=>'Manage CompleteAnswer', 'url'=>array('admin')),
);
?>

<h1>Complete Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
