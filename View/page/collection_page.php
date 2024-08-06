

<div id="collection">

<?php
    foreach($data as $key=>$content):
        for ($i=0;$i<count($content);$i++):
            $elem = $content[$i];
            $link = "#";

            if ($key=="folder"):
                $link = "?route=main/collection&folder_id=".$elem['id'];
                $path = "images/folder.png";?>
                <a href="<?=$link?>">
                    <img src="<?=$path?>" alt="">
                    <span><?=$elem['name']?></span>
                </a>
            <?
            else:
                $path = $elem['path'].$elem['hash'].$elem['extension'];
                ?>
                <a href="<?=$link?>">
                    <img src="<?=$path?>" alt="">
                </a>
            <?
            endif;
        endfor;
    endforeach;
?>
</div>