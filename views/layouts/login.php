<?php
    
    /* @var $this \yii\web\View */
    
    /* @var $content string */
    
    use app\assets\LoginAsset;
    use yii\helpers\Html;
    
    $asset = LoginAsset::register($this);
    $session = Yii::$app->session;
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title ?: Yii::$app->params['applicationTitle']) ?></title>
    
    <?php $this->head() ?>
</head>

<body class="login">
<?php $this->beginBody() ?>
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?= $content ?>
            </section>
        </div>
    </div>
</div>
<?php $this->endBody() ?>

<script>
    <?php
    $success_flash = $session->getFlash("msg_success");
    if (isset($success_flash) && !is_null($success_flash)){
    ?>
    new PNotify({
        title: 'Berhasil',
        text: "<?=$success_flash?>",
        type: 'success',
        styling: 'bootstrap3'
    });
    <?php
    }
    ?>
    
    <?php
    $success_flash = $session->getFlash("msg_error");
    if (isset($success_flash) && !is_null($success_flash)){
    ?>
    new PNotify({
        title: 'Ooops...',
        text: "<?=$success_flash?>",
        type: 'error',
        styling: 'bootstrap3'
    });
    <?php
    }
    ?>
</script>
</body>
</html>
<?php $this->endPage() ?>
