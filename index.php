<?php
require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
Image::configure(array('driver' => 'gd'));
//require_once ('ph.php');
//echo $_REQUEST['title'];
// create Image from file
$img = Image::make('public/foo.jpg');

// write text
$img->text('The quick brown fox jumps over the lazy dog.');

// write text at position
$img->text('The quick brown fox jumps over the lazy dog.', 120, 100);

// use callback to define details
$img->text('foo', 0, 0, function($font) {
    $font->file('foo/bar.ttf');
    $font->size(24);
    $font->color('#fdf6e3');
    $font->align('center');
    $font->valign('top');
    $font->angle(45);
});

// draw transparent text
$img->text('foo', 0, 0, function($font) {
    $font->color(array(255, 255, 255, 0.5));
});
    $img->save('public/ddd.jpg');
print_r(var_dump( $_FILES['files']));
print_r(var_dump( $_POST['files']));
print_r(var_dump( $_REQUEST['files']));
//echo $_FILES['files']['error'];