<?php $this->layout('Layout', ['mainContent' => $this->fetch('Layout')]) ?>

<style>
    body {
        background-image: radial-gradient(#cdd9e7 1.05px, #e5e5f7 1.05px);
        background-size: 21px 21px;
    }
</style>

<?php $this->start('mainContent') ?>

<div class="container d-flex align-items-center vh-100">
    <div class="row text-start">
        <div class="col-lg-12">
            <h1 class="display-3 fw-bold">Congratulations!</h1>
            <p class="lead pt-3">Your <?= $_ENV["APP_NAME"] ?> project has been created successfully. <br class="d-none d-sm-block"> If you&rsquo;re new to <?= $_ENV["APP_NAME"] ?>, it&rsquo;s advisable to read the <a href="https://dalira.onesysteam.com/docs/1.0.0/" class="text-decoration-none" target="_blank">documentation</a>.</p>
        </div>
    </div>
</div>

<?php $this->stop() ?>