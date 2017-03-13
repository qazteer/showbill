<?php

namespace app\controllers;
use app\models\Events;
use app\models\Places;
use app\models\Shows;
use yii\data\Pagination;

class EventsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $query = Events::find()->orderBy(['date' => SORT_ASC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $events = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('events', 'pages'));
    }

    public function actionPlaces()
    {
        
        $query = Places::find()->orderBy(['id' => SORT_ASC]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $places = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('places', compact('places', 'pages'));
    }

}
