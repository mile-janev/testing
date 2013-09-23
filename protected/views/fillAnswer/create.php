<?php
/* @var $this FillAnswerController */
/* @var $model FillAnswer */

$this->breadcrumbs=array(
	'Fill Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FillAnswer', 'url'=>array('index')),
	array('label'=>'Manage FillAnswer', 'url'=>array('admin')),
);
?>

<h1>Create FillAnswer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>