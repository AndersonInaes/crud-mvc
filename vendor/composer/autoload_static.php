<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb44f13edddce5d415a26edcf3250cbca
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb44f13edddce5d415a26edcf3250cbca::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb44f13edddce5d415a26edcf3250cbca::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
