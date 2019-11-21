function removeRoleFromUser(userid, username, rolename, roleid) {

    swal({
        title: "Remover a funcão de: " + rolename + " do usuário: " + username + " ?",
        text: "Esta ação é irreversivel",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/ajax/user/removeRole',
                    method: 'POST',
                    data: {user_id: userid, role_id: roleid, role_name: rolename, _token: _token},
                    success: function (result) {
                        console.log('SUCESSO');

                        // Migue para sumir com o usuario da tabela sem ajax nem reload da pagina LUL
                        $('#role-div-' + roleid).hide('slow');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
                swal("Remoção Concluida", {
                    icon: "success",
                });
            } else {
                swal("Remoção cancelada");
            }
        });

}

function removePermissionFromUser(user_id, user_name, permission_name, permission_id) {

    swal({
        title: "Remover a permissao de: " + permission_name + " do usuário: " + user_name + " ?",
        text: "Esta ação é irreversivel",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/ajax/user/removePermission',
                    method: 'POST',
                    data: {user_id: user_id, permission_id: permission_id, permission_name: permission_name, _token: _token},
                    success: function (result) {
                        console.log(result);

                        // Migue para sumir com o usuario da tabela sem ajax nem reload da pagina LUL
                        $('#role-div-' + user_id).hide();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
                swal("Remoção Concluida", {
                    icon: "success",
                });
            } else {
                swal("Remoção cancelada");
            }
        });
}
