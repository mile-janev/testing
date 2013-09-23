<?php
/* @var $this CompleteReplyController */
/* @var $model CompleteReply */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completeanswer_id')); ?>:</b>
	<?php echo CHtml::encode($data->completeanswer_id); ?>
	<br />


</div>