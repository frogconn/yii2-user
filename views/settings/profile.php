<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\models\HrDivision;
use app\models\HrFaculty;
use app\models\HrLevel;
use app\models\HrPosition;
use pipekung\widgets\Select2;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user->identity;
?>

<?=$this->render('/_alert', ['module' => Yii::$app->getModule('user')])?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 style="margin: 0; padding: 0;">
                    <!-- <img src="http://gravatar.com/avatar/<?=$user->profile->gravatar_id?>?s=24" class="img-rounded" alt="<?=$user->username?>"/> -->
                    <?=$user->username?>
                </h4>
            </div>
            <div class="panel-body">
                <div class="col-md-3" style="padding-top: 20px;">
                    <div class="col-md-12" style="padding: 0 0 0 20px;">
                        <div class="thumbnail">
                            <img width="100%" src="http://www.hrnetwork.kku.ac.th/testhr/photo/<?=Yii::$app->user->id?>.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

<?php $form = \yii\widgets\ActiveForm::begin([
	'id' => 'profile-form',
	'options' => ['class' => 'form-horizontal'],
	'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-2 col-lg-9\">{error}\n{hint}</div>",
		'labelOptions' => ['class' => 'col-lg-2 control-label'],
	],
	'enableAjaxValidation' => true,
	'enableClientValidation' => false,
	'validateOnBlur' => false,
]);?>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-9">

                        </div>
                        <div class="col-sm-offset-2 col-lg-9">
                            <div class="help-block"></div>
                        </div>
                    </div>

                    <?=$form->field($model, 'fullname')?>

                    <?=$form->field($model, 'address')->textarea()?>

                    <?=$form->field($model, 'telephone')?>

                    <?=Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'faculty_id', 'data' => HrFaculty::getSelectOption()])?>

                    <?=Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'position_id', 'data' => HrPosition::getSelectOption()])?>

                    <?=Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'level_id', 'data' => HrLevel::getSelectOption()])?>

                    <?=Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'division_id', 'data' => HrDivision::getSelectOption()])?>

                    <?=Select2::widget(['model' => $model, 'form' => $form, 'attr' => 'head_id', 'data' => Yii::$app->userHelpers->getUsersSelectOption()])?>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-9">
                            <?=\yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success'])?><br>
                        </div>
                    </div>
                    <?php \yii\widgets\ActiveForm::end();?>
                </div>
            </div>
        </div>
    </div>
</div>
