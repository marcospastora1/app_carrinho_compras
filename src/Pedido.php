<?php

namespace App;

use App\CarrinhoCompra;

class Pedido
{
  private $status;
  private $carrinhoCompra;
  private $valorPedido;

  public function __construct()
  {
    $this->status = 'Aberto';
    $this->carrinhoCompra = new CarrinhoCompra();
    $this->valorPedido = 0;
  }

  public function getCarrinhoCompra()
  {
    return $this->carrinhoCompra;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus(string $status)
  {
    return $this->status = $status;
  }

  public function confirmar()
  {
    if ($this->carrinhoCompra->validarCarrinho()) {
      $this->setStatus('Confirmado');
      return true;
    }
    return false;
  }
}
