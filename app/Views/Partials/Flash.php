<?php if (!empty($flashMessages)) : ?>
    <div class="flash-container">
        <?php foreach ($flashMessages as $type => $messages) : ?>
            <div class="alert alert-<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?> p-2 fade show flash-message" role="alert">
                <ul class="m-0">
                    <?php foreach ($messages as $message) : ?>
                        <li>
                            <p class="small m-0"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>