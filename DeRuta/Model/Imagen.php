<?php

    class Imagen
    {
        private $_codigoImagen;
        private $_nombre;
        private $_fechaInsercion;
        private $_imagen;

        public function __construct($_codigoImagen, $_nombre, $_fechaInsercion, $_imagen)
        {
            $this->_codigoImagen = $_codigoImagen;
            $this->_nombre = $_nombre;
            $this->_fechaInsercion = $_fechaInsercion;
            $this->_imagen = $_imagen;
        }

        /**
         * @return mixed
         */
        public function getCodigoImagen()
        {
            return $this->_codigoImagen;
        }

        /**
         * @param mixed $codigoImagen
         */
        public function setCodigoImagen($codigoImagen): void
        {
            $this->_codigoImagen = $codigoImagen;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->_nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre): void
        {
            $this->_nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getFechaInsercion()
        {
            return $this->_fechaInsercion;
        }

        /**
         * @param mixed $fechaInsercion
         */
        public function setFechaInsercion($fechaInsercion): void
        {
            $this->_fechaInsercion = $fechaInsercion;
        }

        /**
         * @return mixed
         */
        public function getImagen()
        {
            return $this->_imagen;
        }

        /**
         * @param mixed $imagen
         */
        public function setImagen($imagen): void
        {
            $this->_imagen = $imagen;
        }
    }