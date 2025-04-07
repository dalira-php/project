<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita954e09c5d63b95fcf6f198a27b8b996
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'config\\' => 7,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita954e09c5d63b95fcf6f198a27b8b996::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita954e09c5d63b95fcf6f198a27b8b996::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita954e09c5d63b95fcf6f198a27b8b996::$classMap;

        }, null, ClassLoader::class);
    }
}
