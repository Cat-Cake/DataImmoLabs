<?php

namespace App\Controller\Api;


use App\Document\Populations;
use App\Document\TotalTransactions;
use App\Document\Transactions;
use App\Document\ValueDepartment;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/department')]
class DepartmentController extends AbstractController
{
    #[Route('', name: 'api_value_department_list', methods: ['GET'])]
    public function list(DocumentManager $dm, Request $request): JsonResponse
    {
        $population = $dm->createQueryBuilder(ValueDepartment::class)
            ->getQuery()
            ->execute();

        return $this->json($population);
    }

    #[Route('/{id}', name: 'api_value_department_item', methods: ['GET'])]
    public function getOne(DocumentManager $dm, string $id): JsonResponse
    {
        $stat = $dm->getRepository(ValueDepartment::class)->find($id);

        if (!$stat) {
            return $this->json(['error' => 'Non trouvée'], 404);
        }

        return $this->json($stat);
    }
}