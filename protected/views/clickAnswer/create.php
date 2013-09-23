<?php
/* @var $this ClickAnswerController */
/* @var $model ClickAnswer */

$this->breadcrumbs=array(
	'Click Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClickAnswer', 'url'=>array('index')),
	array('label'=>'Manage ClickAnswer', 'url'=>array('admin')),
);
?>

<h1>Create ClickAnswer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>