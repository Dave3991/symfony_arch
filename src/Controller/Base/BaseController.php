<?php declare(strict_types=1);


namespace App\Controller\Base;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseController extends AbstractController
{
    /**
     * returns basePath (/var/www/symfony_arch/src/Controller/Base) to base (common) resources (css,js,...)
     * @return string
     */
    protected function getBasePath(): string
    {
        return __DIR__;
    }
}