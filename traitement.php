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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <title>Teste Abc Salles </title>
</head>

<body class="container">
    <h1 class="text-center">Traitement</h1>
    
    <div class="row text-center mt-5">

        <form class="form" action="traitement.php" method="post" name="frmCSVImport" id="frmCSVImport"
            enctype="multipart/form-data">
            <div class="input-row">
                <label class="col-2 control-label">Choisissez un fichier CSV</label> 
                <input type="file" name="file" id="file" accept=".csv">
                <button class="btn btn-success" type="submit" id="submit" name="import">Import</button>

            </div>

        </form>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        </div>

    </div>



</body>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {
        console.log("ici")
	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
            console.log("ici")
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        $("#response").append("Le fichier ."+$("#file").val().toLowerCase()+" a bien été chargé");
        return false;
    });
});
</script>

</html>