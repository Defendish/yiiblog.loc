<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Post $model */

$this->title = Yii::t('app', 'Update Post: ', [
        'nameAttribute' => '' . $model->id,
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
