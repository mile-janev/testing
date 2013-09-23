<h2>Грешка <?php echo $code; ?></h2>

<div class="error">
    <?php 
        if($code == 403)
        {
            echo "Немате дозвола да пристапите овде";
        }
        else
        {
            echo CHtml::encode($message);
        }
    ?>
</div>