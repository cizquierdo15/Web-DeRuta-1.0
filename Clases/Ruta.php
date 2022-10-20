<?php

    class Ruta
    {
        private $_codRuta;
        private $_nombre;
        private $_distancia;
        private $_ubicacion;
        private $_dificultad;
        private $_fecha_borrado;

        /*CODIGO RUTA*/

    public function getCod_ruta()
        {
            return $this->_login;
        }


    public function setCod_ruta($cod_ruta): void
        {
            $this->_codRuta = $cod_ruta;
        }

        /*NOMBRE*/

    public function getNombre()
        {
            return $this->_nombre;
        }


    public function setNombre($nombre): void
        {
            $this->_nombre = $nombre;
        }

        /*DISTANCIA*/

    public function getDistancia()
        {
            return $this->_distancia;
        }


    public function setDistancia($distancia): void
        {
            $this->_distancia = $distancia;
        }

        /*UBICACION*/

    public function getUbicacion()
        {
            return $this->_ubicacion;
        }


    public function setUbicacion($ubicacion): void
        {
            $this->_ubicacion = $ubicacion;
        }

        /*DIFICULTAD*/

    public function getDificultad()
        {
            return $this->_dificultad;
        }


    public function setDificultad($dificultad): void
        {
            $this->_dificultad = $dificultad;
        }

        /*FECHA DE BORRADO*/

    public function getFechaBorrado()
        {
            return $this->_fecha_borrado;
        }


    public function setFechaBorrado($fBorrado): void
        {
            $this->_fecha_borrado = $fBorrado;
        }



