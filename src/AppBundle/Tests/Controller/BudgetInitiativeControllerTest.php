<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Budget;
use AppBundle\Entity\Initiative;
use AppBundle\Repository\BudgetRepository;
use AppBundle\Repository\InitiativeRepository;

class BudgetInitiativeControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testUnit()
    {

        $repo = new BudgetRepository();
        $date_start = new \Datetime();
        $date_end = new \Datetime();
        $budget = $repo->phpUnitAddBudget('New Budget','1000',$date_start,$date_end);

        $repoIni = new InitiativeRepository();
        $budget = $repoIni->phpUnitAddInitiative('New Initiative','200',$budget->getId());
        $this->assertEquals(false, $this->container->get('BudgetExceed')->budgetExceed($budget->getId()));

        $budget = $repoIni->phpUnitAddInitiative('New Initiative','800',$budget->getId());
        $this->assertEquals(false, $this->container->get('BudgetExceed')->budgetExceed($budget->getId()));

        $budget = $repoIni->phpUnitAddInitiative('New Initiative','200',$budget->getId());
        $this->assertEquals(true, $this->container->get('BudgetExceed')->budgetExceed($budget->getId()));

    }

}
