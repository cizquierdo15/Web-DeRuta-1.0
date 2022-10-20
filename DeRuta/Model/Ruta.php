<?php

    class Ruta
    {
        private $_codRuta;
        private $_nombre;
        private $_distancia;
        private $_ubicacion;
        private $_dificultad;
        private $_fecha_borrado;
        private $_imagen;


        public function __construct($nom,$dis,$dif,$ubi,$img){
          $this->_nombre = $nom;
          $this->_distancia = $dis;
          $this->_dificultad = $dif;
          $this->_ubicacion = $ubi;
          $this->_imagen = $img;
       }


       public function getImg()
        {
            return $this->_imagen;
        }


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


     /*AÑADIR O BORRAR RUTA*/

     public function insert() {
        // Establecemos conexion con la BD
        $conexion = DeRuta::ConnectDB();
        
        // Sentencia Insert
        $insert = "INSERT INTO rutas (cod_ruta,nombre,longitud,ubicacion,dificultad) VALUES (\"".
          "$this->_codRuta\", \"$this->_nombre\", \"$this->_distancia\",\"$this->ubicacion\",\"$this->_dificultad\",".")";
        
        // Ejecutamos la sentencia
        $conexion->exec($insert);
    }

     public function delete() {
        // Establecemos conexion con la BD
        $conexion = DeRuta::connectDB();
        
        // Sentencia para borrar el objeto
        $borrado = "DELETE FROM rutas WHERE cod_ruta=\"".$this->_cod_ruta."\"";
        
        // Ejecutamos la sentencia
        $conexion->exec($borrado);
     }   
    }
