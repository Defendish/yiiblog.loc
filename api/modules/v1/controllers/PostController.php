<?php
namespace api\modules\v1\controllers;

use api\modules\v1\controllers\AppController;
use common\models\Post;
use common\models\User;
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

        // Получаем параметры из GET-запроса
        $id = $this->request->get('id');
        $userId = $this->request->get('user_id');
        $categoryId = $this->request->get('category_id');
        $firstItem = (int)$this->request->get('first_item', 0); // По умолчанию 0
        $itemCount = (int)$this->request->get('item_count', 10); // По умолчанию 10

        // Применяем фильтры
        if ($id !== null) {

            /** @var User $user */
//            $user = \Yii::$app->user->identity;
//            $user->id;

            $query->andFilterWhere(['id' => $id]);
        }
        if ($userId !== null) {
            $query->andFilterWhere(['user_id' => $userId]);
        }
        if ($categoryId !== null) {
            $query->andFilterWhere(['post_category_id' => $categoryId]);
        }
        if ($id !== null && $userId === null && $categoryId === null) {
            // Возвращаем пост по id без дополнительных параметров
            $post = $query->one(); // Получаем один пост по id

            if ($post) {
                return $this->returnSuccess([
                    'post' => $post,
                ]);
            } else {
                return $this->returnError('Пост не найден.');
            }
        }

        // Пагинация
        $posts = $query->offset($firstItem)->limit($itemCount)->all();

        return $this->returnSuccess([
            'posts' => $posts,
            'total_count' => $query->count(), // Общее количество постов, соответствующих фильтрам
            'first_item' => $firstItem,
            'item_count' => count($posts), // Количество возвращаемых постов
        ]);
    }
}