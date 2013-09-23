<?php
/* @var $this ClickAnswerController */
/* @var $model ClickAnswer */

$this->breadcrumbs=array(
	'Click Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClickAnswer', 'url'=>array('index')),
	array('label'=>'Create ClickAnswer', 'url'=>array('create')),
	array('label'=>'View ClickAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClickAnswer', 'url'=>array('admin')),
);
?>

<h1>Update ClickAnswer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>