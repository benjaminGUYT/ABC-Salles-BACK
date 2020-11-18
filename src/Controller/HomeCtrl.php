<?php

    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    class HomeCtrl extends AbstractController {

        /**
         * @Route("/")
         */
        public function index() {
           return $this->redirect("http://localhost:8000/api");
        }
    }

?>