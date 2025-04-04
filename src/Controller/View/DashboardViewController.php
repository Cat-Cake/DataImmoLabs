<?php

namespace App\Controller\View;


use App\Document\TotalTransactions;
use App\Document\TypeTransactions;
use App\Document\ValueDepartmentTransactions;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardViewController extends AbstractController {

    #[Route('/', name: 'dashboard_homepage')]
    public function index(DocumentManager $dm) {

        $totalTransaction = $dm->getRepository(TotalTransactions::class)->findAll()[0];
        $typeValues = $dm->getRepository(TypeTransactions::class)->findAll();
        $deptValues = $dm->getRepository(ValueDepartmentTransactions::class)->findAll();


        return $this->render('dashboard.html.twig', [
            'totalTransactions' => $totalTransaction,
            'typeValues' => $typeValues,
            'deptValues' => $deptValues
        ]);
    }
}
