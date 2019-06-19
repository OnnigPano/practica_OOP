<?php

    require_once 'Profesor.php';

    class ProfesorAdjunto extends Profesor
    {
        private $horasConsulta;

        public function getHorasConsulta()
        {
            return $this->horasConsulta;
        }

        public function setHorasConsulta(int $horas)
        {
            $this->horasConsulta = $horas;
        }
        
    }
    