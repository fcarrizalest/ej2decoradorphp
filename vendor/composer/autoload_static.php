<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80590e1b1589f9ce360c202195efd941
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit80590e1b1589f9ce360c202195efd941::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit80590e1b1589f9ce360c202195efd941::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}