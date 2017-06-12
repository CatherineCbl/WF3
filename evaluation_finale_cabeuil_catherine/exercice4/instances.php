<?php
require 'chat.php';// on appelle chat.php afin de pouvoir utiliser la methode getInfos() et instancier la class Chat définies dans ce fichier

$channel = new Chat("Channel", 5, "Noir", "femelle", "Siamois");
$felix = new Chat("Félix", 3, "Gris", "male", "Maine Coon");
$theodore = new Chat("Théodore", 4, "Blanc", "male", "Abyssin");

$channel->getInfos();
$felix->getInfos();
$theodore->getInfos();
