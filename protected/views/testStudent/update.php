<?php
/* @var $this TestStudentController */
/* @var $model TestStudent */

$this->breadcrumbs=array(
	'Test Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestStudent', 'url'=>array('index')),
	array('label'=>'Create TestStudent', 'url'=>array('create')),
	array('label'=>'View TestStudent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TestStudent', 'url'=>array('admin')),
);
?>

<h1>Update TestStudent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>