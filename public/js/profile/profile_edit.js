// Altera o Dropdown de cidades de acordo com o estado seleciona
$(document).ready(function(){
    $('.dynamic').change(function(){
        if($(this).val() !== ''){
            let select = $(this).attr("id");
            let value = $(this).val();
            let dependent = $(this).data('dependent');
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/ajax_cidade",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                    $('#'+dependent).html(result);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            })
        }
    })
});

