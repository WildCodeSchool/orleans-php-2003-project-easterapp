<?php

namespace App\Controller;

use App\Entity\Feature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeatureController extends AbstractController
{
    const MAX_PER_PAGE = 10;
    /**
     * @Route("/features", name="features")
     * @return Response
     */
    public function index(): Response
    {
        $features = $this->getDoctrine()
            ->getRepository(Feature::class)
            ->findBy(
                [],
                ['name' => 'ASC'],
                self::MAX_PER_PAGE
            );

        return $this->render('feature/index.html.twig', [
            'features' => $features,
        ]);
    }
}