<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                'id',
            'user_id',
            'title',
            'text:ntext',
            'post_category_id',
            'status',
            'image',
            'created_at:datetime',
            'upload_at:datetime',
        ],
    ])
    ?>


    <p><strong><?= Yii::t('app', 'Дата создания:') ?></strong> <?= date('Y-m-d H:i:s', $model->created_at) ?></p>
    <p><strong><?= Yii::t('app', 'Дата обновления:') ?></strong> <?= date('Y-m-d H:i:s', $model->upload_at) ?></p>


</div>
