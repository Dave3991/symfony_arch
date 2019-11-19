<?php declare(strict_types=1);


namespace App\Controller\Api;

use App\Controller\Base\BaseController;
use App\Controller\IController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller\Api
 *
 *  If you are going to build huge API use - https://api-platform.com/
 */
final class ApiController extends BaseController implements IController
{
    /**
     * @Route("/ping", name="ping")
     */
    public function pingAction(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return new JsonResponse(
            ['ping' => 'ok']
        );
    }

    /**
     * basicaly get what you send
     *  @Route("/post-data", methods={"POST"})
     */
    public function postDataAction(Request $request)
    {
        $contentInJson = $request->getContent();
        $data = \json_decode($contentInJson);
        return new JsonResponse($data);
    }

}