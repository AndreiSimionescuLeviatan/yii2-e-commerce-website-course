<?php

use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */
?>

<?php if(isset($success)&&$success): ?>
    <div class="alert aler-succes">
        Your address was successfully updated
    </div>
<?php endif ?>

<?php $addressForm = ActiveForm::begin([
    'action' => ['/profile/update-address'],
    'options' => [
        'data-pjax' => 1
    ]
]); ?>
<?= $addressForm->field($userAddress, 'address') ?>
<?= $addressForm->field($userAddress, 'city') ?>
<?= $addressForm->field($userAddress, 'state') ?>
<?= $addressForm->field($userAddress, 'country') ?>
<?= $addressForm->field($userAddress, 'zipcode') ?>
<button class="btn btn-primary">Update</button>
<?php ActiveForm::end() ?>
