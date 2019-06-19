<?php

    abstract class Profesor 
    {
        protected $nombre;
        protected $apellido;
        protected $antiguedad;
        protected $codigoProfesor;

        public function __construct(string $nombre, string $apellido)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function getAntiguedad()
        {
            return $this->antiguedad;
        }

        public function getCodigoProfesor()
        {
            return $this->codigoProfesor;
        }

        public function setNombre(string $nombre)
        {
            $this->nombre = $nombre;
        }

        public function setApellido(string $apellido)
        {
            $this->apellido = $apellido;
        }

        public function setAntiguedad(int $antiguedad)
        {
            $this->antiguedad = $antiguedad;
        }

        public function setCodigoProfesor(int $codigo)
        {
            $this->codigoProfesor = $codigo;
        }


    }
    