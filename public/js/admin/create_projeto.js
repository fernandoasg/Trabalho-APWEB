
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
          content += "<input class='membro"+id+"' id='member"+id+"' name='member"+i+"' type='hidden' value='"+id+"-Analista'><div class='col-md-5 mt-2 text-right membro"+id+"'>"+nomes[i]+"</div><div class='col-md-4 mt-1 membro"+id+"'><select id='cargo"+id+"' name='cargo' class='form-control' onchange='trocaFuncao(this.id);'><option selected>Analista</option><option>Coordenador do Projeto</option><option>Desenvolvedor</option><option>Documentador</option><option>Gerente de Projetos</option><option>Suporte</option><option>Tester</option></select></div></div><div  class='col-md-1 text-center mt-2 membro"+id+"'><a id='membro"+id+"' class='btn' onclick='removeMembro(this.id);'><i class='fa fa-close'></i></a></div>";
     }

     whereToAppend.append(content)

     $("#modalAddMembros").modal("toggle")
 
 }

 function removeMembro(id){
     var elements = document.getElementsByClassName(id);
     for( var i = elements.length-1; i >= 0; i--)
          elements[i].remove();
 }

 function trocaFuncao(id){

     var funcao = $("#"+id+" option:selected").text()
     var numId = id.replace("cargo", "")

     var index = $('#member'+numId).attr("name").replace("member", "")

     $('input#member'+numId).val(index+"-"+funcao)
 }