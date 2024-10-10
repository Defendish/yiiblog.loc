<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PostCategory;
use common\models\PostStatus;

/** @var yii\web\View $this */
/** @var common\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <label for="post-text">Текст</label>
        <div id="editor" style="height: 200px;"><?= $model->text ?></div>
        <?= $form->field($model, 'text')->hiddenInput(['id' => 'post-text'])->label(false) ?>
    </div>

    <?= $form->field($model, 'post_category_id')->dropDownList(PostCategory::getList(), ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'status')->dropDownList(PostStatus::getList(), ['prompt' => 'Выберите статус']) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'created_at')->textInput() ?>--!>

    <!--<?= $form->field($model, 'upload_at')->textInput() ?>--!>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],        // toggled buttons
            ]
        }
    });

    // Синхронизация содержимого редактора с скрытым полем
    quill.on('text-change', function() {
        document.getElementById('post-text').value = quill.root.innerHTML;
    });
</script>