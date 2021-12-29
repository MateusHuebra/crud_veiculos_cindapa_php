
function deleteDialog(vehicle) {
    console.log(vehicle);
    let string = 'Tem certeza que quer deletar '+vehicle.brand+' '+vehicle.model+' de chassi número '+vehicle.chassis_number+'?';
    if (confirm(string)) {
        deleteVehicle(vehicle.id);
    } else {
        // Do nothing!
    }
}

function deleteVehicle(id) {
    let xhr = new XMLHttpRequest();
    xhr.open("DELETE", 'vehicle/delete?id='+id);
    xhr.send();
    xhr.onload = function() {
        if (xhr.status != 200) {
            alert('Algo deu errado!');
        } else {
            alert('Deletado com sucesso!');
            window.location.href = '/home';
        }
    };
    xhr.onerror = function() {
        alert('Algo deu errado!');
    };
}