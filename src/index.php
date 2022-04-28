<?php

require_once("../conexao.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecar</title>
</head>

<body>

    <button><a href="cadastrar.php">Adicionar Transporte</a></button>

    <hr>

    <table>
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>CARRO</th>
            </tr>
        </thead>

        <tbody>

            <?php

            $query = $pdo->query("SELECT * FROM transportes");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }

                $id = $res[$i]['id'];

                $carro = $res[$i]['carro'];


            ?>

                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $carro ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</body>

</html>