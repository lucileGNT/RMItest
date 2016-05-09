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

    public function budgetExceed($idBudget){
        $totalBudget = $this->em
            ->createQueryBuilder()
            ->select('b.\'value\'')
            ->from('AppBundle:Budget','b')
            ->where('b.id = '.$idBudget)
            ->getQuery()
            ->getSingleScalarResult();


        $totalInitiative = $this->em
            ->createQueryBuilder()
            ->select('sum(i.\'value\')')
            ->from('AppBundle:Initiative','i')
            ->where('i.id_budget = '.$idBudget)
            ->getQuery()
            ->getSingleScalarResult();

        return $totalInitiative > $totalBudget;
    }


}
