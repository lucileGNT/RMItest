<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Budget;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class BudgetController extends Controller
{
    public function addBudgetAction(Request $request)
    {

    	      // replace this example code with whatever you need

        // create a task and give it some dummy data for this example
        $budget = new Budget();
        $budget->setTitle('Title');
        $budget->setValue(0);
        $budget->setStartDate(new \DateTime('tomorrow'));
        $budget->setEndDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($budget)
            ->add('title', TextType::class)
            ->add('value', TextType::class)
            ->add('startDate', DateType::class)
            ->add('endDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $validator = $this->get('validator');
            $errors = $validator->validate($budget);

            if (count($errors) > 0) {
                /*
                 * Uses a __toString method on the $errors variable which is a
                 * ConstraintViolationList object. This gives us a nice string
                 * for debugging.
                 */
                $message = (string) $errors;
            }else{

                $em = $this->getDoctrine()->getManager();
                $em->persist($budget);
                $em->flush();

                $message = "Successfully saved !";
            }
    	}

        return $this->render('AppBundle:Budget:add_budget.html.twig', array(
            'form' => $form->createView(),
            'message' => isset($message) ? $message : ""
        ));
  

    }


}
