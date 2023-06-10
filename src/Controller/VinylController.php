<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\UnicodeString;

class VinylController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Title: PB and jams');
        // die('do not know what this will do');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null):Response
    {
        $title =  (new UnicodeString(str_replace('-', ' ', $slug)))->title(true);
        return new Response('genre : '.$title);
    }
} 