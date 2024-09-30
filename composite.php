<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPattern\Playlist;
use App\DesignPattern\Song;
use App\DesignPattern\Video;

$playlist = new Playlist('My Playlist');
$playlist->addItem(new Song('Song 1'));
$playlist->addItem(new Song('Song 2'));
$playlist->addItem(new Song('Song 3'));
$playlist->addItem(new Video('Video 1'));
$playlist->addItem(new Video('Video 2'));

$playlist->play();
dump($playlist);