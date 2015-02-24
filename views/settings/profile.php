<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use pipekung\widgets\Select2;
use app\models\HrFaculty;
use app\models\HrPosition;
use app\models\HrLevel;
use app\models\HrDivision;
use pipekung\classes\Db;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user->identity;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 style="margin: 0; padding: 0;">
                    <img src="http://gravatar.com/avatar/<?=$user->profile->gravatar_id?>?s=24" class="img-rounded" alt="<?=$user->username?>"/>
                    <?= $user->username ?>
                </h4>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'gravatar_email')->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com')) ?>

                <?= $form->field($model, 'address')->textarea() ?>

                <?= $form->field($model, 'phone') ?>

                <?= Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'faculty_id', 'data' => HrFaculty::getSelectOption()]) ?>

                <?= Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'position_id', 'data' => HrPosition::getSelectOption()]) ?>

                <?= Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'level_id', 'data' => HrLevel::getSelectOption()]) ?>

                <?= Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'division_id', 'data' => HrDivision::getSelectOption()]) ?>

                <?= Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'head_id', 'data' => Db::getUsersSelectOption()]) ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
