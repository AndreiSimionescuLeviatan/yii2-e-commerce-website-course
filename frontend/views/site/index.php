<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\debug\models\timeline\DataProvider;
use yii\widgets\ListView;

/** @var \yii\data\ActiveDataProvider $dataProvider*/

$this->title = 'My Yii Application';
?>
<div class="site-index">
    

    <div class="body-content">
            <?php echo ListView::widget([
                'dataProvider'=>$dataProvider,
                'layout'=>'{summary}<div class="row">{items}</div>{pager}',
                'itemView'=>'_product_item',
                // 'options'=>[
                //     'class'=>'row'
                // ],
                'itemOptions'=>[
                    'class'=>'col-lg-4 col-md-6 mb-4 product-item'
                ],
                'pager'=>[
                    'class'=>LinkPager::class
                ]
            ])?>
        
    </div>
</div>
