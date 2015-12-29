<?php
// http://www.asahi-net.or.jp/~wv7y-kmr/memo/vim_php.html
$keywords = array(
    'if', 'else', 'elseif', 'endif', 'while', 'endwhile', 'do', 'as', 'for', 'endfor', 'foreach', 'endforeach',
    'break', 'continue', 'switch', 'endswitch', 'case', 'default', 'declare', 'enddeclare',
    'try', 'catch', 'return', 'exit', 'const', 'class', 'function',
    'require', 'include', 'require_once', 'include_once',
    'abstract', 'final', 'interface', 'private', 'protected', 'public', 'static',
    '__LINE__', '__FILE__', '__DIR__', '__FUNCTION__', '__CLASS__', '__METHOD__', '__NAMESPACE__',
    // http://php.net/manual/ja/reserved.php
    '__halt_compiler', 'and', 'array', 'callable', 'clone', 'die', 'echo', 'empty', 'eval',
    'extends', 'finally', 'global', 'goto', 'implements', 'instanceof', 'insteadof', 'isset',
    'list', 'namespace', 'new', 'or', 'print', 'throw', 'trait', 'unset', 'use', 'var',
    'xor', 'yield', '__TRAIT__', 'self', 'parent',
    'int', 'float', 'bool', 'string', 'true', 'false', 'null', 'resource', 'object', 'mixed', 'numeric'

);
$functions  = function_exists( 'get_defined_functions'   ) ? get_defined_functions()   : array();
$constants  = function_exists( 'get_defined_constants'   ) ? get_defined_constants()   : array();
$interfaces = function_exists( 'get_declared_interfaces' ) ? get_declared_interfaces() : array();
$classes    = function_exists( 'get_declared_classes'    ) ? get_declared_classes()    : array();

$arrays = array_merge(
    $keywords,
    $functions['internal'],
    array_keys( $constants ),
    $interfaces,
    $classes
);
sort( $arrays );
$arrays = array_unique( $arrays );

header('Content-Type: text/plain');
echo implode( "\n", $arrays );
