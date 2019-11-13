<?php declare(strict_types=1);


namespace App\Controller\Lucky;

use App\Controller\IController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController implements IController
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
        return new Response($this->latteEngine->compile(__DIR__.'/Templates/lucky.latte'));
    }
}