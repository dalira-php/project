<?php 
$this->layout('Layout', ['title' => '404'], ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent'); 
?>

<style>
    body {
        background-image: radial-gradient(#cdd9e7 1.05px, #e5e5f7 1.05px);
        background-size: 21px 21px;
    }
</style>

<div class="container d-flex align-items-center vh-100">
    <div class="row text-start">
        <div class="col-lg-12">
            <h1 class="display-3 fw-bold">Error 404</h1>
            <p class="lead pt-3">Sorry, the page you're looking for could not be found. <br class="d-none d-sm-block"> The resource (view or route) you're trying to access may not exist.</p>
        </div>
    </div>
</div>

<?php $this->stop() ?>