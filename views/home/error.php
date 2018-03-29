<?php
    /**
     * @var Exception|null $exception
     */
?>
<div class="row">
    <div class="col-xs-12 text-center">
        <div class="page-header">
            <h1>Ooops..... Terjadi kesalahan pada aplikasi!</h1>
        </div>
        
        <h3 class="text-danger" style="margin-bottom: 30px">
            <?=$exception->getMessage()?>
        </h3>

        <a href="<?=Yii::$app->getHomeUrl()?>" class="btn btn-primary"><i class="fa fa-home"></i> Kembali</a>
    </div>
</div>