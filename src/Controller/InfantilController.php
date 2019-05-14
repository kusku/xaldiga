<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfantilController extends AbstractController
{
    public function infantilAction()
    {
        $infantilElements;

        $diablons = array(
            "title" => "Diablons",
            "url" => "/images/infantil/diablons.jpg",
            "description" => "Els Diablons són els encarregats de fer l’espectacle de foc. Per fer-ho, utilitzen una forca amb la que tiren les carretilles o els sortidors, depenent de l’actuació.\n\n
                Els Diablons, com els diables grans, tenen també un ball propi, estrenat  a la moscada de l’any 2008. La música del ball és de Lluís Toran, amb alguna variació realitzada durant els últims anys, i amb la coreografia de Maribel Jódar.\n\n
                L’edat mínima per participar amb el grup de Diablons és de 9 anys."
        );

        $tabalons = array(
            "title" => "Tabalons",
            "url" => "/images/infantil/tabalons.jpg",
            "description" => "Els Tabalons són el grup de percussió de la secció infantil. Acostumen a acompanyar als diablons a totes les actuacions, tot i que també en fan ells pel seu compte.\n\n
                El grup consta de diversos instruments: el “repe” (repenique), les caixes, els tabals, els bombos, la closca, el “xiqui”, els xiulets i les esquelles. Els diferents ritmes del grup es poden veure a les cercaviles que es fan, o bé als espectacles que es duen a terme, ja sigui estàtics o de recorregut.\n\n
                L’edat mínima per participar amb el grup de Tabalons és de 6 anys."
        );

        $tremenda = array(
            "title" => "Tremenda",
            "url" => "/images/infantil/tremenda.jpg",
            "description" => "La Tremenda és el drac de la secció infantil. És una estructura que simula la silueta d’un drac de dos caps. Els colors de la Tremenda provenen de la Víbria i el Drac de Manresa, mare i pare de la Tremenda. La Tremenda, durant l’any recull els xumets dels infants de la ciutat i els porta al coll durant les actuacions.\n\n
                El Ball de la Tremenda és costum que el faci un sol ballador, tot i que en alguns moments puntuals l’han arribat a ballar dues persones.\n\n
                Té dues pinces a la boca per on s’hi posa la pirotècnia durant el ball i els diferents correfocs que es fan durant l’any. Normalment porta 4 fuets encesos.\n\n
                Els portadores i les portadores del drac són infants de la secció."
        );

        $traqueta = array(
            "title" => "Traqueta",
            "url" => "/images/infantil/traqueta.jpg",
            "description" => "WIP"
        );

        $bou = array(
            "title" => "Bou",
            "url" => "/images/infantil/bou.jpg",
            "description" => "WIP"
        );

        $ceptrot = array(
            "title" => "Ceptrot",
            "url" => "/images/infantil/ceptrot.jpg",
            "description" => "WIP"
        );

        $infantilElements = array($diablons, $tabalons, $tremenda, $traqueta, $bou, $ceptrot);

        return $this->render('web/infantil.html.twig', ['infantilElements' => $infantilElements]);
    }
}