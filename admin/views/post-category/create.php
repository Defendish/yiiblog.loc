<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PostCategory $model */

$this->title = Yii::t('app', 'Create Post Categories');
$this->params['breadcrumbs'][] = ['label' =>  Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
