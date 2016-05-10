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
    public function addInitiativeAction($idBudget,Request $request)
    {

        $initiative = new Initiative();
        $initiative->setTitle('Title');
        $initiative->setIdBudget($idBudget);
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

        //Show existing initiatives
        $initiatives = $this->getDoctrine()
            ->getRepository("AppBundle:Initiative")
            ->findBy(array('id_budget' => $idBudget));


        $test = $this->container->get('BudgetExceed')->budgetExceed($idBudget);

        return $this->render('AppBundle:Initiative:add_initiative.html.twig', array(
            'form' => $form->createView(),
            'message' => isset($message) ? $message : "",
            'initiatives' => $initiatives,
            'test' => $test,
            'idBudget' => $idBudget
        ));
    }

}
