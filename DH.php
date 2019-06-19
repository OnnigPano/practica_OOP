<?php 
    
    require_once 'classes/Curso.php';
    require_once 'classes/Profesor.php';
    require_once 'classes/ProfesorTitular.php';
    require_once 'classes/ProfesorAdjunto.php';
    require_once 'classes/Alumno.php';
    require_once 'classes/DigitalHouseManager.php';

    //Alta del DH manager
    $manager = new DigitalHouseManager();

    //Alta de los profesores Titulares y Adjuntos
    $manager->altaProfesorTitular("Pedro", "Perez", 1, "PHP");
    $manager->altaProfesorTitular("Maria", "Lopez", 2, "Javascript");
    $manager->altaProfesorAdjunto("Pablo", "Gonzalez", 3, 5);
    $manager->altaProfesorAdjunto("Marcelo", "Gutierrez", 4, 8);

    //Alta de los cursos
    $fullStack = $manager->altaCurso("Full Stack", 20001, 3);
    $android = $manager->altaCurso("Android", 20002, 2);
    
    //Asigacion de profesores a los cursos
    $manager->asignarProfesores(20001, 1, 3);
    $manager->asignarProfesores(20002, 2, 4);

    //Alta alumnos
    $onnig = $manager->altaAlumno("Onnig", "Panossian", 27);
    $manager->altaAlumno("Ciro", "Gonzalez", 45);
    $manager->altaAlumno("Tiago", "gonzalez", 7);

    //Inscripcion de alumnos a Full Stack
    $manager->inscribirAlumno(27, 20001);
    $manager->inscribirAlumno(45, 20001);

    //Inscripcion de alumnos a Android
    $manager->inscribirAlumno(27, 20002);
    $manager->inscribirAlumno(7, 20002);

    //Creamos e inscribimos a 3 alumnos mas a Android. Se genera error por falta de cupos
    $manager->altaAlumno("Pepito", "Pancho", 22);
    $manager->altaAlumno("Jorge", "Saraza", 9);
    $manager->altaAlumno("Carla", "Bustamante", 13);
    $manager->inscribirAlumno(22, 20002);
    $manager->inscribirAlumno(9, 20002);
    $manager->inscribirAlumno(13, 20002);

    //Eliminar Alumno del Curso
    $fullStack->eliminarAlumno($onnig);

    //Dar de baja Curso 
    $manager->bajaCurso(20002);

    //Dar de baja Profesor
    $manager->bajaProfesor(1);
    


    


    //ver los cursos donde onnig se inscribió :D
    echo "<pre>";
    var_dump($onnig->getCursosInscripto());
    echo "</pre>";
    

    
    
    
    
