<?php

/**
* Make File
*
* Create New File
*
* @return bool
*/
function mk_file( $filename ) {
    
    // if file doesn't exist, create file and close it
    if ( ! is_file( $filename ) ) {
        fclose( fopen($filename, 'x' ) );
        return true;
    }

    // file already exist 
    return false;
}

/**
 * Can Edit
 *
 * Simple login situation
 * Only for little projects
 * 
 * @return bool
 */
function can_edit() {

    if ( ! strpos( $_SERVER['REQUEST_URI'], 'index.php') ) return false;

    $what = isset($_GET['what']) ? $_GET['what'] : false;
    $add = isset($_GET['add']) ? $_GET['add'] : false;

    // this is the rule for add posts
    return $what === 'bryndzoveHalusky' && $add == 1;
}

/**
 * Plain
 * 
 * Secure
 *
 * @param  string $str
 * @return string
 */
function plain( $str )
{
    return htmlspecialchars( $str, ENT_QUOTES );
}