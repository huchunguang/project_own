<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd81d8a4f9cc64d7580e9abe36d1ebd45
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Swoole\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Swoole\\' => 
        array (
            0 => __DIR__ . '/..' . '/eaglewu/swoole-ide-helper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd81d8a4f9cc64d7580e9abe36d1ebd45::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd81d8a4f9cc64d7580e9abe36d1ebd45::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
