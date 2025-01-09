<?php

interface MetodoPago {

    public function pagar ($monto);

}

class PagoTarjeta implements MetodoPago {

    public function pagar($monto){
        echo "Pago con tarjeta de crédito: $monto €"."<br>";
    }
}

class PagoPaypal implements MetodoPago {

    public function pagar($monto){
        echo "Pago a través de Paypal: $monto €"."<br>";
    }
}

class PagoEfectivo implements MetodoPago {

    public function pagar($monto){
        echo "Pago en efectivo: $monto €" ."<br>";
    }
}

class ProcesarPago {
    private $metodoPago;

    public function __construct(MetodoPago $metodoPago){
        $this->metodoPago = $metodoPago;
    }
      
    public function procesarPago($monto){
        $this->metodoPago->pagar($monto);
    }
}

$tarjeta = new PagoTarjeta();
$paypal = new PagoPaypal();
$efectivo = new PagoEfectivo();

// Crear el procesador de pagos con diferentes métodos
$procesadorTarjeta = new ProcesarPago($metodoPagoTarjeta);
$procesadorPaypal = new ProcesarPago($metodoPagoPaypal);
$procesadorEfectivo = new ProcesarPago($metodoPagoEfectivo);

// Procesar pagos
$procesadorTarjeta->procesarPago(100);
$procesadorPaypal->procesarPago(200);
$procesadorEfectivo->procesarPago(50);

?>
      