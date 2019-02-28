<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->usersCount === 0): ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php else:?>
            <span class="text-muted">You can't delete a group with more than zero users</span>
        <?php endif; ?>
    </p>

    <p>
        <strong>ID:</strong>
        <?php echo $model->id; ?>
    </p>
    <p>
        <strong>Name:</strong>
        <?php echo Html::encode($model->name); ?>
    </p>
    <p>
        <strong>Members count:</strong>
        <?php echo $model->usersCount; ?>
    </p>

</div>
