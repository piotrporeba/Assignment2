<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Student;
use App\Repository\StudentRepository;

class StudentController extends Controller
{


    /**
     * @Route("/student", name="student_show")

    public function showAction()
    {

        $student = new Student(1, 'Matt', 'Smith');

        $template = 'student/show.html.twig';

        $args=[
            'student' => $student
        ];

        // replace this line with your own code!
        return $this->render($template, $args);
    }
*/
    /**
     * @Route("/student", name="student_list")
     */
    public function listAction()
    {

        $studentRepository =new StudentRepository();
        $students =$studentRepository->findAll();

        $template = 'student/list.html.twig';

        $args=[
            'students' => $students
        ];

        return $this->render($template, $args);

    }

    /**
     * @Route("/student/{id}", name="student_show")
     */
    public function showAction($id){

        $studentRepository =new StudentRepository();
        $student = $studentRepository->find($id);
        $template = 'student/show.html.twig';
        $args=[
            'student' => $student
        ];
        return $this->render($template, $args);

    }



}
