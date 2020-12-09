<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <title>Teste Abc Salles </title>
</head>

<body class="container h-100">
    <h1 class="text-center">Exercice C (Recherche)</h1>
    <form action="recherche.php" method="GET">
        <div class="md-form mb-3 mt-0">
            <input class="form-control" type="text" name="query" placeholder="Prénom">
        </div>
        <div class="text-center">
            <input class="btn btn-success" type="submit" value="Rechercher" />
        </div>
    </form>

    <?php 
        require 'database.php';
        $db = DataBase::Connect();
        if(isset($_GET['query']) && !empty($_GET['query'])){
            $query = $_GET['query'];
            $query = htmlspecialchars($query);
            $result = $db->query("SELECT * FROM ref_prenoms
            WHERE (`label` LIKE '".$query."%')");
            ?>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Origin</th>
                  </tr>
                </thead>
                <tbody>
            <?php
            while($item = $result->fetch()){
                echo '
            
                  <tr>
                    <td scope="row">'.$item["label"].'</td>
                    <td class="bg-'.(
                        (($item["type"] == 1)? 'info'
                         :($item["type"] == 2 ?'danger':'white'))
                    ).'" scope="row">'
                        .
                        
                        (
                            (($item["type"] == 1)? 'Masculin'
                             :($item["type"] == 2 ?'Feminin':'Ambigu'))
                        )
                        .
                    '</td>
                    <td scope="row">'
                        .
                            (($item["genre"] == 1)? 'Masculin':'Feminin')
                        .
                    '</td>
                    <td scope="row">'.$item["origin"].'</td>
                  </tr>  
                ';
              
            }
            ?>
            </tbody>
          </table>
            <?php
        }
        

    ?>
    


</body>

</html>