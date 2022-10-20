<?php

    class Usuario
    {
        private $_login;
        private $_password;
        private $_nombre;
        private $_apellidos;
        private $_email;
        private $_tipo;

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->_login;
        }

        /**
         * @param mixed $login
         */
        public function setLogin($login): void
        {
            $this->_login = $login;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->_password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->_password = $password;
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
        public function getApellidos()
        {
            return $this->_apellidos;
        }

        /**
         * @param mixed $apellidos
         */
        public function setApellidos($apellidos): void
        {
            $this->_apellidos = $apellidos;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->_email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->_email = $email;
        }

        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->_tipo;
        }

        /**
         * @param mixed $tipo
         */
        public function setTipo($tipo): void
        {
            $this->_tipo = $tipo;
        }
    }