<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\UnicodeString;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song'=> 'Come as you are', 'artist'=> 'Nirvana'],
            ['song'=> 'Smells like teen spirit', 'artist'=> 'Nirvana'],
            ['song'=> 'Polly', 'artist'=> 'Nirvana'],
            ['song'=> 'Something in the way', 'artist'=> 'Nirvana'],
            ['song'=> 'Heart shaped box', 'artist'=> 'Nirvana']
        ];
        return $this->render('vinyl/homepage.html.twig', 
        [
            'title' => 'PB & Jams',
            'tracks' => $tracks
        ],
    );
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null):Response
    {
        $genre = $slug ? (new UnicodeString(str_replace('-', ' ', $slug)))->title(true): null;
        return $this->render('vinyl/browse.html.twig', [
            'genre'=> $genre
        ]);
    }
} 