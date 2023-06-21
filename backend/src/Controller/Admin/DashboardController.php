<?php

namespace App\Controller\Admin;

use App\Entity\ChatPreguntas;
use App\Entity\ChatSession;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use App\Entity\User;
use App\Entity\Ciudad;
use App\Entity\Pregunta;
use App\Entity\ProductoFinanciero;
use App\Entity\Recomendacion;
use App\Entity\TiposProducto;
use App\Entity\UsuariosRespuesta;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private ChartBuilderInterface $chartBuilder,
    ) {
    }

    // ... you'll also need to load some CSS/JavaScript assets to render
    // the charts; this is explained later in the chapter about Design

    #[Route('/admin')]
    public function admin(): Response
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);
        // ...set chart data and options somehow

        return $this->render('admin/my-dashboard.html.twig', [
            'chart' => $chart,
        ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Ciudad', 'fas fa-list', Ciudad::class);
        yield MenuItem::linkToCrud('Pregunta', 'fas fa-list', Pregunta::class);
        yield MenuItem::linkToCrud('ProductoFinanciero', 'fas fa-list', ProductoFinanciero::class);
        yield MenuItem::linkToCrud('Recomendacion', 'fas fa-list', Recomendacion::class);
        yield MenuItem::linkToCrud('TiposProducto', 'fas fa-list', TiposProducto::class);
        yield MenuItem::linkToCrud('UsuariosRespuesta', 'fas fa-list', UsuariosRespuesta::class);
        yield MenuItem::linkToCrud('ChatSession', 'fas fa-list', ChatSession::class);
        yield MenuItem::linkToCrud('ChatPreguntas', 'fas fa-list', ChatPreguntas::class);

    }
}