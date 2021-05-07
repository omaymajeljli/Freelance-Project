<?php
        // src/AppBundle/Entity/User.php

        namespace AppBundle\Entity;

        use FOS\UserBundle\Model\User as BaseUser;
        use Doctrine\ORM\Mapping as ORM;
        use Doctrine\Common\Collections\ArrayCollection;

        /**
         * @ORM\Entity
         * @ORM\Table(name="fos_user")
         */
        class User extends BaseUser
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;

            /**
            * @ORM\OneToMany(targetEntity="AppBundle\Entity\Job", mappedBy="user")
            */
            private $job;

            /**
            * @ORM\OneToMany(targetEntity="AppBundle\Entity\Task", mappedBy="user")
            */
            private $task;

            public function __construct()
            {
                parent::__construct();
                $this->job = new ArrayCollection();

             
            }

            public function setEmail($email)
            {
                $this->setUsername($email);
                return parent::setEmail($email);
            }
        }