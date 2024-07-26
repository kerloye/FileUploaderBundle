<?php

namespace PunkAve\FileUploaderBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\DependencyInjection\Container;

class FileExtension extends AbstractExtension
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction('punkave_get_files', [$this, 'getFiles']),
        );
    }

    public function getFiles($folder)
    {
        return $this->container->get('punk_ave.file_uploader')->getCleanFiles(array('folder' => $folder));
    }

    public function getName()
    {
        return 'punkave_file';
    }
}
