<?php foreach (['success', 'danger', 'warning', 'info'] as $type): ?>
    <?php if (!empty($_SESSION[$type])): ?>
        <?php foreach ($_SESSION[$type] as $message): ?>
            <div class="alert alert-<?= $type ?> alert-dismissible fade show small m-2" role="alert">
                <?= htmlspecialchars($message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION[$type]); ?>
    <?php endif; ?>
<?php endforeach; ?>