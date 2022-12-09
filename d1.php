<?php
$type = 'application/x-compressed';
$filename="1.rar";
$id=77;
header("Content-Type: $type");
header("Content-Disposition: attachment; filename=$filename");

readfile("amozesh/$id/$filename");