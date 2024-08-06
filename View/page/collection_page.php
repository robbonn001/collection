

<div id="collection">

<?php
    foreach($data as $key=>$content)
    for ($i=0;$i<count($content);$i++):
    $elem = $content[$i];
    $path = $elem['path'].$elem['hash'].$elem['extension'];
    ?>
    <img src="<?=$path?>" alt="">


<?endfor;?>

</div>