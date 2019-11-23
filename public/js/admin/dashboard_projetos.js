function changeVisibilidade(span_field, projeto_id) {
    if(span_field.innerHTML === "Visível"){
        span_field.innerHTML = "Oculto";
        span_field.style.backgroundColor = '#5541c6';
        changeVisibilidadeDB(false, projeto_id);
    } else {
        span_field.innerHTML = "Visível";
        span_field.style.backgroundColor = '#007B5E';
        changeVisibilidadeDB(true, projeto_id);
    }
}

function changeVisibilidadeDB(visibilidade, projeto_id) {
    let _token = $('input[name="_token"]').val();
    $.ajax({
        url: '/ajax/projetos/setVisibilidade',
        method: 'POST',
        data: {visibilidade: visibilidade, _token: _token, projeto_id: projeto_id},
        success: function (result) {
            console.log(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
