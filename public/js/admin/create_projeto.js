
$(function () {
     $('.dropdown-toggle').dropdown();
   });

function deleteUser() {

     var pessoasSelecionadas = []
     var nomes = []

     $('.custom-control-input:checkbox:checked').each(function(){
          var $this = $(this);
          var id = $this.attr("id");
          pessoasSelecionadas.push(id);
          id = id.replace("checkBox", "nome")
          nomes.push($('#'+id).html()) 
     });
     
     var whereToAppend = $("#lista-de-membros");
     whereToAppend.children().remove()
     var i;
     var content = "";
     for(i = 0; i < pessoasSelecionadas.length; i++){
          var id = pessoasSelecionadas[i].replace("checkBox", "");
          content += "<div class='col-md-5 mt-2 text-right'>"+nomes[i]+"</div><div class='col-md-4 mt-1'><select id='cargo"+id+"' class='form-control'><option selected>Analista</option><option>Coordenador do Projeto</option><option>Desenvolvedor</option><option>Documentador</option><option>Gerente de Projetos</option><option>Suporte</option><option>Tester</option></select></div></div><div class='col-md-1 text-center mt-2'><button class='btn'><i class='fa fa-close'></i></button></div>";
     }

     whereToAppend.append(content)

     $("#modalAddMembros").modal("toggle")
 
 }