<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Initiative;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class InitiativeController extends Controller
{
    public function addInitiativeAction(Request $request)
    {


    	      // replace this example code with whatever you need

        // create a task and give it some dummy data for this example
        $initiative = new Initiative();
        $initiative->setTitle('Title');
        $initiative->setValue(0);

        $form = $this->createFormBuilder($initiative)
            ->add('title', TextType::class)
            ->add('value', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($initiative);
            $em->flush();

            $message = "Successfully saved !";
    	}

        return $this->render('AppBundle:Initiative:add_initiative.html.twig', array(
            'form' => $form->createView(),
            'message' => isset($message) ? $message : ""
        ));
    }

}
