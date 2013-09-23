<?php
/* @var $this ClickQuestionController */
/* @var $model ClickQuestion */
?>

<div class="view">
<?php
if($question->correct == 'answer1'){
    $tocen = $question->answer1;
}
else if($question->correct == 'answer2'){
    $tocen = $question->answer2;
}
else{
    $tocen = $question->answer3;
}
?>
	<b>Прашање број: <?php echo $i." "; ?>
	<?php if($menuva){echo CHtml::link('Измени', array('update', 'id'=>$question->id, 'test_id'=>$_GET['test_id'], 'i'=>$i, 'type'=>'click'));} ?></b>
	<br />


	<b><?php echo "Прашање"; ?>:</b>
	<?php echo CHtml::encode($question->question); ?>
	<br />

	<b><?php echo "Одговор 1"; ?>:</b>
	<?php echo CHtml::encode($question->answer1); ?>
	<br />

	<b><?php echo "Одговор 2"; ?>:</b>
	<?php echo CHtml::encode($question->answer2); ?>
	<br />

	<b><?php echo "Одговор 3"; ?>:</b>
	<?php echo CHtml::encode($question->answer3); ?>
	<br />

	<b><?php echo "Точен одговор"; ?>:</b>
	<?php echo $tocen; ?>
	<br />

</div>