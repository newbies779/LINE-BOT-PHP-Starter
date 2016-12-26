<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c6ceef18bfc41a67908c60498567f5c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c6ceef18bfc41a67908c60498567f5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c6ceef18bfc41a67908c60498567f5c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
