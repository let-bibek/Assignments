<?php
$myfile = fopen("my-file.txt", "w") or die("Can't open file to wrire");
$someparagraphp = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae voluptatum atque laboriosam consectetur eaque facilis! Alias eum vitae adipisci, quasi dolorem molestias aliquid, cum inventore earum accusantium officiis dignissimos ullam.
    Suscipit, dolorum totam. Quae iusto itaque iste adipisci aperiam ducimus non magnam eaque excepturi dolor quas eius necessitatibus quibusdam error molestiae fugiat perferendis facere reprehenderit illum maiores, rerum officiis suscipit.
    Voluptates rerum eius saepe eligendi, vitae, quas illum amet facilis sapiente nam libero, incidunt tempore eos sed magni quae dolorum? Quia blanditiis, nihil repudiandae modi animi earum. Omnis, sit placeat.\n";
fwrite($myfile, $someparagraphp);
fclose($myfile);
$myfile = fopen("my-file.txt", "w") or die("Can't open file to wrire");
$someparagraphp = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae voluptatum atque laboriosam consectetur eaque facilis! Alias eum vitae adipisci, quasi dolorem molestias aliquid, cum inventore earum accusantium officiis dignissimos ullam.
    Suscipit, dolorum totam. Quae iusto itaque iste adipisci aperiam ducimus non magnam eaque excepturi dolor quas eius necessitatibus quibusdam error molestiae fugiat perferendis facere reprehenderit illum maiores, rerum officiis suscipit.
    Voluptates rerum eius saepe eligendi, vitae, quas illum amet facilis sapiente nam libero, incidunt tempore eos sed magni quae dolorum? Quia blanditiis, nihil repudiandae modi animi earum. Omnis, sit placeat.\n";
fwrite($myfile, $someparagraphp);
fclose($myfile);
$myfile = fopen("my-file.txt", "a") or die("Can't open file to wrire");
$text = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima sapiente possimus delectus placeat soluta tenetur quam quidem facere facilis nisi, ex ipsa alias, voluptate odit, architecto nostrum ducimus a rem.
    Dolores assumenda deserunt porro ducimus, doloremque aliquid nostrum tempora consectetur quo dolorum odio. Dolorum, consequuntur earum omnis molestias impedit nostrum. At debitis quam et, saepe nobis reprehenderit iure! Qui, voluptate.";
fwrite($myfile, $text);
fclose($myfile);
?>
<?php
// !! CODED BY BIBEK SHRESTHA
?>