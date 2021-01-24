<?php

    use ApiPlatform\Core\Annotation\ApiResource;

    namespace App\Entity;

    use ApiPlatform\Core\Annotation\ApiResource;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ApiResource(
     *     collectionOperations={"get"={"method"="GET"}},
     *     itemOperations={"get"={"method"="GET"}},
     *     order={"score": "ASC"}
     * )
     * @ORM\Entity()
     */
    class V_Score {

        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column
         */
        private $pseudo;

        /**
         * @ORM\Column(type="float")
         */
        private $score;

        /**
         * @ORM\Column
         */
        private $temps;

        /**
         * @ORM\Column(type="integer")
         */
        private $nbTenta;

        /**
         * @ORM\Column(type="integer")
         */
        private $nbCartes;

        

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }


        /**
         * Get the value of score
         */ 
        public function getScore()
        {
                return $this->score;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of temps
         */ 
        public function getTemps()
        {
                return $this->temps;
        }

        /**
         * Get the value of nbTenta
         */ 
        public function getNbTenta()
        {
                return $this->nbTenta;
        }

        /**
         * Get the value of nbCartes
         */ 
        public function getNbCartes()
        {
                return $this->nbCartes;
        }
    }

?>