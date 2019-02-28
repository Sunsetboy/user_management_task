<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <p>
        <strong>ID:</strong> <?php echo $model->id; ?>
    </p>
    <p>
        <strong>Name:</strong> <?php echo Html::encode($model->name); ?>
    </p>

    <?php if (sizeof($model->groups) > 0): ?>
        <p>
            <strong>Member of groups:</strong>
        </p>
        <ul>
            <?php foreach ($model->groups as $group): ?>
                <?php echo '<li>' . $group->name . '</li>'; ?>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
</div>
