<div class="admin_menu">
    <?php echo CHtml::link('Тестери', $this->createUrl('tester/admin')) ?>
    <?php echo CHtml::link('Студенти', $this->createUrl('student/admin')) ?>
    <?php echo CHtml::link('Тестови', $this->createUrl('test/admin')) ?>
    <?php echo CHtml::link('Прашања со избор', $this->createUrl('clickQuestion/admin')) ?>
    <?php echo CHtml::link('Прашања со дополнување', $this->createUrl('fillQuestion/admin')) ?>
    <?php echo CHtml::link('Прашања со целосен одговор', $this->createUrl('completeQuestion/admin')) ?><br />
    
    <?php echo CHtml::link('Реплики на прашања со надополнување', $this->createUrl('fillReply/admin')) ?>
    <?php echo CHtml::link('Реплики на прашања со целосен одговор', $this->createUrl('completeReply/admin')) ?>
</div>
<br />