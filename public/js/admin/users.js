/**
 * Deleta o usuário
 * @param userid
 */
function deleteUser(userid){
    $.ajax({
        url: '/profile/' + userid,
        method: 'DELETE',
        type: 'DELETE',
        data: {id: userid},
        success: function(result) {
            alert('sucesso');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
