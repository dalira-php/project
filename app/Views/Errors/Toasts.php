<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container top-0 end-0 p-3">
        <?php foreach (['success', 'danger', 'warning', 'info'] as $type): ?>
            <?php if (!empty($_SESSION[$type])): ?>
                <?php foreach ($_SESSION[$type] as $message): ?>
                    <div class="toast align-items-center text-bg-<?= $type ?> mb-2 border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <?= htmlspecialchars($message) ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION[$type]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>