<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd60540def3980aed5c6650f583b4d8d0
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
            0 => __DIR__ . '/../..' . '/src/SEID175834',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd60540def3980aed5c6650f583b4d8d0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd60540def3980aed5c6650f583b4d8d0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
