<?php 
$this->layout('Layout', ['title' => '500'], ['mainContent' => $this->fetch('Layout')]);
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
            <h1 class="display-3 fw-bold">Error 500</h1>
            <p class="lead pt-3">Sorry, we couldn't connect to the database. <br class="d-none d-sm-block"> The configuration (such as database name or credentials) may be incorrect or missing.</p>
        </div>
    </div>
</div>

<?php $this->stop() ?>