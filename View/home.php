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
    <div>
        <?php
            $last = ceil($count/10);

            $next = $page+1;
            $previous = $page-1;
            if($next>$last) {
                $next = $last;
            }
            if($previous<1) {
                $previous = 1;
            }
        ?>
        <span class="table-button tb-page">
            <a href="/home?page=1">primeira</a>
        </span>
        <span class="table-button tb-page">
            <a href="/home?page=<?php echo $previous; ?>">anterior</a>
        </span>
        <span style="margin: 0px 5px 0px 8px;">
        <?php
            $min = ((($page-1)*10)+1);
            $max = $min+9;
            if($max>$count) {
                $max = $count;
            }
            echo 'Veículos: '.$min.'-'.$max.' de '.$count;
        ?>
        </span>
        <span class="table-button tb-page">
            <a href="/home?page=<?php echo $next; ?>">próxima</a>
        </span>
        <span class="table-button tb-page">
            <a href="/home?page=<?php echo $last; ?>">última</a>
        </span>
    </div>
    
</body>
</html>