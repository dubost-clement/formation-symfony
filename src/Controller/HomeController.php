<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller 
{
    /**
     * @Route("/", name="homepage")
     */
    public function home () {
        $name = "clément";
        $age = 1;

        $prenoms = ["clément" => 26, "rémi" => 30, "minouche" => 5];

        return $this->render(
            'home.html.twig',
            [   'name' => "$name",
                'age' => "$age",
                'tableau' => $prenoms
            ]
        );
    }

    /**
     * @Route("/hello/{prenom}", name="hello")
     */
    public function hello ($prenom = " anonyme")
    {
        return $this->render(
            'hello.html.twig', [
                'prenom' => $prenom
            ]

        );
    }

}

?>