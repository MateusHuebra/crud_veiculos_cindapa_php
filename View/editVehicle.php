<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Veículos - Editar</title>
    <link href="/View/css/default.css" rel="stylesheet"/>
    <script src="/View/script/add.js" type="text/javascript"></script>
</head>
<body class="container">
    
    <div>
        <h2 align="center">Editar Veículo</h2>
        <form action="/vehicle/save" method="post" name="addVehicle">
            <input id="id" type="hidden" name="id" value="<?php echo $_GET['id'] ?>" required>