<?php
/* @var $this TestStudentController */
/* @var $model TestStudent */

$this->breadcrumbs=array(
	'Test Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestStudent', 'url'=>array('index')),
	array('label'=>'Manage TestStudent', 'url'=>array('admin')),
);
?>

<h1>Create TestStudent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>