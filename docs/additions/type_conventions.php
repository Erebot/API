<?php
/**

\page type_conventions Type conventions

This page describes the conventions used to represent types
in this documentation.

It is mainly inspired by PHP's own pages on
<a target="_blank" href="http://www.php.net/manual/en/language.types.php">types</a> and
<a target="_blank" href="http://php.net/manual/en/language.pseudo-types.php">pseudo-types</a>.
Whenever possible, we reuse the same definitions.
Other notations were mainly taken from Python with a small touch to make
them more PHP-ish.

\b{Note}: a lot of methods are marked as accepting/returning interfaces.
Most of the time, it means that they accept/return an object implementing
the given interface. Should ambiguities arise due to this notation, the
rest of the documentation for that method should make it clear what is
expected.

The following types are used in this documentation:

<table>
    <tr>
        <th>(Pseudo-)Type</th>
        <th>Meaning</th>
    </tr>

    <tr>
        <td>
            \c int<br/>
            \c string<br/>
            \c float<br/>
            \c bool
        </td>
        <td>
            Same as the corresponding <a target="_blank" href="http://www.php.net/manual/en/language.types.php">type</a> in PHP.
            Please note that PHP treats terms such as \a float, \a double and \a real as equivalent.
            To avoid confusion, we chose to only use the term \a float.
        </td>
    </tr>

    <tr>
        <td>
            \c callback<br/>
            \c mixed<br/>
            \c number<br/>
            \c scalar
        </td>
        <td>
            Same as the corresponding <a target="_blank" href="http://php.net/manual/en/language.pseudo-types.php">pseudo-type</a> in PHP.
        </td>
    </tr>

    <tr>
        <td>
            \c object
        </td>
        <td>
            Used to indicate any object is acceptable.
        </td>
    </tr>

    <tr>
        <td>
            <tt>list(X)</tt>
        </td>
        <td>
            Used to indicate a method accepts or returns a numerically-indexed
            array (sometimes referred to as a list, vector or collection) of
            values of type \c X.

            For example, <tt>list(Erebot\\Interfaces\\Event\\Ban)</tt> refers to a numerically-indexed
            array containing objects implementing the Erebot::Interfaces::Event::Ban interface.

            \b{Note}: recursive constructs such as <tt>list(list(int))</tt> are allowed.
        </td>
    </tr>

    <tr>
        <td>
            <tt>dict(X=>Y)</tt>
        </td>
        <td>
            Used to indicate a method accepts or returns an array indexed by keys
            of type \c X and whose values are of type \c Y (this is sometimes
            referred to as a map, hash or dictionary).

            For example, <tt>dict(string=>Erebot\\Interfaces\\Event\\Ban)</tt> refers to an
            array whose keys are <tt>string</tt>s and values are objects
            implementing the Erebot::Interfaces::Event::Ban interface.

            \b{Note}: recursive constructs such as <tt>dict(X=>dict(Y=>Z))</tt> are
            allowed.
        </td>
    </tr>
</table>

*/
