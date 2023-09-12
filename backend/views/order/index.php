<?php

use common\models\Order;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?php //= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <i class="fa fa-chevron-down" aria-hidden="true"></i>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'id'=>'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>[
            'class'=>\yii\bootstrap5\LinkPager::class
        ],
        'columns' => [
                [
                        'attribute'=>'id',
                        'contentOptions'=>['style'=>'width: 50px;']
                ],
            'total_price:currency',
            [
                    'attribute'=>'fullname',
                    'content'=>function($model){
                        return $model->firstname.' '.$model->lastname;
                    },

            ],
            //'email:email',
            //'transaction_id',
            //'paypal_order_id',
            'status',
            'created_at:datetime',
            [
                   'attribute'=>'status',
                    'filter'=>Html::activeDropDownList($searchModel, 'status',Order::getStatusLabels(),[
                            'class'=>'form-control',
                            'prompt'=>'All'
                    ]),
                    'content'=>function($model){
                        if($model->status ==Order::STATUS_PAID)
                        {
                            return Html::tag('span','Completed',['class'=>'badge badge-success']);
                        }
                       else if($model->status ==Order::STATUS_DRAFT)
                       {
                           return Html::tag('span','Unpaid',['class'=>'badge badge-secondary']);
                       }
                       else
                       {
                           return Html::tag('span','Failured',['class'=>'badge badge-danger']);
                       }
                    }
            ],
//            'created_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template'=>'{view}{update}{delete}'
            ],
        ],
    ]); ?>


</div>
