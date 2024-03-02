<?php

namespace App\Controller;

use App\Entity\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/todos', name: 'todo_list', methods: ['GET', 'POST'])]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        // Get the repository for the Todo entity
        $todoRepository = $entityManager->getRepository(Todo::class);
        
        // Fetch todos from the repository
        $todos = $todoRepository->findAll();
        
        // Serialize the fetched todos to array
        $serializedTodos = [];
        foreach ($todos as $todo) {
            $serializedTodos[] = [
                'id' => $todo->getId(),
                'title' => $todo->getTitle(),
                'done' => $todo->isDone(),
            ];
        }

        return $this->json($serializedTodos);
    }
}
