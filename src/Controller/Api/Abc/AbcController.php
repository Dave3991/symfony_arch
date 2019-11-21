<?php declare(strict_types=1);


namespace App\Controller\Api\Abc;

use App\Controller\Base\BaseController;
use App\Controller\IController;
use App\Modules\Analysis\Abc\AbcServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller\Api
 *
 *  If you are going to build huge API use - https://api-platform.com/
 *
 */
final class AbcController extends BaseController implements IController
{
    /** @var \App\Modules\Analysis\Abc\AbcServiceProvider  */
    private  $abcServiceProvider;

    public function __construct(AbcServiceProvider $abcServiceProvider)
    {
        $this->abcServiceProvider = $abcServiceProvider;
    }

    /**
     * @Route("api/v1/abc/profit", methods={"GET"})
     */
    public function profitComputeAction(Request $request): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $contentInJson = $request->getContent();
        $data = \json_decode($contentInJson);
        $data = [
            "a" => 13,
            "b" => 10,
            "c" => 9.001,
            "d" => 33,
            "e" => 25,
            "f" => 23,
            "g" => 9,
        ];
        $result = $this->abcServiceProvider->computeProfitFromArray($data);
        $jsonResponse = new JsonResponse(
            $result
        );
        return $jsonResponse;
    }

}