<div id="linkovi">
    <?php echo CHtml::link('Избор', $this->createUrl('clickAnswer/proveri', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
    <?php echo CHtml::link('Дополнување', $this->createUrl('fillAnswer/proveri', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
    <?php echo CHtml::link('Целосен одговор', $this->createUrl('completeAnswer/proveri', array('test_id'=>$_GET['test_id'], 'student_id'=>$_GET['student_id']))); ?>
</div>