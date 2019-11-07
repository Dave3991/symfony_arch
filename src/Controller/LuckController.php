<?php declare(strict_types=1);


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckController
{
    /**
     * @Route("/lucky/number")
     */
    public function getLuckyNumber(): \Symfony\Component\HttpFoundation\Response
    {
        $number = 7;
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/lucky/anotherNumber")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAnotherNumber(): \Symfony\Component\HttpFoundation\Response
    {
        $number = 7;
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}