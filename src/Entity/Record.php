<?php

use ApiPlatform\Core\Annotation\ApiResource;

    namespace App\Entity;

    use ApiPlatform\Core\Annotation\ApiResource;
    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * https://api-platform.com/docs/core/operations/#expose-a-model-without-any-routes
     * 
     * @ApiResource(itemOperations={
     *     "get": {
     *         "method": "GET",
     *         "controller": UnFauxController::class
     *     }
     * })
     * @ORM\Entity
     */
    class Record {

        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column
         * @Assert\NotBlank
         */
        private $pseudo;

        /**
         * @ORM\Column
         * @Assert\NotBlank
         */
        private $temps;

        /**
         * @ORM\Column(type="integer")
         * @Assert\NotBlank
         */
        private $nbTenta;

        /**
         * @ORM\Column(type="integer")
         * @Assert\NotBlank
         */
        private $nbCartes;



        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
            return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;

            return $this;
        }

        /**
         * Get the value of temps
         */ 
        public function getTemps()
        {
            return $this->temps;
        }

        /**
         * Set the value of temps
         *
         * @return  self
         */ 
        public function setTemps($temps)
        {
            $this->temps = $temps;

            return $this;
        }

        /**
         * Get the value of nbTenta
         */ 
        public function getNbTenta()
        {
            return $this->nbTenta;
        }

        /**
         * Set the value of nbTenta
         *
         * @return  self
         */ 
        public function setNbTenta($nbTenta)
        {
            $this->nbTenta = $nbTenta;

            return $this;
        }

        /**
         * Get the value of nbCartes
         */ 
        public function getNbCartes()
        {
            return $this->nbCartes;
        }

        /**
         * Set the value of nbCartes
         *
         * @return  self
         */ 
        public function setNbCartes($nbCartes)
        {
            $this->nbCartes = $nbCartes;

            return $this;
        }
    }

?>