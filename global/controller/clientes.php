<?php
error_reporting(0);
if($_POST['action']=="createupdate"){
    $cliente = new cliente();
    print_r($_POST);
    if($_POST['id']!='')
    $cliente->read($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setBairro($_POST['bairro']);
    $cliente->setCep($_POST['cep']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setEstado($_POST['estado']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setCelular($_POST['celular']); 
    if($_POST['id']!=''){
        echo 'teste errado';
        $cliente->update();
        $texto = 'salvo';
    }else{
        echo 'teste 3';
        $cliente->create();       
        $texto = 'criado';
    }
    $res = $res = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Condominio <strong>'.$cliente->getNome().'</strong> '.$texto.' com sucesso!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    
}elseif($_GET[action]=='delete'){
    $cliente = new cliente();
    $cliente->read($_GET[id]);
    $cliente->delete();
    
}elseif($_GET[action]=='edit'){
    $clienteEdicao = new cliente();
    $clienteEdicao->read($_GET[id]);
    $nome = $clienteEdicao->getNome();
    $cpf = $clienteEdicao->getCpf();
    $endereco = $clienteEdicao->getendereco();
    $bairro = $clienteEdicao->getBairro();
    $cep = $clienteEdicao->getCep();
    $cidade = $clienteEdicao->getCidade();
    $estado = $clienteEdicao->getEstado();
    $telefone = $clienteEdicao->getTelefone();
    $celular = $clienteEdicao->getCelular();
    $id = $clienteEdicao->getId();
}

if($_POST[action]=="filtrar"){
    $clientes = cliente::search($_POST[filtro]);
}else{
    $clientes = cliente::getAll();
}

if(sizeof($clientes)){
    foreach ($clientes as $cliente) {
        $tbl .= "<p>".
            $cliente->getNome().
            " <a href='?controller=clientes&action=edit&id=".
            $cliente->getId()."'>Editar</a> ".
            "<a href='?controller=clientes&action=delete&id=".
            $cliente->getId()."'>Excluir</a>".
            "</p>";
    }
}

if($_POST[action]=='filtrar'){
    $clientes = cliente::search($_POST[filtro]);
    $qtd = sizeof($clientes);
    if ($qtd == 0) {
        $texto = 'Nenhum cliente encontrado!!!';
        $qtd = null;
    }else if ($qtd == 1) {
        $texto = 'cliente encontrado!!!';
    }else {
        $texto = 'clientes encontrados!!!';
    }
    $res = '
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>'.$qtd.'</strong> '.$texto. '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}else{
    $clientes = cliente::getAll();
    $qtd = sizeof($clientes);
    if(empty($res)) {
        $res = '
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
    Exibindo <strong>'.$qtd.'</strong> registros.
    </div>';
    }
    
}
if(sizeof($clientes)){
    $tb_head = '<table class="table lista-itens">
            <thead>
            <tr id="tr-head">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">cidade</th>
            <th scope="col">Opções</th>
            </tr>
            ';
    $tb_end = '</table>';
    foreach ($clientes as $cliente) {
        $tb_content .= '</thead>
            <tbody>
            <tr><th scope="row">'.$cliente->getId().'</th>
            <td>'.$cliente->getNome().'</td>
            <td>'.$cliente->getEndereco().'</td>
            <td>'.$cliente->getCidade().'</td>
            <td><a class="icone view" href="?controller=clientes&action=view&id='.
            $cliente->getId().'"title="Editar"><i class="fas fa-eye"></i></a>
            <a class="icone edit" href="?controller=clientes&action=edit&id='.
            $cliente->getId().'"title="Editar"><i class="fas fa-edit"></i></a>
            <a class="icone del" href="?controller=clientes&action=delete&id='.
            $cliente->getId().'"title="Deletar"><i class="fas fa-trash-alt"></i></a> </td>
            </tr>
            </tbody>';
            
    }
    $tb = $tb_head .$tb_content .$tb_end;
}
if(sizeof($clientes)){
    foreach ($clientes as $cliente) {
        $cond .= "<div class='col-xs-12 text-center'> <div class='btn-menu' onclick='location.href='?teste''> <i class='far fa-building fa-3x'></i> <p>".
            $cliente->getNome().
            "</p> <div class='mi-btn'> <a class='icone view' href='?controller=clientes&action=view&id=".
            $cliente->getId()."'title='Detalhes'><i class='fas fa-eye'></i></a>".
            "<a class='icone edit' href='?controller=clientes&action=edit&id=".
            $cliente->getId()."'title='Editar'><i class='fas fa-edit'></i></a>".
            "<a class='icone del' href='?controller=clientes&action=delete&id=".
            $cliente->getId()."'title='Deletar'><i class='fas fa-trash-alt'></i></a> </div></div></div>";
            
    }
}
?>