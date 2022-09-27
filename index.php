<?php

require __DIR__ . "/vendor/autoload.php";


use App\CarrinhoCompra;
use App\Item;
use App\Pedido;
use App\EmailService;

echo '<h3>Com SRP</h3>';

$pedido = new Pedido();
//--------------------------------
$item1 = new Item();
$item2 = new Item();

$item1->setDescricao('Porta Copo');
$item1->setValor(4.55);

$item2->setDescricao('Lampada');
$item2->setValor(8.32);
//--------------------------------

echo '<h4>Pedido Iniciado</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';

//--------------------------------
$pedido->getCarrinhoCompra()->adicionarItem($item1);
$pedido->getCarrinhoCompra()->adicionarItem($item2);
//--------------------------------

echo '<h4>Pedido com Itens</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';

//--------------------------------

echo '<h4>Itens do carrinho</h4>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->getItens());
echo '</pre>';
//--------------------------------

echo '<h4>Valor do pedido</h4>';
$total = 0;
foreach ($pedido->getCarrinhoCompra()->getItens() as $key => $item) {
  $total += $item->getValor();
}
echo $total;

//--------------------------------

echo '<h4>Status do Pedido</h4>';
echo ($pedido->getCarrinhoCompra()->validarCarrinho() ? 'Válido' : 'Inválido');

//--------------------------------

echo '<h4>Status do Pedido</h4>';
echo $pedido->getStatus();

//--------------------------------

echo '<h4>Confirmar pedido</h4>';
echo  $pedido->confirmar() ? 'Pedido foi Confirmado' : 'Pedido não confirmado';

//--------------------------------

echo '<h4>Status do Pedido</h4>';
echo $pedido->getStatus();

//--------------------------------

echo '<h4>Email</h4>';
if ($pedido->getStatus() == 'Confirmado') {
  echo EmailService::dispararEmail();
}


/* print_r($carrinho1->exibirItens());
echo 'Valor Total: ' . $carrinho1->exibirValorTotal();


$carrinho1->adicionarItens('Bicicleta', 750.10);
$carrinho1->adicionarItens('Geladeira', 1950.15);
$carrinho1->adicionarItens('Tapete', 350.20); 


$carrinho1->adicionarItens('TV', 2500);

echo '<br/>';
print_r($carrinho1->exibirItens());
echo 'Valor total recalculado: ' . $carrinho1->exibirValorTotal();

echo '<br/>';
echo 'status: ' . $carrinho1->exibirStatus();

echo '<br/>';
if ($carrinho1->confirmarPedido()) {
  echo 'Pedido realizado com sucesso';
} else {
  echo 'Erro na confirmação do pedido. Carrinho não possui itens';
}

echo '<br/>';
echo 'status: ' . $carrinho1->exibirStatus(); */
