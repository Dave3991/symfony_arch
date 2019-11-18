<?php declare(strict_types=1);


namespace App\Controller\Lucky;

use App\Controller\Base\BaseController;
use App\Controller\IController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class LuckyController extends BaseController implements IController
{
    /** @var \App\Controller\Lucky\Forms\Example  */
    private $exampleForm;

    /** @var \Latte\Engine  */
    private $latteEngine;

    public function __construct(
        \App\Controller\Lucky\Forms\Example $example,
        \App\Factory\LatteFactory $latteFactory
    )
    {
        $this->exampleForm = $example;
        $this->latteEngine = $latteFactory->getLatteEngine();
    }

    /**
     * @Route("lucky/number", name="lucky_number")
     */
    public function getLuckyNumber(): \Symfony\Component\HttpFoundation\Response
    {
        $number = 7;
        $url = $this->generateUrl(
            'anotherLuckyNumber'
        );
        return new Response(
            "<html><body>Lucky number: '.$number.' <br> <a href=\"{$url}\"> url na another lucky number</a> </body></html>"
        );
    }

    /**
     * @Route("lucky/anotherNumber", name="anotherLuckyNumber")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAnotherNumber(): \Symfony\Component\HttpFoundation\Response
    {
        $number = 7;
        $projectDir = $this->getBasePath();
        $parameters = [
            'flashes' => [],
            'basePath' => $projectDir,
            'anyVariable' => 'abcd - anyVariable',
        ];
        return new Response($this->latteEngine->renderToString(__DIR__.'/Templates/lucky.latte',$parameters));
    }
}