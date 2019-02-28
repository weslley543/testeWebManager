
        <div class="container" >
                <h1>Cadastro de Alunos</h1>
                  <div class="row">
                        <div class="col-sm-6 border" style="padding:5px; background-color:GhostWhite">
                        <form action="<?= base_url('Aluno/cadastrar')?>" method="POST" style="witdh:500px; margin: auto">
                                <label class="col-sm2">Nome do Aluno</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">

                                <label>Curso</label>
                                        <select name="curso" class="form-control">
                                        
                                                <?php foreach($cursos as $curso){?>
                                                        <option value="<?= $curso->id_curso?>"><?= $curso->nome_do_curso?></option>
                                                <?php }?>
                                        </select>
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control", name="data_nascimento">
                                
                                
                                <label>Telefone</label>
                                <input type="tel" name="telefone" class="form-control" placeholder="Telefone" id="telefone"><br>

                                <input type="submit" value="Cadastrar" class="btn btn-success" title="Cadastrar aluno">
                          
                        </form>
                        </div>
                        <div class="col-sm-6 ">
                                <img src="<?= base_url('assets/img/usando_o_pc.jpg')?>" class="img-fluid img-thumbnail" alt="Responsive image" style="max-width: 100%; height: auto;">
                        </div>
                
                </div>
               
                
            </div>

        