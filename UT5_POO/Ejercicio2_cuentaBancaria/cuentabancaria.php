<?php

    class cuentaBancaria {
        //atributos
        private $titular;
        private $saldo;

        public function __construct($titular, $saldo) {
            $this->titular = $titular;
            $this->saldo = $saldo;
        }

        
        public function getTitular(){
            return $this->titular;
        }

        public function setTitular($titular) {
        $this->titular = $titular;
        return $this;
        }

        public function getSaldo(){
            return $this->saldo;
        }

        public function setSaldo($saldo){
            $this->saldo = $saldo;
            return $this;
        }

        public function depositar($monto){
            $this->saldo += $monto;
            echo "Se ha depositado $monto en la cuenta. Saldo actual: $this->saldo<br>";
        }

        public function retirar($monto){
            $this->saldo -= $monto;
            echo "Se ha retirado $monto en la cuenta. Saldo actual: $this->saldo<br>";
        }

        public function mostrarSaldo(){
            echo "El saldo de la cuenta es: $this->saldo<br>";
        }
    }

    $cuenta1 = new cuentaBancaria("Sara", 1000);
    
    $cuenta1->depositar(1000);
    $cuenta1->retirar(300);
    $cuenta1->mostrarSaldo();




?>