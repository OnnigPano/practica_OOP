<?php

    class DigitalHouseManager  
    {
        private $listaAlumnos = [];
        private $listaProfesores = [];
        private $listaCursos = [];

        
        public function getListaCursos()
        {
                return $this->listaCursos;
        }
   
        public function getListaAlumnos()
        {
                return $this->listaAlumnos;
        }

        public function getListaProfesores()
        {
                return $this->listaProfesores;
        }


        public function altaCurso(string $nombre, int $codigoCurso, int $cupoMaximoDealumnos)
        {
            $nuevoCurso = new Curso($nombre);
            $nuevoCurso->setcodigoCurso($codigoCurso);
            $nuevoCurso->setcupoAlumnos($cupoMaximoDealumnos);
            
            $this->listaCursos[$nombre] = $nuevoCurso;

            return $nuevoCurso;
        }

        public function altaProfesorAdjunto(string $nombre, string $apellido, int $codigoProfesor, int $cantidadDeHoras)
        {
            $nuevoProfesorAdjunto = new ProfesorAdjunto($nombre, $apellido);
            $nuevoProfesorAdjunto->setCodigoProfesor($codigoProfesor);
            $nuevoProfesorAdjunto->setHorasConsulta($cantidadDeHoras);
            $nuevoProfesorAdjunto->setAntiguedad(0);

            $this->listaProfesores[$nombre] = $nuevoProfesorAdjunto;

            return $nuevoProfesorAdjunto;
        }

        public function altaProfesorTitular(string $nombre, string $apellido, int $codigoProfesor, string $especialidad)
        {
            $nuevoProfesorTitular = new ProfesorTitular($nombre, $apellido, $especialidad);
            $nuevoProfesorTitular->setCodigoProfesor($codigoProfesor);
            $nuevoProfesorTitular->setAntiguedad(0);

            $this->listaProfesores[$nombre] = $nuevoProfesorTitular;

            return $nuevoProfesorTitular;

        }

        public function altaAlumno(string $nombre, string $apellido, int $codigoAlumno)
        {
            $nuevoAlumno = new Alumno($nombre, $apellido, $codigoAlumno);

            $this->listaAlumnos[$nombre] = $nuevoAlumno;

            return $nuevoAlumno;
        }

        //Traer alumno de la lista por su código
        public function getAlumnoFromLista(int $code)
        {
            foreach ($this->listaAlumnos as $alumno) {
                if ($alumno->getCodigoAlumno() == $code) {
                    return $alumno;
                }
            }
        }

        //Traer curso de la lista por su código
        public function getCursoFromLista(int $code)
        {
            foreach ($this->listaCursos as $curso) {
                if ($curso->getCodigoCurso() == $code) {
                    return $curso;
                }
            }
        }
        

        public function inscribirAlumno($codigoAlumno, $codigoCurso)
        {   
            if ( $this->getCursoFromLista($codigoCurso)->agregarUnAlumno($this->getAlumnoFromLista($codigoAlumno)) == true ) {
                //Agregamos el curso a $cursosInscripto de Alumno
                $this->getAlumnoFromLista($codigoAlumno)->setCursosInscripto($this->getCursoFromLista($codigoCurso)->getNombre());
                echo "El alumno fue inscripto satisfactoriamente!";
            } else {
                echo "No se pudo inscribir por falta de cupos";
            } 
        }

        //Traer profesor de la lista por su código
        public function getProfesorFromLista(int $code)
        {
            foreach ($this->listaProfesores as $profesor) {
                if ($profesor->getCodigoProfesor() == $code) {
                    return $profesor;
                }
            }
        }

        public function asignarProfesores($codigoCurso, $codigoProfesorTitular, $codigoProfesorAdjunto)
        {
            $this->getCursoFromLista($codigoCurso)->setProfesorTitular($this->getProfesorFromLista($codigoProfesorTitular));
            $this->getCursoFromLista($codigoCurso)->setProfesorAdjunto($this->getProfesorFromLista($codigoProfesorAdjunto));
        }


        //Dar de baja un Curso
        public function bajaCurso(int $codigoCurso)
        {
            unset($this->listaCursos[$this->getCursoFromLista($codigoCurso)->getNombre()]);
        }
        
        //Dar de baja un Profesor
        public function bajaProfesor(int $codigoProfesor)
        {
            unset($this->listaProfesores[$this->getProfesorFromLista($codigoProfesor)->getNombre()]);
        }

       
    }
    