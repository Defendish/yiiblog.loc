<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PostCategory;
use common\models\PostStatus;

/** @var yii\web\View $this */
/** @var common\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_category_id')->dropDownList(PostCategory::getList(), ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'status')->dropDownList(PostStatus::getList(), ['prompt' => 'Выберите статус']) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'created_at')->textInput() ?>--!>

    <!--<?= $form->field($model, 'upload_at')->textInput() ?>--!>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
