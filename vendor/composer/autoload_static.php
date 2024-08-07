<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc8ace46bd344a4b3665a6d28dced53ea
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc8ace46bd344a4b3665a6d28dced53ea::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc8ace46bd344a4b3665a6d28dced53ea::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc8ace46bd344a4b3665a6d28dced53ea::$classMap;

        }, null, ClassLoader::class);
    }
}
