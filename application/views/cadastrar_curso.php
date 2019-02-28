

<div class="container">
    <h1>Cadastro de Alunos</h1>
    <div class="row"> 
        
            <div class="col-sm-6 border" style="padding:5px; background-color:GhostWhite">
                <form action="<?= base_url('Curso/cadastrar')?>" method="POST" >
                    <label>Nome do Curso</label>
                    <input type="text" class="form-control" name="nomecurso" placeholder="Nome do Curso"><br>
                    <input type="submit" value="Cadastrar" class="btn btn-success" title="Cadastrar curso">
                </form>

            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/pessoas_planejando.jpg')?>" class="img-fluid img-thumbnail" alt="Responsive image" style="max-width: 100%; height: auto;">
            </div>
        
    </div>
</div>