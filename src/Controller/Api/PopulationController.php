<?php

namespace App\Controller\Api;


use App\Document\Populations;
use App\Document\TotalTransactions;
use App\Document\Transactions;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/populations')]
class PopulationController extends AbstractController
{
    #[Route('', name: 'api_population_list', methods: ['GET'])]
    public function list(DocumentManager $dm, Request $request): JsonResponse
    {
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = min(1000, (int) $request->query->get('limit', 1000));
        $skip = ($page - 1) * $limit;

        $population = $dm->createQueryBuilder(Populations::class)
            ->skip($skip)
            ->limit($limit)
            ->getQuery()
            ->execute();

        return $this->json([
            'page' => $page,
            'limit' => $limit,
            'count' => count($population),
            'population' => $population
        ]);
    }

    #[Route('/{id}', name: 'api_population_item', methods: ['GET'])]
    public function getOne(DocumentManager $dm, string $id): JsonResponse
    {
        $stat = $dm->getRepository(Populations::class)->find($id);

        if (!$stat) {
            return $this->json(['error' => 'Non trouvée'], 404);
        }

        return $this->json($stat);
    }
}