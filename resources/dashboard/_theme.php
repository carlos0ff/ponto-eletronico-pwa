<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?= asset("/assets/style.css"); ?>"/>
    
</head>
<body>

<nav class="sidebar">
    <div class="logo ">
        <a href="index.php" class="filter-censored-900">
            <img src="<?= asset('assets/images/logo.png'); ?>"  alt="Censored Image" >
        </a>
    </div>
    
    <div class="menu-content">
        <ul class="menu-items">
            <div class="menu-title">Visão Geral</div>

            <li class="item">
                <a href="#"><i class="fal fa-tasks"></i> Atividaddes</a>
            </li>

            <li class="item">
                <a href="#"><i class="fal fa-handshake font-medium"></i> Pontos</a>
            </li>

            <li class="item">
                <a href="#"> <i class="fal fa-handshake font-medium"></i> Pedidos</a>
            </li>

            <li class="item">
                <div class="submenu-item">
                    <span><i class="fal fa-chart-line font-medium"></i> Relatórios </span>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>

                <ul class="menu-items submenu">
                    <div class="menu-title">
                        <i class="fa-solid fa-chevron-left"></i>
                        Relatórios 
                    </div>

                    <li class="item">
                        <a href="#">
                            <i class="fal fa-external-link-alt font-medium"></i> Espelho de Ponto
                        </a>
                    </li>
                    <li class="item">
                        <a href="#">
                            <i class="fal fa-user-chart font-medium"></i> Folha de Frequência
                        </a>
                    </li>
                
                    <li class="item">
                        <a href="#">
                            <i class="fal fa-file-excel font-medium"></i> Exporta XLS/PDF
                        </a>
                    </li>

                    <li class="item">
                        <a href="#">
                            <i class="fal fa-stopwatch font-medium"></i> Hora Extras
                        </a>
                    </li>

                    <li class="item">
                        <a href="">
                            <i class="fal fa-file-alt font-medium"></i> Resumo</a>
                    </li>

                    <li class="item">
                        <a href="">
                            <i class="fal fa-alarm-clock font-medium"></i> Banco de Horas
                        </a>
                    </li>
                </ul>
            </li>
            
            <div class="menu-title">Gerenciar</div>

            <li class="item">
                <a href="#">
                    <i class="fal fa-user-friends font-medium"></i> Colaboradores
                </a>
            </li>

            <li class="item">
                <a href="#">
                    <i class="fal fa-money-check-alt font-medium"></i> Folha de pagamento
                </a>
            </li>

            <div class="menu-title">Configurar</div>

            <li class="item">
                <a href="#"><i class="fal fa-calendar"></i> Jornada</a>
            </li>

            <li class="item">
                <a href="#">
                    <i class="fal fa-file-edit"></i> Grupo de regras
                </a>
            </li>

            <li class="item">
                <a href="#">
                    <i class="fal fa-map-marker-alt"></i> Localizações
                </a>
            </li>

            <li class="item">
                <a href="#">
                    <i class="fal fa-network-wired"></i> Estrutura da empresa
                </a>
            </li>

            <li class="item">
                <a href="#">
                    <i class="fal fa-sparkles"></i> Feriados
                </a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>

    <!-- Profile -->
    <div class="navbar-profile">
        <div class="dropdown">
            <img src="<?= asset('assets/images/avatar.jpg"'); ?> alt="Usuário">
            <div class="username">
                <a href="#"> Rodrigo Luís da Rosa 
                    <i class="fal fa-chevron-down d-flex"></i>
                    <small>Engenheiro de Software</small>
                </a>      
            </div>
            <div class="dropdown-list">
                <a href="#"><i class="fal fa-user-alt"></i> Meu Perfil</a>
                <a href="#"><i class="fal fa-cogs"></i> Configurações</a>
                <a href="#" class="text-capitalize"><i class="fal fa-exclamation-circle"></i> Need help?</a>
                <a href="#"><i class="fal fa-sign-in-alt"></i> Sair</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="main">
    <div class="container">
        <?= $v->section("content"); ?>
    </div>
</div>

<!-- Core Javascript -->
<script src="<?= asset("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>