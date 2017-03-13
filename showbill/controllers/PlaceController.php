<?php

namespace app\controllers;
use Yii;
use app\models\Events;
use app\models\Places;

use yii\data\Pagination;

class PlaceController extends \yii\web\Controller
{
    public function actionView($id){
        $id = Yii::$app->request->get('id');

        $place = Places::findOne($id);

        $query = Events::find()->where(['id_place'=>$id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>3, 'forcePageParam'=>false, 'pageSizeParam'=>false]);
        $events = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('events', 'pages', 'place'));
    }

}
