<?php

$nome = $cpf = $endereco = $bairro = $cep = "";
$cidade = $estado = $telefone = $celular = $id = "";

$action = "";
if(isset($_GET['action'])) $action = $_GET['action'];
if($action=="createupdate"){
    $cliente = new cliente();
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
        $cliente->update();
        $texto = 'atualizado';
    }else{
        $cliente->create();       
        $texto = 'cadastrado';
    }
    echo $res = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    Cliente <strong>'.$cliente->getNome().'</strong> '.$texto.' com sucesso!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // header('location: ./view/cadastroCliente.php');
    
    
}elseif($action=='delete'){
    $cliente = new cliente();
    $cliente->read($_GET[id]);
    $cliente->delete();
    
}elseif($action=='edit'){
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

    $tb_content= "";
    $clientes = cliente::getAll();
    if(sizeof($clientes)){
    $tb_head = '<table class="table lista-itens">
    <thead>
    <tr id="tr-head">
    <th scope="col">#</th>
    <th scope="col">Nome</th>
    <th scope="col">Endereço</th>
    <th scope="col">cidade</th>
    <th scope="col">Opções</th>
    </tr>';
    foreach ($clientes as $cliente){
    $tb_content .= '</thead>
    <tbody>
    <tr><th scope="row">'.$cliente->getId().'</th>
    <td>'.$cliente->getNome().'</td>
    <td>'.$cliente->getEndereco().'</td>
    <td>'.$cliente->getCidade().'</td>
    <td><a class="icone view" href="?controller=clientes&action=view&id='.
                $cliente->getId().'"title="view"><i class="fas fa-eye"></i></a>
                <a class="icone edit" href="?controller=clientes&action=edit&id='.
                $cliente->getId().'"title="Editar"><i class="fas fa-edit"></i></a>
                <a class="icone del" href="?controller=clientes&action=delete&id='.
                $cliente->getId().'"title="Deletar"><i class="fas fa-trash-alt"></i></a> </td>
                </tr>
                </tbody>';
    }
     $tb_end = '</table>';
     $tb = $tb_head . $tb_content . $tb_end;
    }
include './view/cadastroCliente.php';
echo $tb;
?>