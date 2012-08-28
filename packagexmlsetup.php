<?php

/**
 * Extra package.xml settings such as dependencies.
 * More information: http://pear.php.net/manual/en/pyrus.commands.make.php#pyrus.commands.make.packagexmlsetup
 */

$exts = array(
    'required' => array(
        'ctype',
        'dom',
        'intl',
        'libxml',
        'pcre',
        'Reflection',
        'SimpleXML',
        'sockets',
        'SPL',
        'xml',
    ),
    'optional' => array(
        'openssl',
        'pcntl',
        'posix',
    ),
);

// This only applies to Pyrus (PEAR2).
$package->dependencies['required']->pearinstaller->min = '2.0.0a3';

$data_dir = array(
    'tasks:replace' => array(
        'attribs' => array(
            'from'  => '@data_dir@',
            'to'    => 'data_dir',
            'type'  => 'pear-config'
        )
    )
);

foreach (array($package, $compatible) as $obj) {
    $obj->dependencies['required']->php->min = '5.2.2';
    $obj->stability['api'] = 'stable';
    $obj->license['name'] = 'GPL';
    $obj->license['uri'] = 'http://www.gnu.org/licenses/gpl-3.0.txt';

    // Add dependencies on extensions.
    foreach ($exts as $req => $data)
        foreach ($data as $ext)
            $obj->dependencies[$req]->extension[$ext]->save();

    // FIXME: $package needs the original filenames,
    // while $compatible wants the logical filenames.
    if ($obj === $compatible) {
        $scriptDir  = 'script';
        $srcDir     = 'php';
        $docDir     = 'doc';
    }
    else {
        $scriptDir  = 'scripts';
        $srcDir     = 'src';
        $docDir     = 'docs';
    }

    $obj->files["$srcDir/Erebot/Utils.php"] = array_merge_recursive(
        $obj->files["$srcDir/Erebot/Utils.php"]->getArrayCopy(),
        $data_dir
    );
}

