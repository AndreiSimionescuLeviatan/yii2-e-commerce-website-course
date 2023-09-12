<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Order $model */

$this->title = 'Order #'. $model->id. ' details';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$orderAddress =$model->orderAddress;

?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'total_price',
            [
                'attribute'=>'status',
                'content'=>function($mode){
                    if($mode->status ==\common\models\Order::STATUS_PAID)
                    {
                        return Html::tag('span','Completed',['class'=>'badge badge-success']);
                    }
                    else if($mode->status ==\common\models\Order::STATUS_DRAFT)
                    {
                        return Html::tag('span','Unpaid',['class'=>'badge badge-secondary']);
                    }
                    else
                    {
                        return Html::tag('span','Failured',['class'=>'badge badge-danger']);
                    }
                }
            ],
            'firstname',
            'lastname',
            'email:email',
            'transaction_id',
            'paypal_order_id',
            'created_at',
            'created_by',
        ],
    ]) ?>

    <h4>Address</h4>

    <?= DetailView::widget([
        'model' => $orderAddress,
        'attributes' => [
            'id',
            'address',
            'city',
            'state',
            'country',
            'zipcode',
        ],
    ]) ?>
    <h4>Order Items</h4>

    <table class="table table-sm">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->orderItems as $item): ?>
            <tr>
                <td>
                    <img src="<?php echo $item->product->getImageUrl() ?>"
                         style="width: 50px;">
                </td>
                <td><?php echo $item->product_name ?></td>
                <td><?php echo $item->quantity ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->unit_price) ?></td>
                <td><?php echo Yii::$app->formatter->asCurrency($item->quantity * $item->unit_price) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
