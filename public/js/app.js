$(document).ready(function () {

    // Funcion para obtener todos los usuarios
    function obtenerUsuarios() {
        $.ajax({
            url: '/usuarios',
            type: 'GET',
            success: function (usuarios) {
                $('#userList').empty();
                usuarios.forEach(function (usuario) {
                    $('#userList').append(`
                        <tr>
                            <td>${usuario.id}</td>
                            <td>${usuario.nombre}</td>
                            <td>${usuario.email}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="editarUsuario(${usuario.id})">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function () {
                alert("Error al obtener los usuarios");
            }
        });
    }

    // Funcion para agregar un nuevo usuario
    $('#userForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: '/usuarios',
            type: 'POST',
            data: formData,
            success: function (response) {
                alert('Usuario agregado correctamente');
                obtenerUsuarios();
                $('#userForm')[0].reset();
            },
            error: function () {
                alert("Error al agregar el usuario");
            }
        });
    });

    //Funcion para editar un usuario
    function editarUsuario(id) {
        // Logica para editar un usuario
    }

    // Funcion para eliminar un usuario
    function eliminarUsuario(id) {
        if (confirm('Estás seguro de eliminar este usuario')) {
            $.ajax({
                url: `/usuarios/${id}`,
                type: 'DELETE',
                success: function (response) {
                    alert(response.mensaje);
                    obtenerUsuarios();
                },
                error: function () {
                    alert('Error al eliminar el usuario');
                }
            });
        }
    }

    // Obtener todos los usuarios al cargar la página
    obtenerUsuarios();

});
