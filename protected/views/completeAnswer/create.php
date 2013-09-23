<?php
/* @var $this CompleteAnswerController */
/* @var $model CompleteAnswer */

$this->breadcrumbs=array(
	'Complete Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompleteAnswer', 'url'=>array('index')),
	array('label'=>'Manage CompleteAnswer', 'url'=>array('admin')),
);
?>

<h1>Create CompleteAnswer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>