<?php
/* @var $this FillAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fill Answers',
);

$this->menu=array(
	array('label'=>'Create FillAnswer', 'url'=>array('create')),
	array('label'=>'Manage FillAnswer', 'url'=>array('admin')),
);
?>

<h1>Fill Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
