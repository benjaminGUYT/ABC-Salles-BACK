<?php

    namespace App\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Repository\LieuRepository;
    use Symfony\Component\Serializer\SerializerInterface;
    use Symfony\Component\HttpFoundation\Request;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Validator\Validator\ValidatorInterface;
    use App\Entity\Lieu;


    class LieuCtrl extends AbstractController {

        /**
         * @Route("/lieu", methods={"GET"})
         */
        public function findAll(LieuRepository $lieuRep) {
            return $this->json($lieuRep->findAll(), 200, [], []);
        }

        /**
         * @Route("/lieu", methods={"POST"})
         */
        public function create(Request $req, EntityManagerInterface $emi, SerializerInterface $serializer, ValidatorInterface $validator) {
            $json = $req->getContent();

            try {

                $obj = $serializer->deserialize($json, Lieu::class, 'json');
                $err = $validator->validate($obj);
                if(count($err) > 0) return $this->json($err, 400);
                $emi->persist($obj);
                $emi->flush();
                return $this->json($obj, 201, [], []);

            } catch (NotEncodableValueException $neve) {
                return $this->json([
                    'status'=> 400,
                    'message'=> $neve.getMessage() 
                ], 400);
            }
        }
    }

?>