<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Annotations as OA;

use App\Helper\ParameterTrait;
use App\Service\CompanyService;
use Exception;

class CompanyController extends AbstractController
{
    use ParameterTrait;


    /**
     * Get an array of companies matching an input
     * 
     * @Route("/api/company/search/{search}", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Returns the result"
     *     )
     * )
     * @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * @OA\Response(
     *     response=400,
     *     description="Invalid input data"
     *   )
     * @OA\Tag(name="rosanceCompany")
     **/
    public function getCompany(string $search, CompanyService $companyService):JsonResponse 
    {
        try
        {
            $companies = $companyService->filterCompany($search);
            return $this->json($companies, Response::HTTP_OK);

        }catch(Exception $ex)
        {
            return $this->json(['error_msg' => $ex->getMessage()], Response::HTTP_OK);
        }
    }
}
