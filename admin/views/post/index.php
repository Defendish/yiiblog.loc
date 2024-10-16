<?php

use common\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PostSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'title',
            'text:ntext',

            // Сортировка по категории
            [
                'attribute' => 'post_category_id',
                'label' => Yii::t('app', 'Категория поста'),
                'value' => function (Post $model) {
                    return $model->getCategoryName(); // Получаем name категории
                },
                // Указываем, что это поле можно сортировать
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\PostCategory::find()->all(), 'id', 'name'), // Предполагается, что у вас есть модель Category с полем name
                'contentOptions' => ['style' => 'width: 200px;'], // Настройка ширины столбца (по желанию)
            ],

            // Сортировка по статусу
            [
                'attribute' => 'status',
                'label' => Yii::t('app', 'Статус'),
                'value' => function ($model) {
                    return $model->getStatusName(); // Получаем название статуса
                },
                // Указываем, что это поле можно сортировать
                'filter' => Post::getStatusLabels(), // Используем метки статусов для фильтрации
                'contentOptions' => ['style' => 'width: 150px;'], // Настройка ширины столбца (по желанию)
            ],

            //'image',
            //'created_at',
            //'updated_at',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);
    ?>




</div>
