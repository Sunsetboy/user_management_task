<?php

use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create a user', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'label' => 'Name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->name), Url::to(['user/view', 'id' => $data->id]));
                },
            ],
            [
                'label' => 'Groups',
                'format' => 'raw',
                'value' => function ($data) {
                    /** @var User $data */
                    $groupsNamesArray = $data->getGroupsNames();

                    return implode(', ', $groupsNamesArray);
                },
            ],
        ],
    ]); ?>
</div>
