<?php


/** @var \common\models\User $user*/
/** @var \common\models\UserAddress $userAddress */
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Address information
            </div>
            <div class="card-body">
                <?php Pjax::begin([
                    'enablePushState' => false
                ]) ?>
                <?php echo $this->render('user_address', [
                    'userAddress' => $userAddress
                ]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Account information
            </div>
            <div class="card-body">
                <?php Pjax::begin([
                    'enablePushState' => false
                ]) ?>
                <?php echo $this->render('user_account', [
                    'user' => $user
                ]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
</div>