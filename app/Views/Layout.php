<!-- Base HTML layout for all views -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Set character encoding for proper rendering -->
    <meta charset="UTF-8">

    <!-- Ensure proper rendering on all devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta tags for SEO and app info, using environment variables -->
    <meta name="description" content="<?= htmlspecialchars($_ENV['APP_DESCRIPTION'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($_ENV['APP_KEYWORDS'] ?? '') ?>">
    <meta name="author" content="<?= htmlspecialchars($_ENV['APP_AUTHOR'] ?? '') ?>">

    <!-- Favicon of the app -->
    <link rel="shortcut icon" href="<?= htmlspecialchars($_ENV['APP_ICON'] ?? '') ?>">

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">

    <!-- Dynamic title based on current page; fallback to app name -->
    <title><?= isset($title) && !empty($title) ? $this->e($title) : ($_ENV['APP_NAME'] ?? '') ?></title>
</head>

<body>

    <!-- Main content section injected from child templates -->
    <main>
        <?= $this->section('mainContent') ?>
    </main>

    <!-- Bootstrap JS (includes Popper) via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>