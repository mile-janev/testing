<?php
/* @var $this CompleteAnswerController */
/* @var $model CompleteAnswer */

$this->breadcrumbs=array(
	'Complete Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CompleteAnswer', 'url'=>array('index')),
	array('label'=>'Create CompleteAnswer', 'url'=>array('create')),
	array('label'=>'View CompleteAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CompleteAnswer', 'url'=>array('admin')),
);
?>

<h1>Update CompleteAnswer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>