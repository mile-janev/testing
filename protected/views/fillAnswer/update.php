<?php
/* @var $this FillAnswerController */
/* @var $model FillAnswer */

$this->breadcrumbs=array(
	'Fill Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FillAnswer', 'url'=>array('index')),
	array('label'=>'Create FillAnswer', 'url'=>array('create')),
	array('label'=>'View FillAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FillAnswer', 'url'=>array('admin')),
);
?>

<h1>Update FillAnswer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>