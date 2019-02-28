
<div class="container" style="margin-top:30px;">
    
        <div clas="row">
            <div class="col-sm-12">
                        <div class=" form-row border" style="padding:5px; background-color:GhostWhite">
                            <div class="col">
                                <label>Nome do Aluno </label>
                                <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome">
                            </div>
                            <div class="col" id="cursos">
                                <label> Curso </label>
                                <select name="curso" class="form-control" id="curso">
                                    <?php foreach($cursos as $curso){?>
                                        <option value="<?= $curso->id_curso?>"><?= $curso->nome_do_curso?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <button class="btn btn-info fa fa-search" title="Buscar aluno" onclick="buscar()"></button>     
                        </div>
                
                    
                
                
            </div>
                <div class="col-sm-12">                     
                    <table class="table table-hover table-bordered" style="margin-top:5px;"id="tabelinha">
                    <tr>
                        <thead>
                            
                            <th>Aluno</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </thead>
                    </tr>  
                        <tbody class="bg-light" id="corpoTabela">
                            
                        </tbody>
                    </tr>
                    </table>
                    
                </div>  
        </div>


        <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Dados do Aluno </h4>
            </div>
                <div class="modal-body form-row" id="getCode">
                
          
                </div>
            </div>
            </div>
       </div>



    </div>
                             
   
        
        


<script>
    

    function buscar(){
        var id_curso = document.getElementById("curso").value;
        var nome_aluno = document.getElementById("nome").value;
        console.log(nome_aluno);
        
        $.ajax({
            url: "<?= base_url('Aluno/get')?>",
            type:"POST",
            data: {"id_curso" : id_curso, "nome_aluno" : nome_aluno},
            dataType:'json',
            success:function(response){
                //console.log(response);
                escrever="";
                var select = document.querySelector('select');
                var option = select.children[select.selectedIndex];
                var texto = option.textContent;
                
                try{
                    escrever+="<tr><td>"+response.nome_aluno+"</td>";
                    escrever+="<td>"+response.telefone_aluno+"</td>";
                    escrever+="<td>"+texto+"</td>";
                    // escrever+="<td><button id='infoaluno' class='btn btn-info'><i class='fa fa-edit'></i></button></td>";
                    escrever+="<td>"+"<button id='infoaluno' "+"class='btn btn-warning text-white'"+" data-id='"+response.id_aluno+"'"+">"+"<i class='fa fa-edit'></i></button></td"
                    escrever+="</tr>";
                    console.log(escrever);
                    $("#corpoTabela").append(escrever);
                }catch(err){
                    alert("Aluno não encontrado no curso selecionado");
                }
            }
            
            
        });
        
    }
    
        $(document).on('click', '#infoaluno', function(e) {
            var escrever = "";
            var id = $(this).attr("data-id");
            var dados;
            console.log(id);
                $.ajax({
                    url: "<?= base_url('Aluno/edit')?>",
                    type:"POST",
                    data: {"id" : id},
                    dataType:'json',
                    success:function(response){
                        //console.log(response);
                        var dado = response;
                        console.log("primeiro ajax");
                        escrever += "<label>Nome do Aluno</label>" + "<input class='form-control' id='nome' value='"+response.nome_aluno+"'>"; 
                        
                        
                        
                        $.ajax({
                            url: "<?= base_url('Curso/todosOsCursos')?>",
                            type:"GET",
                            dataType:'json',
                            success:function(response){
                                console.log(dado);
                                escrever+="<label>Curso</label> <select class='form-control'>"
                                for(let i=0 ; i<response.length; i++){
                                    escrever+="<option "+"value='"+response[i].id_curso+"'>"+response[i].nome_do_curso+"</option>";
                                }
                                escrever+="</select><br>";
                                escrever+="<label>Data de Nascimento</label>";
                                escrever+="<input type='date' class='form-control' "+"value='"+dado.data_nascimento+"'><br>"
                                escrever += "<label>Nome do Aluno</label>" + "<input class='form-control' id='nome' value='"+dado.telefone_aluno+"'><br>"; 
                                escrever+="<button class='btn btn-success'  style='margin-top:8px;' onclick='alterar()'>Alterar</button>"
                                
                                
                                $("#getCode").html(escrever);
                        
                                jQuery("#getCodeModal").modal('show');
                            }
                        });        
                        
                        
                    }
                
                
                });
            
        });
        
    function alterar(){
        alert("aqui");
    }
</script>
