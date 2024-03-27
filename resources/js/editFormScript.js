async function showEditForm(clientId) {
    // Realizar una petición AJAX para obtener los datos del cliente
    axios.get('/clients/' + clientId)
        .then(function (response) {
            var client = response.data;

            // Mostrar el formulario de edición y prellenar los campos con los datos del cliente
            document.getElementById('nameEdit').value = client.data.name;
            document.getElementById('addressEdit').value = client.data.address;
            document.getElementById('phoneEdit').value = client.data.phone;
            document.getElementById('countryEdit').value = client.data.country_id;

            // Actualizar la acción del formulario con la ruta correcta para actualizar el cliente
            var form = document.getElementById('editClientForm');
            form.action = '/clients/' + clientId;
        })
        .catch(function (error) {
            console.error('Error al obtener los datos del cliente:', error);
        });
}
