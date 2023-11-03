*calculatrice.php avec la méthode GET*

<!doctype html>
<!-- TP Calculatrice -->
<html>
        <head>
          <meta charset="utf-8" />                                       
                <title>Une petite calculatrice</title>
                <style type="text/css">
            body
            {
                text-align: center;
                width: 60%;
                margin: auto;
            }
       
            h1
            {
                                color: gray;
                border: 2px solid;
                border-color: blue;
                        }      

                        p
                        {
                background: #CEE3F6 ;
                color:blue;
                                font-style: italic;
                        }
                                               
            p.param
            {
                font-style: normal;
                text-align: left;
            }

            div.calculatrice
                        {
                background: #58ACFA ;
                color:white;
                font-size: 20pt;
                padding: 15px;
                border-radius: 40px;
                margin-top: 20px;
                        }

            div.calculatrice p.erreur
            {
                color: red;
            }
                </style>
        </head>
<?php
/* retourne un message d'erreur si les nombres saisis ne sont pas des nombres
            le résultat sinon */
function calculatrice($nb1, $nb2, $op)
{
    if (is_numeric($nb1) && is_numeric($nb2))
    {
        switch($op)
        {
            case "plus":
                $resultat=$nb1 + $nb2;
                break;
            case "moins" :
                $resultat=$nb1 - $nb2;
                break;
            case "div" :
                $resultat=$nb1 / $nb2;
                break;
            case "mult" :
                $resultat=$nb1 * $nb2;
                break ;
        }
        return $resultat;
    }
    else
    {
        return "Erreur : au moins un des nombres saisi n'est pas un nombre...";
    }
}
?>
        <body>
                <h1> Calculatrice  </h1>
               
        <p> Une petite calculatrice minimaliste pour pratiquer la programmation web ! Vous ne pouvez faire qu'une opération entre deux nombres.
        </p>
               
        <div class="calculatrice">
            Entrez deux nombres et l'opération choisie :
            <form name="calc" method="GET" action="calculatrice.php">
                nombre1 : <input name="nombre1" type="text" value="entrez un nombre" />
                <br />
                                <select name="choix">
                                <option value="plus">+</option>
                                <option value="moins">-</option>
                                <option value="div">/</option>
                                <option value="mult">*</option>
                                </select>
                <br />
                nombre2 : <input name="nombre2" type="text" value="entrez un nombre" />
                <br /><br />
                <input type="submit" name="action" value="calculer"></input>
            </form>

            <?php
                if (isset($_GET['action']))
                {
                    $res = calculatrice($_GET['nombre1'], $_GET['nombre2'], $_GET['choix']);
                   
                    /* pour mettre en rouge le message d'erreur */
                    if (strpos($res, "Erreur") === 0)
                    {
                        $pclass =  "class='erreur'";
                    }
                    else $pclass= " ";

                    echo "<p $pclass>Le résultat de ". $_GET['nombre1']." ". $_GET['choix']." ". $_GET['nombre2']." est $res.</p>";
                }
            ?>
        </div>
        <p class="param">
        Les paramètres transmis au serveur via le formulaire sont :<br />
            <?php
                foreach ($_GET as $nom => $valeur)
                {
                    echo "$nom = $valeur <br /> \n ";
                }
            ?>
        </p>
        </body>
</html>

*calculatrice.php avec la méthode POST*

<!doctype html>
<!-- TP Calculatrice -->
<html>
    <head>
         <meta charset="utf-8" />
        <title>Une petite calculatrice</title>
        <style type="text/css">
            body
            {
                text-align: center;
                width: 60%;
                margin: auto;
            }
       
            h1
            {
                color: gray;
                border: 2px solid;
                border-color: blue;
            }

            p
            {
                background: #CEE3F6 ;
                color:blue;
                font-style: italic;
            }
                       
            p.param
            {
                font-style: normal;
                text-align: left;
            }

            div.calculatrice
            {
                background: #58ACFA ;
                color:white;
                font-size: 20pt;
                padding: 15px;
                border-radius: 40px;
                margin-top: 20px;
            }

            div.calculatrice p.erreur
            {
                color: red;
            }
        </style>
    </head>
<?php
/* retourne un message d'erreur si les nombres saisis ne sont pas des nombres
            le résultat sinon */
function calculatrice($nb1, $nb2, $op)
{
    if (is_numeric($nb1) && is_numeric($nb2))
    {
        switch($op)
        {
            case "plus":
                $resultat=$nb1 + $nb2;
                break;
            case "moins" :
                $resultat=$nb1 - $nb2;
                break;
            case "div" :
                $resultat=$nb1 / $nb2;
                break;
            case "mult" :
                $resultat=$nb1 * $nb2;
                break ;
        }
        return $resultat;
    }
    else
    {
        return "Erreur : au moins un des nombres saisi n'est pas un nombre...";
    }
}
?>
    <body>
        <h1> Calculatrice  </h1>
       
        <p> Une petite calculatrice minimaliste pour pratiquer la programmation web ! Vous ne pouvez faire qu'une opération entre deux nombres.
        </p>
       
        <div class="calculatrice">
            Entrez deux nombres et l'opération choisie :
            <form name="calc" method="POST" action="calculatrice-post.php">
                nombre1 : <input name="nombre1" type="text" value="entrez un nombre" />
                <br />
                <select name="choix">
                <option value="plus">+</option>
                <option value="moins">-</option>
                <option value="div">/</option>
                <option value="mult">*</option>
                </select>
                <br />
                nombre2 : <input name="nombre2" type="text" value="entrez un nombre" />
                <br /><br />
                <input type="submit" name="action" value="calculer"></input>
            </form>

            <?php
                if (isset($_POST['action']))
                {
                    $res = calculatrice($_POST['nombre1'], $_POST['nombre2'], $_POST['choix']);
                   
                    /* pour mettre en rouge le message d'erreur */
                    if (strpos($res, "Erreur") === 0)
                    {
                        $pclass =  "class='erreur'";
                    }
                    else $pclass= " ";

                    echo "<p $pclass>Le résultat de ". $_POST['nombre1']." ". $_POST['choix']." ". $_POST['nombre2']." est $res.</p>";
                }
            ?>
        </div>
        <p class="param">
        Les paramètres transmis au serveur via le formulaire sont :<br />
            <?php
                foreach ($_POST as $nom => $valeur)
                {
                    echo "$nom = $valeur <br /> \n ";
                }
            ?>
        </p>
    </body>
</html>