<?php declare(strict_types=1);


namespace App\Controller\Home;

use App\Controller\Base\BaseController;
use App\Controller\IController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller\Home
 *
 * Default controller - first what you see when you come to website
 */
final class HomeController extends BaseController implements IController
{
    /**
     * @Route("/", name="default")
     */
    public function defaultAction(): \Symfony\Component\HttpFoundation\Response
    {
        $number = 7;
        $url = $this->generateUrl(
            'lucky_number'
        );

        return new Response(
            '<html><body>Lucky default number: '.$number." <a href=\"{$url}\"> url na lucky number</a></body></html>"
        );
    }

}