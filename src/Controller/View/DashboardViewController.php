<?php

namespace App\Controller\View;


use App\Document\CityStatistics;
use App\Document\CityTransactions;
use App\Document\CommunesCodes;
use App\Document\HotspotZones;
use App\Document\Populations;
use App\Document\TotalTransactions;
use App\Document\TotalValues;
use App\Document\Transactions;
use App\Document\TypeTransactions;
use App\Document\ValueDepartment;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardViewController extends AbstractController {

    #[Route('/', name: 'dashboard_homepage')]
    public function index(DocumentManager $dm) {

        $totalTransaction = $dm->getRepository(TotalTransactions::class)->findAll()[0];
        $totalValues = $dm->getRepository(TotalValues::class)->findAll()[0];
        $typeValues = $dm->getRepository(TypeTransactions::class)->findAll();
        $deptValues = $dm->getRepository(ValueDepartment::class)->findAll();
        $hotspotValues = $dm->getRepository(HotspotZones::class)->findBy([], ['croissance' => 'DESC']);
        $cityTransactions = $dm->getRepository(CityTransactions::class)
            ->createQueryBuilder()
            ->sort('value', 'DESC')
            ->limit(1)
            ->getQuery()
            ->getSingleResult();
        $totalCommunes = $dm->getRepository(CommunesCodes::class)->findAll();
        $priceStats = $dm->getRepository(CityStatistics::class)
            ->createQueryBuilder()
            ->sort('prix_moyen_m2', 'DESC')
            ->limit(10)
            ->getQuery()
            ->execute();

        return $this->render('dashboard.html.twig', [
            'totalTransactions' => $totalTransaction,
            'totalValues' => $totalValues,
            'typeValues' => $typeValues,
            'deptValues' => $deptValues,
            'hotspotValues' => $hotspotValues,
            'cityTransactions' => $cityTransactions,
            'totalCommunes' => $totalCommunes,
            'priceStats' => $priceStats,
        ]);
    }
}
