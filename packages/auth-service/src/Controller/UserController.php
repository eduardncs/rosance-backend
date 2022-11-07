<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

use App\Helper\ParameterTrait;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use Exception;

class UserController extends AbstractController
{
    use ParameterTrait;

    /**
     * Register user.
     *
     * Register the user.
     *
     * @Route("/api/get-user", methods={"GET"})
     **/
    public function getUserData(Request $request):JsonResponse 
    {
        $response = new JsonResponse();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_OK);
        $user = $this->getUser();
        $response->setData([
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'roles' => $user->getRoles(),
        ]);
        return $response;
    }

    /**
     * Register user.
     *
     * Register the user.
     *
     * @Route("/api/user/register", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Return TRUE"
     *     )
     * )
     * @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * @OA\Response(
     *     response=400,
     *     description="Invalid input data for the user registration"
     *   )
     * @OA\RequestBody(
     *     request="user",
     *     required=true,
     *     @OA\JsonContent(
     *         @OA\Property(
     *              property="email",
     *              type="string"
     *        ),
     *         @OA\Property(
     *              property="password",
     *              type="string"
     *        ),
     *       @OA\Property(
     *              property="firstName",
     *              type="string"
     *        ),
     *       @OA\Property(
     *              property="lastName",
     *              type="string"
     *        ),
     *       @OA\Property(
     *              property="phoneNumber",
     *              type="string"
     *        ),
     *       @OA\Property(
     *              property="gdpr",
     *              type="bool"
     *        ),
     *       @OA\Property(
     *              property="terms",
     *              type="bool"
     *        ),
     *      )
     *   )
     * @OA\Tag(name="User")
     */
    public function register(Request $request, ValidatorInterface $validator, UserService $userService): JsonResponse
    {
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setStatusCode(Response::HTTP_OK);
        
        try{
            $inputArr = $request->toArray();

            $constraints = new Assert\Collection([
                'email' => [new Assert\NotBlank(), new Assert\Email()],
                'password' => [new Assert\NotBlank(), new Assert\Length(['min' => 6])],
                'repeatPassword' => [new Assert\IdenticalTo(["propertyPath" => $inputArr["password"]])],
                'firstName' => [new Assert\NotBlank()],
                'lastName' => [new Assert\NotBlank()],
                'phoneNumber' => [new Assert\NotBlank()],
                'gdpr' => [new Assert\NotBlank(), new Assert\IsTrue()],
                'terms' => [new Assert\NotBlank(), new Assert\IsTrue()],
            ]);

            $errorMessages = $this->validate_assert($constraints, $inputArr, $validator);
            if (count($errorMessages) > 0) {
                $response->setStatusCode(Response::HTTP_BAD_REQUEST);
                $response->setContent(json_encode(['error_msg' => $errorMessages]));
                return $response;
            }

            $userService->saveUser($inputArr);

            $response->setContent(json_encode(['success_msg' => "SUCCESS!"]));
            return $response;

        } catch (Exception $ex) {
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            $response->setContent(json_encode(['error_msg' => $ex->getMessage()]));
            return $response;
        }
    }
}
