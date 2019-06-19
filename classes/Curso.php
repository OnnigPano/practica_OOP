<?php

    class Curso
    {
        private $nombre;
        private $codigoCurso;
        private $profesorTitular;
        private $profesorAdjunto;
        private $cupoAlumnos;
        private $alumnosInscriptos = [];

        public function __construct(string $nombre, $titular = "El Profesor aún no fue asignado")
        {
            $this->nombre = $nombre;
            $this->profesorTitular = $titular;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getCodigoCurso()
        {
            return $this->codigoCurso;
        }

        public function setNombre(string $nombre)
        {
            $this->nombre = $nombre;
        }

        public function setCodigoCurso(int $codigo)
        {
            $this->codigoCurso = $codigo;
        }

        public function getAlumnosInscriptos()
        {
                echo "<ul> Alumnos Inscriptos:";

                foreach ($this->alumnosInscriptos as $alumno) {
                    echo "<li>" . $alumno . "</li>";
                }

                echo "</ul>";
        }

        //AGREGAR UN ALUMNO A LA LISTA
        public function agregarUnAlumno(Alumno $unAlumno)
        {   
            if( count($this->alumnosInscriptos) < $this->cupoAlumnos){
                $this->alumnosInscriptos[$unAlumno->getNombre()] = $unAlumno;
                return true;
            } else {
                return false;
            }
        }


        public function getProfesorAdjunto()
        {
                return $this->profesorAdjunto;
        }


        public function setProfesorAdjunto(ProfesorAdjunto $profesorAdjunto)
        {
                $this->profesorAdjunto = $profesorAdjunto;

        }

        public function getCupoAlumnos()
        {
                return $this->cupoAlumnos;
        }

        public function setCupoAlumnos(int $cupoAlumnos)
        {
                $this->cupoAlumnos = $cupoAlumnos;
        }

        public function getProfesorTitular()
        {
                return $this->profesorTitular;
        }

        public function setProfesorTitular(ProfesorTitular $profesorTitular)
        {
                $this->profesorTitular = $profesorTitular;
        }

        //OBTIENE LOS NOMBRES DE AMBOS PROFESORES DEL CURSO
        public function getProfesores()
        {
            return "El profesor titular es " . $this->profesorTitular . " y el profesor adjunto es " . $this->profesorAdjunto;
        }

        //eliminar Alumno
        public function eliminarAlumno(Alumno $unAlumno)
        {
            unset($this->alumnosInscriptos[$unAlumno->getNombre()]);
        }
        
    }
    