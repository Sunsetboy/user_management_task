<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'label' => 'Name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->name), Url::to(['user-group/view', 'id' => $data->id]));
                },
            ],
            [
                'label' => 'Users count',
                'value' => function ($data) {
                    return (int)$data->usersCount;
                },
            ],
        ],
    ]); ?>
</div>
