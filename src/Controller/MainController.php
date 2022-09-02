<?php

namespace App\Controller;

use App\Entity\School;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;

class MainController extends AbstractController
{
    /**
     * @Route("/school", name="app_main")
     */
    public function index(SerializerInterface $serializer): JsonResponse
    {
        $schools = $this->getDoctrine()->getRepository(School::class)->findAll();
        $json_result = $serializer->serialize($schools, 'json', ['groups' => ['school']]);
        return new JsonResponse($json_result);
    }
}
