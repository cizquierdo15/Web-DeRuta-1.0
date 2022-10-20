<?php

class RutaProfesional extends Ruta
    {
        private $_equipamiento;

        /*METODOS NUEVOS*/

        public function getEquipamiento()
        {
            return $this->_equipamiento;
        }


    	public function setEquipamiento($equipamiento): void
        {
            $this->_equipamiento = $equipamiento;
        }



        /*METODOS HEREDADOS*/

        /*CODIGO RUTA*/

        function getCod_ruta()
        {
            parent::getCod_ruta();
        }

        function setCod_ruta($cod_ruta): void
        {
            parent::setCod_ruta();
        }
  		
        /*NOMBRE*/

  		function getNombre()
        {
            parent::getNombre();
        }

        function setNombre($nombre): void
        {
            parent::setNombre();
        }

        /*DISTANCIA*/

        function getDistancia()
        {
            parent::getDistancia();
        }


    	function setDistancia($distancia): void
        {
            parent::setDistancia();
        }

        /*UBICACION*/

        function getUbicacion()
        {
            parent::getUbicacion();
        }


    	function setUbicacion($ubicacion): void
        {
            parent::setUbicacion();
        }

        /*DIFICULTAD*/

    	function getDificultad()
        {
            parent::getDificultad();
        }


    	function setDificultad($dificultad): void
        {
            parent::setDificultad();
        }

        /*FECHA DE BORRADO*/

    	function getFechaBorrado()
        {
            parent::getFechaBorrado();
        }


    	function setFechaBorrado($fBorrado): void
        {
            parent::setFechaBorrado();
        }