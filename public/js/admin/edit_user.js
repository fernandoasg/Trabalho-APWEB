//TODO REMOVER CODIGO DUPLICADO
//     REFATORAR TUDO ISSO
//     APRENDER A USAR O VUE PELO AMOR DE DEUS
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
                        console.log(result);
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

    let permission_div = $('#direct-permission-' + permission_id);
    let select_permissao = $('#select-permisao');

    swal({
        title: "Remover a permissao de: " + permission_name + " do usuário: " + user_name + " ?",
        text: "Esta ação é irreversivel",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
        .then((willDelete) => {
            if (willDelete) {
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/ajax/user/removePermission',
                    method: 'POST',
                    data: {
                        user_id: user_id,
                        permission_id: permission_id,
                        permission_name: permission_name,
                        _token: _token
                    },
                    success: function (result) {
                        console.log(result);
                        permission_div.hide('slow', function () {
                            permission_div.remove();
                        });
                        select_permissao.append(`<option value="${permission_id}">${permission_name}</option>`);
                        if ($('#select-permisao option').length === 12)
                            $('#title-permissoes-diretas').text('Este usuário não tem permissões diretas associadas.');
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

function addPermissionToUser(user_id, user_name) {

    let input_permissao = $('#select-permisao option:selected');
    let permission_name = input_permissao.text();
    let permission_id = input_permissao.val();

    let _token = $('input[name="_token"]').val();

    $.ajax({
        url: '/ajax/user/addPermission',
        method: 'POST',
        data: {
            user_id: user_id,
            permission_id: permission_id,
            permission_name: permission_name,
            _token: _token
        },
        success: function (result) {
            console.log(result);
            $('#title-permissoes-diretas').text('Permissões concedidas diretamente ao usuário: ');
            addPermissionDiv(permission_id, permission_name, user_id, user_name);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}

//todo VER CONCATENACAO MELHOR E LIMPAR ESSA BOSTA
function addPermissionDiv(permission_id, permission_name, user_id, user_name) {
    let permission_id_x = "'"+permission_id+"'";
    let permission_name_x = "'"+permission_name+"'";
    let user_id_x = "'"+user_id+"'";
    let user_name_x = "'"+user_name+"'";
    $('#select-permisao option[value="' + permission_id + '"]').remove();
    document.getElementById('direct-permission-wrapper').insertAdjacentHTML('beforeend',
        '<div class="d-flex px-3 my-1 direct-permission-div" ' +
        '           id="direct-permission-'+permission_id+'">' +
        '           <h4 class="my-auto">'+ permission_name +'</h4>' +
        '           <span class="btn btn-primary btn-sm active ml-auto align-self-center"' +
        '                 role="button" aria-pressed="true"' +
        '                 onclick="removePermissionFromUser(' + user_id_x + ',' + user_name_x +',' + permission_name_x + ',' + permission_id_x +');">' +
        '           <i class="fas fa-trash"></i>' +
        '           </span>' +
        '       </div>'
    );
}

//-------------------------------------------------------- ROLES -------------------------------------------------------

function addRolesToUser(user_id, user_name) {

    let input_permissao = $('#select-roles option:selected');
    let role_id = input_permissao.val();
    let role_name = input_permissao.text();

    swal({
        title: "Adicionar o papel de: " + role_name + " para o usuário: " + user_name + " ?",
        icon: "warning",
        buttons: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/ajax/user/addRole',
                    method: 'POST',
                    data: {
                        user_id: user_id,
                        role_id: role_id,
                        role_name: role_name,
                        _token: _token
                    },
                    success: function (result) {
                        console.log(result);
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
                swal("Operação Concluida", {
                    icon: "success",
                });
            } else {
                swal("Operação cancelada");
            }
        });
}
