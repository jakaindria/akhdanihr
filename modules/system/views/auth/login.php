<?php
    
    /* @var $this \yii\web\View */
    
    /* @var $content string */
    
    use app\assets\LoginAsset;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    $asset = LoginAsset::register($this);
    $session = Yii::$app->session;
?>

<?php
    $form = ActiveForm::begin(['action' => ['do-login'], 'method' => 'POST']);
?>
    <h1>Login</h1>

<?=
    $form->field($model, 'username', [
        'template'     => "<div>{input}{hint}{error}</div>",
    ])->textInput(['maxlength' => TRUE, 'placeholder' => 'Username'])
?>

<?=
    $form->field($model, 'password', [
        'template'     => "<div>{input}{hint}{error}</div>",
    ])->passwordInput(['maxlength' => TRUE, 'placeholder' => 'Password'])
?>

    <div>
        <?=Html::submitButton("Log In", ['class' => 'btn btn-default submit btn-block'])?>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <div>
            <h1>
                <i class="fa fa-signing"></i> <?= Html::encode($this->title ?: Yii::$app->params['applicationTitle']) ?>
            </h1>
            <p>©2018 All Rights Reserved. Akhdani Reka Solusi</p>
        </div>
    </div>

<?php ActiveForm::end(); ?>