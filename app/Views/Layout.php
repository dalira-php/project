<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $_ENV['APP_DESCRIPTION'] ?>">
    <meta name="keywords" content="<?= $_ENV['APP_KEYWORDS'] ?>">
    <meta name="author" content="<?= $_ENV['APP_AUTHOR'] ?>">

    <link rel="shortcut icon" href="<?= $_ENV['APP_ICON'] ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <title><?= isset($title) && !empty($title) ? $this->e($title) : ($_ENV['APP_NAME'] ?? '') ?></title>
</head>

<body>

    <main>
        <?= $this->section('mainContent') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>