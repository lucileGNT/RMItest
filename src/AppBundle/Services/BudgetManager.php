<?php

namespace AppBundle\Services;

use AppBundle\Entity\Budget;
use AppBundle\Entity\Initiative;


class BudgetManager
{
    public function __construct($entityManager)
    {
        $this->em = $entityManager;

    }

    public function budgetExceed(){
        $totalBudget = $this->em
            ->createQueryBuilder()
            ->select('sum(b.\'value\')')
            ->from('AppBundle:Budget','b')
            ->getQuery()
            ->getSingleScalarResult();


        $totalInitiative = $this->em
            ->createQueryBuilder()
            ->select('sum(i.\'value\')')
            ->from('AppBundle:Initiative','i')
            ->getQuery()
            ->getSingleScalarResult();

        return $totalInitiative > $totalBudget;
    }


}
