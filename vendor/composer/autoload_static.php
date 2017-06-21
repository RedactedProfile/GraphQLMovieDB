<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf6046b98f7cf150dc26cc26a7d4a67d1
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Youshido\\GraphQL\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Youshido\\GraphQL\\' => 
        array (
            0 => __DIR__ . '/..' . '/youshido/graphql/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf6046b98f7cf150dc26cc26a7d4a67d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf6046b98f7cf150dc26cc26a7d4a67d1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
