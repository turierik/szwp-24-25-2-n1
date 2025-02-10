<?php
    require_once('vendor/autoload.php');
    use Cowsayphp\Farm;
    $cow = Farm::create(\Cowsayphp\Farm\Whale::class);
    echo $cow->say("Ohmg I'm a cow!");