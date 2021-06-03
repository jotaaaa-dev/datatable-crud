<!DOCTYPE html>
<html lang="pt-br">
<?php

require'conexao.php';
?>

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <!--CSS-->    
    <link rel="stylesheet" href="media/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="media/css/bootstrap/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="media/css/fonts/font-awesome.css">
    <link rel="stylesheet" href="media/css/index.css">
    <!--Javascript-->    
    <script src="media/js/jquery-1.10.2.js"></script>
    <script src="media/js/jquery.dataTables.min.js"></script>
    <script src="media/js/dataTables.bootstrap.min.js"></script>          
    <script src="media/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div class="col-md-8 col-md-offset-2">
    <h1>Datatable de Produtos</h1>
    <br>
    <form action="indexfamilia.php" method="$_POST">
    <button type="submit" id="btnlistafamilia" class="btn btn-warning center-block">Lista de Famílias</button>
    </form>
    <br>
    <button type="button" data-toggle="modal" data-target="#modalCadFamilia" class="btn btn-info pull-left">Cadastrar Família</button>
    <button type="button" data-toggle="modal" data-target="#modalCadProduto" class="btn btn-success pull-right">Cadastrar Produto</button>
</div>
<div class="col-md-8 col-md-offset-2">    
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <br>
            <th>ID</th>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Família</th>
            <th>Medida</th>
            <th>Custo/UND</th>
            <th>Funções</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sqlProduto = 'SELECT codigo, produto, descricao, familia, unidadeMedida, custoUnitario FROM produtos ORDER BY codigo';
        foreach ($pdo->query($sqlProduto) as $row) {
            echo '
            <tr>
                <td>'.$row["codigo"].'</td>
                <td>'.$row["produto"].'</td>
                <td>'.$row["descricao"].'</td>
                <td>'.$row["familia"].'</td>
                <td>'.$row["unidadeMedida"].'</td>
                <td>'.$row["custoUnitario"].'</td>
                <td>
                <button type="button" data-toggle="modal" data-target="#modalEditProduto" class="btn btn-xs btn-warning">Editar</button>
                <button type="button" data-toggle="modal" data-target="#modalRemovProduto" class="btn btn-xs btn-danger">Apagar</button>
                </td>
            </tr>
            ';
        }
        
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Família</th>
            <th>Medida</th>
            <th>Custo/UND</th>
            <th>Funções</th>
        </tr>
        </tfoot>
    </table>        
</div>

<!-- Janela Modal para adicionar produtos na DATATABLE-->

<div id="modalCadProduto" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="form-cad-prod" action="insert.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Produto</h4>
                    <div class="modal-body">
                        <label>Preencha o nome do produto:</label>
                        <input type="text" autocomplete="off" name="produto" id="produto" class="form-control"/>
                        <br>
                        <label>Preencha a descrição do produto:</label>
                        <input type="text" autocomplete="off" name="descricao" id="descricao" class="form-control"/>
                        <br>
                        <label>Qual é a unidade de medida do produto:</label>
                        <br>
                        <input type="text" name="medida" id="medida" class="form-description"/>
                        <br>
                        <label>Qual é o custo por unidade do produto:</label>
                        <br>
                        <input type="text" autocomplete="off" name="custo" id="custo" class="form-description"/>
                        <br>
                        <br>
                        <label>Escolha a família do produto:</label>
                        <br>
                            <select required name="familia" id="familia">
                                        <option selected value="">Selecione</option>
                                        <?php
                                        $sqlFamilia = 'SELECT familia, id, sigla, descricao FROM tab_familia ORDER BY familia';
                                        foreach ($pdo->query($sqlFamilia) as $row) {
                                        echo 
                                        '<option value=' . $row["id"] . '>' . $row["familia"] . '</option>';
                                    } ?>
                            </select>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="codigo" id="codigo"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Fechar</button>
                        <input type="submit" name="add" id="add" class="btn btn-primary" value="Adicionar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Janela Modal para adicionar familias na DATATABLE-->

<div id="modalCadFamilia" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="insertfamilia.php" id="insert_fam" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Família</h4>
                    <div class="modal-body">
                        <label>Preencha o nome da família a ser cadastrada:</label>
                        <input type="text" autocomplete="off" name="familia" id="familia" class="form-control"/>
                        <br>
                        <label>Preencha a descrição da familia a ser cadastrada:</label>
                        <input type="text" autocomplete="off" name="descricaofami" id="descricaofami" class="form-control"/>
                        <br>
                        <label>Qual a sigla da família cadastrada ?</label>
                        <br>
                        <input type="text" autocomplete="off" name="siglafami" id="siglafami" class="form-description"/>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Fechar</button>
                        <input type="submit" name="addfami" id="addfami" class="btn btn-primary" value="Adicionar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Janela Modal para a edição dos produtos na DATATABLE-->

<div id="modalEditProduto" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="edit.php" id="form-edit-prod" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Produto</h4>
                    <div class="modal-body">
                        <label>Edite o nome do produto:</label>
                        <input type="text" name="produto" id="produto" class="form-control"/>
                        <br>
                        <label>Edite a descrição do produto:</label>
                        <input type="text" name="descricao" id="descricao" class="form-control"/>
                        <br>
                        <label>Qual é a unidade de medida do produto:</label>
                        <br>
                        <input type="text" name="medida" id="medida" class="form-description"/>
                        <br>
                        <label>Qual é o custo por unidade do produto:</label>
                        <br>
                        <input type="text" name="custo" id="custo" class="form-description"/>
                        <br>
                        <br>
                        <label>Escolha a família do produto:</label>
                        <br>
                        <select required name="combofamilia" id="combofamilia">
                                        <option selected value="">Selecione</option>
                                        <?php
                                        $sqlFamilia = 'SELECT familia, id, sigla, descricao FROM tab_familia ORDER BY familia';
                                        foreach ($pdo->query($sqlFamilia) as $row) {
                                        echo 
                                        '<option value=' . $row["id"] . '>' . $row["familia"] . '</option>';
                                    } ?>
                            </select>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="codigo" id="codigo"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Fechar</button>
                        <input type="submit" name="edit" id="edit" class="btn btn-primary" value="Alterar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Janela Modal para a remoção dos produtos na DATATABLE-->

<div id="modalRemovProduto" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="delete.php" id="form-edit" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Apagar Produto</h4>
                    <div class="modal-body">
                        <label>Tem certeza que deseja remover o item selecionado ?</label>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="delete_id" id="delete_id"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Não</button>
                        <input type="submit" name="remove" id="remove" class="btn btn-primary" value="Sim"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>