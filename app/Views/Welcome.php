<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<div class="container d-flex align-items-center vh-100">
    <div class="row text-start">
        <div class="col-lg-12">
            <h1 class="display-3 fw-bold">Congratulations!</h1>
            <p class="lead pt-3">Your Dalira project has been created successfully.<br class="d-none d-sm-block">If you&rsquo;re new to Dalira, it&rsquo;s advisable to read the <a href="https://dalira.onesysteam.com/docs/1/1/1" class="text-decoration-none" target="_blank">documentation</a>.</p>
        </div>
    </div>
</div>

<?php $this->stop(); ?>