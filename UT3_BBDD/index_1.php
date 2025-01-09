<?php
class Caja{ 
   	private $alto, $ancho, $largo, $contenido, $color; 


function introduce($cosa){ 
   	$this->contenido = $cosa; 
} 

function muestra_contenido(){ 
   	echo $this->contenido; 
} 

	public function getAlto(){
	return $this->alto;
	}

	public function setAlto($alto){
	$this->alto = $alto;
	return $this;
	}

   	public function getAncho(){
   	   	return $this->ancho;
   	}

   	public function setAncho($ancho){
   	   	$this->ancho = $ancho;
   	   	return $this;
   	}

   	public function getLargo(){
   	   	return $this->largo;
   	}

   	public function setLargo($largo){
   	   	$this->largo = $largo;
   	   	return $this;
   	}
	
   	public function getContenido(){
   	   	return $this->contenido;
   	}

   	public function setContenido($contenido){
   	   	$this->contenido = $contenido;
   	   	return $this;
   	}

   	public function getColor()
   	{
   	   	return $this->color;
   	}

   	public function setColor($color){
   	   	$this->color = $color;
   	   	return $this;
   	}

} 

$micaja = new Caja;

$micaja->introduce("Hooooolaaaaa"); 
$micaja->muestra_contenido();
$micaja->setColor("Rojo");

echo $micaja->getColor();


?>

