<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/login")
     */
    public function loginAction()
    {
        // replace this example code with whatever you need

        // create a task and give it some dummy data for this example
        $user = new User();
        $user->setLogin('Enter your login');
        $user->setPassword('Enter your password');

        $form = $this->createFormBuilder($user)
            ->add('login', TextType::class)
            ->add('password', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Log in'))
            ->getForm();

        return $this->render('default/login.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
