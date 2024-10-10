<?php

namespace api\modules\v1\controllers;

use api\modules\v1\controllers\AppController;
use common\models\Post;
use yii\helpers\ArrayHelper;

class PostController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authentificator' => [
                'except' => ['index']
            ]
        ]);
    }

    public function actionIndex(): array
    {
        $query = Post::find()->where(['status' => 10]);
        $id = (int)$this->request->get('id');
        return $this->returnSuccess([
            'posts' => $query->all()
        ]);
    }
}