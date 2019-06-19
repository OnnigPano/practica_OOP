<?php

    require_once 'Profesor.php';

    class ProfesorTitular extends Profesor
    {
        private $especialidad;

        public function __construct(string $nombre, string $apellido, string $especialidad)
        {
            parent::__construct($nombre, $apellido);
            $this->especialidad = $especialidad;
        }

        public function getEspecialidad()
        {
            return $this->especialidad;
        }

        public function setEspecialidad(string $especialidad)
        {
            $this->especialidad = $especialidad;
        }
    }