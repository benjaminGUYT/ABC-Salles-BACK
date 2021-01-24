<?php

namespace App\Controller;

use DateTime;
use App\Entity\Record;
use App\Repository\RecordRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class MemoryCtrl extends AbstractController {

    private $headers = [
        'Access-Control-Allow-Headers' => 'origin, content-type, accept, credentials',
        'Content-Type' => 'application/json',
        'Access-Control-Allow-Credentials' => 'true'
     ];

    /**
     * @Route("/memory/start")
     */
    public function start(SessionInterface $session, Request $request): Response {
        $t = microtime(true);
        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $d = new DateTime(date('Y-m-d H:i:s.'.$micro, $t) );

        $session->set('start', $d->format("Y-m-d H:i:s.u"));
        $session->set('temps', null);
        $session->set('nbTenta', 0);
        $session->set('score', null);
        $session->set('nbCartes', (int) $request->query->get('nbCartes'));
        $return = ['depart' => $session->get('start')];
 
        return new JsonResponse($return, 200, $this->headers);
    }

    /**
     * @Route("/memory/stop")
     */
    public function stop(SessionInterface $session): Response {
        $session->clear();
        return new Response("ok" , 200, $this->headers);
    }

    /**
     * @Route("/memory/incr")
     */
    public function incr(SessionInterface $session): Response {
        $nbTenta = $session->get('nbTenta');
        $nbTenta++;
        $session->set('nbTenta', $nbTenta); 

        return new JsonResponse($session->all(), 200, $this->headers);
    }

    /**
     * @Route("/memory/finish")
     */
    public function finish(SessionInterface $session): Response {
        $t = microtime(true);
        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $d = new DateTime(date('Y-m-d H:i:s.'. $micro, $t));
        $start = new DateTime($session->get('start'));

        $diff = $start->diff($d);

        $tps =  (($diff->format('%i') * 60 + $diff->format('%s')) * 1000) + ( $diff->format('%f') / 1000);
        $tps = (int) $tps;
        $session->set('temps', $tps); 
        $nbPaires = $session->get('nbCartes') / 2;
        $nbTenta = $session->get('nbTenta');

        // (1000000 - (500000/nb_cartes/2 * ((nb_cartes/2) - (nb_tenta - (nb_cartes/2)))) - (500000 - temps * 2))
        $score = 1000000 - (500000/$nbPaires * ($nbPaires - ($nbTenta - $nbPaires))) - (500000 - $tps * 2);
        $session->set('score', $score);


        return new JsonResponse($session->all(), 200, $this->headers);
    }

    /**
     * @Route("/memory/save")
     */
    public function save(SessionInterface $session, RecordRepository $recordRepository, Request $request): Response {
        $record = new Record();
        $record->setPseudo($request->query->get('pseudo'));
        $record->setTemps($session->get('temps'));
        $record->setnbTenta($session->get('nbTenta'));
        $record->setnbCartes($session->get('nbCartes'));

        $recordRepository->save($record);

        return new Response("ok" , 200, $this->headers);
    }

}




