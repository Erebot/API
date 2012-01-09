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

foreach (array($package, $compatible) as $obj) {
    $obj->dependencies['required']->php->min = '5.2.2';
    $obj->stability['api'] = 'stable';
    $obj->license['name'] = 'GPL';
    $obj->license['uri'] = 'http://www.gnu.org/licenses/gpl-3.0.txt';

    // Add dependencies on extensions.
    foreach ($exts as $req => $data)
        foreach ($data as $ext)
            $obj->dependencies[$req]->extension[$ext]->save();
}

