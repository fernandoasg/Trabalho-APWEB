/**
 * Apresenta Popup de confirmação e se confirmado Deleta o usuário
 * @param userid
 * @param username
 */
function deleteUser(userid, username) {

    swal({
        title: "Deletar o usuário " + username + " ?",
        text: "Esta ação é irreversivel, todos os registros do usuário serão apagados",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/profile/ ' + userid,
                    method: 'DELETE',
                    data: {id: userid, _token: _token},
                    success: function (result) {
                        console.log('Usuario de ID ' + userid + 'deletado !');

                        // Migue para sumir com o usuario da tabela sem ajax nem reload da pagina LUL
                        $('#tr_user_'+userid).hide();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
                swal("Usuário Deletado", {
                    icon: "success",
                });
            } else {
                swal("Deleção cancelada");
            }
        });

}
