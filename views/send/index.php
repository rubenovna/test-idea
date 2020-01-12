<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php /*$this->registerJsFile('@web/js/send.js')*/ ?>
<?php $this->registerCsrfMetaTags() ?>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'name')->label('Ваше имя') ?>
<?= $form->field($model, 'sumBYN')->label('Сумма') ?>
<?= $form->field($model, 'file')->fileInput() ?>

<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) . '<br><br><br>' ?>
<?php ActiveForm::end() ?>
<span id="status" style="display:none"><h3>Отправлено</h3></span><br>
<?php


$js = <<<JS
    $('form').on('beforeSubmit', function(){
         // var data = $(this).serialize();
         var form = $(this);
         var formData = new FormData(form[0]);
         
         
        $.ajax({
            url: 'index.php?r=send%2Findex',
            type: 'POST',
           // data: data,
            processData: false,
	        contentType: false,
            data:  formData,
            success: function(res){
                // console.log(res);
                
                $("#status").toggle();
                // console.log(form[0]);
                form.find('input:text, input:password, input:file, select, textarea').val('');
                form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');            
  
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
JS;

$this->registerJs($js);
?>

