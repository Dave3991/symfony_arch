<?php declare(strict_types=1);


namespace App\Controller\Api\Base;

use App\Controller\Base\BaseController;
use App\Controller\IController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BaseApiController
 * @package App\Controller\Api
 * @Route("/api/v1")
 */
abstract class BaseApiController extends BaseController implements IController
{
    /**
     *  @Route("/api/v1/")
     */
    public function getBaseAction(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return new JsonResponse(
            ['API' => 'ok']
        );
    }
}