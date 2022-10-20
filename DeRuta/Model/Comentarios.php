<?php

    class Comentarios{

        private $_codComent;
        private $_codRuta;
        private $_codUsuario;
        private $_contenido;
        private $_fechaPubli;
        private $_fechaMod;
        private $_puntos;

        //codigo comentario
      	public function getcodComent(){

            return $this->_codComent;
        }


        public function setcodComent($codComent){

            $this->_codComent = $codComent;
        }

        //codigo ruta
        public function getcodRuta(){
      		
            return $this->_codRuta;
        }


        public function setcodRuta($codRuta){

            $this->_codRuta = $codRuta;
        }

        //codigo usuario
        public function getcodUser(){
      		
            return $this->_codUsuario;
        }


        public function setcodUser($codUser){

            $this->_codUsuario = $codUser;
        }

        //Contenido
        public function getContenido(){
      		
            return $this->_contenido;
        }


        public function setContenido($codContenido){

            $this->_contenido = $codContenido;
        }

        //Fecha de Publicacion

        public function getFechaPubli(){
      		
            return $this->_fechaPubli;
        }


        public function setFechaPubli($fechaPubli){

            $this->_fechaPubli = $fechaPubli;
        }

        //Fecha de modificacion

        public function getFechaMod(){
      		
            return $this->_fechaMod;
        }


        public function setFechaMod($fechaMod){

            $this->_fechaMod = $fechaMod;
        }

        //puntos

        public function getPuntos(){
      		
            return $this->_puntos;
        }


        public function setPuntos($puntos){

            $this->_puntos = $puntos;
        }
}
