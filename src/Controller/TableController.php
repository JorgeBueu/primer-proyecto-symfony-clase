<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TableController extends AbstractController
{
    #[Route('/table/{filas}/{cols?4<[1-9]\d*>}', name: 'app_table', requirements: ["filas" => "[1-9]\d*"])]
    public function index(int $filas = 4, int $cols): Response
    {
        $array = [];
        for ($i=0; $i < $filas ; $i++) {
            $array[$i] = [];
            for ($j=0; $j < $cols; $j++) { 
                $array[$i][$j] = rand(0,100);
            }
        }

        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'filas_tabla' => $filas,
            'cols_tabla' => $cols,
            'array' => $array
        ]);
    }
}
