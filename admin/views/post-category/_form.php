<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Название')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
