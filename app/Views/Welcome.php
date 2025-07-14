<?php
// Extend the base layout named 'Layout' and pass the 'mainContent' section fetched from the same layout
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
?>

<?php
// Start defining the content for the 'mainContent' section
$this->start('mainContent');
?>

<div class="container d-flex align-items-center vh-100">
    <div class="row text-start">
        <div class="col-lg-12">
            <h1 class="display-3 fw-bold">Congratulations!</h1>
            <p class="lead pt-3">Your Dalira project has been created successfully.<br class="d-none d-sm-block">If you&rsquo;re new to Dalira, it&rsquo;s advisable to read the <a href="https://dalira.onesysteam.com/docs/1/0/0" class="text-decoration-none" target="_blank">documentation</a>.</p>
        </div>
    </div>
</div>

<?php
// End the 'mainContent' section
$this->stop();
?>