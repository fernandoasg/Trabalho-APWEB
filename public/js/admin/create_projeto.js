
var papeisDisponiveis = []
var idDosPapeis = []

$(document).ready(function(){
     var elementodefuncoes = document.getElementsByClassName('possivel-funcao')
     console.log(elementodefuncoes.length)

     for( var i = 0; i < elementodefuncoes.length; i++){
          var idPapel = elementodefuncoes[i].id.replace("possivel", "")
          var papel = $('input#possivel'+idPapel).val()
          papeisDisponiveis[i] = papel
          idDosPapeis[i] = idPapel
          console.log(idPapel + "  " + papel)
     }
});

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
          content += "<input class='membro"+id+"' id='member"+id+"' name='member"+i+"' type='hidden' value='"+id+"-"+idDosPapeis[0]+"'><div class='col-md-5 mt-2 text-right membro"+id+"'>"+nomes[i]+"</div><div class='col-md-4 mt-1 membro"+id+"'><select id='cargo"+id+"' name='cargo' class='form-control' onchange='trocaFuncao(this.id);'>" 
          content += "<option selected>"+papeisDisponiveis[0]+"</option>";
          for( var j = 1; j < papeisDisponiveis.length; j++){
               content += "<option>"+papeisDisponiveis[j]+"</option>";
          }
          content += "</select></div></div><div  class='col-md-1 text-center mt-2 membro"+id+"'><a id='membro"+id+"' class='btn' onclick='removeMembro(this.id);'><i class='fa fa-close'></i></a></div>";
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
     var papelId = 0;

     for(var i =0; i < papeisDisponiveis.length; i++){
          if(papeisDisponiveis[i] === funcao){
               papelId = idDosPapeis[i]
               break;
          }
     }
     console.log(numId+"-"+papelId)
     $('input#member'+numId).val(numId+"-"+papelId)
 }