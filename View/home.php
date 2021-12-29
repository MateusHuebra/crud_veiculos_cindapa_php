<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Veículos - Home</title>
    <link href="/View/css/default.css" rel="stylesheet"/>
    <script src="/View/script/home.js" type="text/javascript"></script>
</head>
<body class="container">
    
    <div style="text-align:center;">
        <label style="vertical-align: middle; font-size: x-large;">Veículos | </label>
        <a style="font-size: small;" href="/auth/login" onclick="clearCharacteristics()">deslogar</a>
        <div class="button-container">
            <h4 class="button" align="right">
                <a href="/vehicle/add">Adicionar Veículo</a>
            </h4>
        </div>
        <table class="table">
            <thead class="table-header">
                <tr>
                <th scope="col">Nº Chassi</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Placa</th>
                <th scope="col">Características</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($vehicles as $vehicle) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $vehicle['chassis_number']; ?></td>
                        <td><?php echo $vehicle['brand']; ?></td>
                        <td><?php echo $vehicle['model']; ?></td>
                        <td><?php echo $vehicle['year']; ?></td>
                        <td><?php echo $vehicle['plate']; ?></td>
                        <td><?php
                            foreach ($vehicle['characteristics'] as $characteristic) {
                                echo '<span>'.\Services\Strings::get($characteristic).'</span>';
                            }
                        ?></td>
                        <td>
                            <span class="table-button">
                                <a href="/vehicle/edit?id=<?php echo $vehicle['id']; ?>">Editar</a>
                            </span>
                            <span class="table-button tb-red">
                                <!--
                                <a href="/vehicle/delete?id=<?php echo $vehicle['id']; ?>">Deletar</a>
                                -->  
                                <a onclick='deleteDialog(<?php echo json_encode($vehicle); ?>)' href="#">Deletar</a>
                            </span>
                        </td>
                    </tr> 
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>