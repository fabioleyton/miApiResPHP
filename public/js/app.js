$(document).ready(function () {

    // Funcion para obtener todos los usuarios
    function obtenerUsuarios() {
        $.ajax({
            url: '/usuarios',
            type: 'GET',
            success: function (usuarios) {
                $('#userList').empty();
                usuarios = JSON.parse(usuarios);
                usuarios.forEach(function (usuario) {
                    $('#userList').append(`
                        <tr>
                            <td>${usuario.id}</td>
                            <td>${usuario.nombre}</td>
                            <td>${usuario.email}</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit" data-id="${usuario.id}">Editar</button>
                                <button class="btn btn-danger btn-sm btn-delete" data-id="${usuario.id}">Eliminar</button>
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

        // Evento de clic en el botón de eliminar usuario
    $(document).on('click', '.btn-delete', function() {
        var userId = $(this).data('id');
        eliminarUsuario(userId);
    });

    // Evento de clic en el botón de editar usuario
    $(document).on('click', '.btn-edit', function() {
        var userId = $(this).data('id');
        editarUsuario(userId);
    })

    //Funcion para editar un usuario
    
    function editarUsuario(id) {
        // Obtener los detalles del usuario por su ID
    $.ajax({
        url: `/usuarios/${id}`,
        type: 'GET',
        success: function (usuario) {
            // Llenar el formulario con los detalles del usuario
            $('#nombre').val(usuario.nombre);
            $('#email').val(usuario.email);

            // Actualizar el texto y el evento del botón de enviar formulario
            $('#submitButton').text('Actualizar');
            $('#userForm').off('submit'); // Eliminar el evento de enviar formulario actual
            $('#userForm').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                actualizarUsuario(id, formData); // Llamar a la función para actualizar el usuario
                
            });
        },
        error: function () {
            alert('Error al obtener los detalles del usuario');
        }
    });
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
