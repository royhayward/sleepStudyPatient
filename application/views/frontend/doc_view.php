<?php
foreach($document as $d){
	$d = $d;
}
header("Content-length: $d->size");
header("Content-type: $d->type");
header("Content-Disposition: attachment; filename= $d->Name");
echo $d->content;
?>