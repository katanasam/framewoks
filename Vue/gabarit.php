<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title> <?php $titre  ?></title>   <!-- Élément spécifique -->
</head>
<body>
<div id="global">
    <header>
        <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
        <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
    </header>
    <div id="contenu">
       
       <!-- CONTENU DE LA VUE 
       chaque vue va apporter sont propre contenu 
       Sachant que le contenu des vue est stocker dans leur variables [$contenu] 
       grace a ob_start, ont peut retarder l'affichaqe de la Vue--> 


        <?php $contenu ?>   <!-- Élément spécifique -->





    </div>
    <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
    </footer>
</div> <!-- #global -->
</body>
</html>