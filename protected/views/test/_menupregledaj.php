<div id="linkovi">
    <?php echo CHtml::link('Избор', $this->createUrl('clickAnswer/pregledaj', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
    <?php echo CHtml::link('Дополнување ('.$fill_num.')', $this->createUrl('fillAnswer/pregledaj', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
    <?php echo CHtml::link('Целосен одговор ('.$complete_num.')', $this->createUrl('completeAnswer/pregledaj', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
</div>