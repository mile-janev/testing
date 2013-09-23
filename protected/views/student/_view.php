<?php
/* @var $this StudentController */
/* @var $model Student */
?>

<!--<div class="view">

	<b><?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php // echo CHtml::encode($data->username);// ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php // echo CHtml::encode($data->password); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('index')); ?>:</b>
	<?php // echo CHtml::encode($data->index); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php // echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php // echo CHtml::encode($data->lastname); ?>
	<br />
</div>-->

<?php
/* @var $this TestController */
/* @var $model Test */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tester_id')); ?>:</b>
	<?php echo CHtml::encode($data->tester_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />
        
        <div class="row">
		<?php // echo $form->labelEx($model,'username'); ?>
		<?php // echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40)); ?>
		<?php // echo $form->error($model,'username'); ?>
	</div>
</div>

<!-- Ovde prikazi gi site Testovi na koi e zapisan -->