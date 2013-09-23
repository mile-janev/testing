<?php
/* @var $this ClickQuestionController */
/* @var $model ClickQuestion */
?>

<div class="view">
	<b>Прашање број: <?php echo $i." "; ?>
	<?php if($menuva){echo CHtml::link('Измени', array('update', 'id'=>$question->id, 'test_id'=>$_GET['test_id'], 'i'=>$i, 'type'=>'complete'));} ?></b>
	<br />


	<b><?php echo "Прашање"; ?>:</b>
	<?php echo CHtml::encode($question->question); ?>
	<br />

	<b><?php echo "Точен одговор"; ?>:</b>
	<?php echo $question->correct; ?>
	<br />
</div>