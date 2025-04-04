<?php

namespace App\Controller\Api;


use App\Document\TotalTransactions;
use App\Document\Transactions;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/transactions')]
class TransactionController extends AbstractController
{
    #[Route('', name: 'api_transactions_list', methods: ['GET'])]
    public function list(DocumentManager $dm, Request $request): JsonResponse
    {
        $transactions = $dm->createQueryBuilder(Transactions::class)
            ->limit(1000)
            ->getQuery()
            ->execute();

        return $this->json($transactions);
    }
}