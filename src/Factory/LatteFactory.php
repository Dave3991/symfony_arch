<?php declare(strict_types=1);

namespace App\Factory;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class LatteFactory
{
    /** @var \Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface  */
    private $containerBag;

    public function __construct(ContainerBagInterface $containerBag)
    {
        $this->containerBag = $containerBag;
    }

    private function getParameter(string $name)
    {
         return $this->containerBag->get($name);
    }

    public function getLatteEngine(): \Latte\Engine
    {
        $latte = new \Latte\Engine;
        $projectDir = $this->getParameter('kernel.project_dir');
        $latte->setTempDirectory($projectDir.'/var/cache');
        return $latte;
    }
}