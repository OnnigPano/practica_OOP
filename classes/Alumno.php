<?php

    class Alumno 
    {
        private $nombre;
        private $apellido;
        private $codigoAlumno;
        private $cursosInscripto = [];

        public function __construct(string $nombre, string $apellido, int $codigoAlumno)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->codigoAlumno = $codigoAlumno;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function getCodigoAlumno()
        {
            return $this->codigoAlumno;
        }

        public function setNombre(string $nombre)
        {
            $this->nombre = $nombre;
        }

        public function setApellido(string $apellido)
        {
            $this->apellido = $apellido;
        }

        public function setCodigoAlumno(int $codigo)
        {
            $this->codigoAlumno = $codigo;
        }

        //Seteamos los cursos que vienen de class DigitalHouseManager al inscribir al alumno
        //Devuelve solo los cursos sin los detalles ya que genera RECURSION
        public function setCursosInscripto(string $nuevoCurso)
        {
            $this->cursosInscripto[] = $nuevoCurso;
        }
        
        public function getCursosInscripto()
        {
                return $this->cursosInscripto;
        }
    }
    