

<div id="collection">

<?php
    foreach($data as $key=>$content):
        for ($i=0;$i<count($content);$i++):
        $elem = $content[$i];
        $path = $elem['path'].$elem['hash'].$elem['extension'];
        ?>
        <!-- <img src="<?=$path?>" alt="" data-id="<?=$elem['id']?>" data-type="<?=$key?>"> -->
        <a href="<?php
        ($key=="folder")? "?route=main/collection&folder_id=".$elem['id']:"#"
        ?>">
            <img src="<?=$path?>" alt="">
        </a>
        

<?endfor;
endforeach;?>

</div>