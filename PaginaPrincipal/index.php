<?php
session_start();
//print_r($_SESSION);

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: ../login/login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}

include_once('../conexao/config.php');

$logado = $_SESSION['email'];
$id = $_SESSION['id_usuario'];

$sqlC = "SELECT id, nome, descricao FROM categorias WHERE usuarios_id = '$id'  ORDER BY id DESC";
$resC = $conexao->query($sqlC);

$sqlD = "SELECT * FROM despesas WHERE usuarios_id = '$id' ORDER BY id DESC";
$resD = $conexao->query($sqlD);

$sqlT = "SELECT * FROM tipos WHERE usuarios_id = '$id' ORDER BY id DESC";
$resT = $conexao->query($sqlT);

$sqlR = "SELECT * FROM receitas  WHERE usuarios_id = '$id' ORDER BY id DESC";
$resR = $conexao->query($sqlR);

$sqlM = "SELECT * FROM metas WHERE usuarios_id = '$id' ORDER BY id DESC";
$resM = $conexao->query($sqlM);

$sqlL = "SELECT * FROM limites_gastos WHERE usuarios_id = '$id' ORDER BY id DESC";
$resL = $conexao->query($sqlL);

if (isset($_POST['submitC'])) {
    $nomeC = $_POST['nomeC'];
    $descricaoC = $_POST['descricaoC'];

    $resultD = mysqli_query($conexao, "INSERT INTO categorias(nome, descricao,usuarios_id) VALUES('$nomeC', '$descricaoC',' $id')");
    header("location:index.php");
}

if (isset($_POST['submitD'])) {
    $descricaoD = $_POST['descricaoD'];
    $valorD = $_POST['valorD'];
    $dataD = $_POST['dataD'];
    $categoriaD = $_POST['categoriaD'];
    $repeticaoD = $_POST['repeticaoD'];

    $resultD = mysqli_query($conexao, "INSERT INTO despesas(descricao, valor, data, categoria_id, repeticao, usuarios_id) VALUES('$descricaoD', '$valorD', '$dataD', '$categoriaD', '$repeticaoD',' $id')");
    header("location:index.php");
}

if (isset($_POST['submitT'])) {
    $nomeT = $_POST['nomeT'];
    $descricaoT = $_POST['descricaoT'];

    $resultD = mysqli_query($conexao, "INSERT INTO tipos(nome, descricao,usuarios_id) VALUES('$nomeT', '$descricaoT',' $id')");
    header("location:index.php");
}

if (isset($_POST['submitR'])) {
    $descricaoR = $_POST['descricaoR'];
    $valorR = $_POST['valorR'];
    $dataR = $_POST['dataR'];
    $tipoR = $_POST['tipoR'];
    $repeticaoR = $_POST['repeticaoR'];

    $resultR = mysqli_query($conexao, "INSERT INTO receitas(descricao, valor, data, tipo_id, repeticao,usuarios_id) VALUES('$descricaoR', '$valorR', '$dataR', '$tipoR', '$repeticaoR',' $id')");
    header("location:index.php");
}

if (isset($_POST['submitM'])) {
    $descricaoM = $_POST['descricaoM'];
    $valorM = $_POST['valorM'];
    $tempoM = $_POST['tempoM'];
    $parcelaM = $_POST['parcelaM'];

    $resultM = mysqli_query($conexao, "INSERT INTO metas(descricao, valor, tempo, parcela_mensal,usuarios_id) VALUES('$descricaoM', '$valorM', '$tempoM', '$parcelaM',' $id')");
    header("location:index.php");
}

if (isset($_POST['submitL'])) {
    $alimentacao = $_POST['alimentacao'];
    $lazer = $_POST['lazer'];
    $saude = $_POST['saude'];
    $estudo = $_POST['estudo'];
    $casa = $_POST['casa'];
    $compra = $_POST['compra'];
    $viagem = $_POST['viagem'];
    $cuidado = $_POST['cuidado'];
    $trabalho = $_POST['trabalho'];

    $resultL = mysqli_query($conexao, "INSERT INTO limites_gastos(alimentacao, lazer, saude, estudo, casa, compra, viagem, cuidado, trabalho,usuarios_id) VALUES('$alimentacao', '$lazer', '$saude',' $estudo', '$casa', '$compra', '$viagem', '$cuidado', '$trabalho',' $id')");
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PFI - Elóra</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">

            <a class="navbar-brand" href="#page-top">VFC</a>

            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">ADM</a></li>

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Limite
                            de Gasto</a></li>

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Aprender</a></li>
                </ul>
            </div>
        </div>
    </nav> 
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">

            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/iconeEF.png" alt="..." />

            <!-- Masthead Heading-->
            <h2 class="page-section-heading text-center text-uppercase mb-0">Virtual Financial Control</h2>

            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Site para o aprendizado e controle financeiro virtual
            </p>
        </div>
    </header>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ADM</h2>

            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <br>
            <div class="row justify-content-center"></div>
            <div class="container d-flex align-items-center flex-column">
            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Aqui na página de administração você pode inserir novas despesas, receitas e metas clicando nas seguintes imagens:</p>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
            
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>

                        <img class="img-fluid" src="assets/img/Despesa/1.png" alt="..." />
                    </div>
                </div>

                <!-- Portfolio Item 2-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>

                        <img class="img-fluid" src="assets/img/Despesa/2.png" alt="..." />
                    </div>
                </div>

                <!-- Portfolio Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                        <div
                            class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>

                        <img class="img-fluid" src="assets/img/Despesa/3.png" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section-->
    <section class="page-section portfolio" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Limite de Gasto</h2>

            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Limite de Gasto-->
            <div class="row justify-content-center"></div>
            <div class="container d-flex align-items-center flex-column">
                <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Neste setor você pode escolher um valor limite do
                    qual pretende gastar mensalmente em cada uma das categorias abaixo.</p>

                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i
                                class="fas fa-plus fa-3x"></i></div>
                    </div>

                    <img class="img-fluid" src="assets/img/Despesa/4.png" alt="..." />
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase  mb-0">Educação Financeira </h2>

            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!--Texto informativo-->
                    <ul>
                        <li><strong>Você sabe o que é Educação Financeira?</strong></li>

                        <br>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Educação Financeira trata-se de
                            conhecimentos e competências que ajudam a fazer escolhas inteligentes relacionadas ao
                            dinheiro, transações financeiras e consumo, gestão do capital, controle das dívidas e a
                            alcançar seus objetivos financeiros de modo a adquirir bem-estar e tranquilidade na vida.
                            Apesar de parecer simples, a falta desses conhecimentos e de sua prática ainda é muito
                            recorrente e pode acarretar diversos problemas. Aplicações/investimentos, poupança, controle
                            de gastos, planejamento e economia são os cinco pilares dessa disciplina de estudos.</p>

                        <li><strong>Onde usamos?</strong></li>
                        <br>
                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Você já deve ter se deparado em situações
                            onde estava com diversas dívidas e não sabia o que fazer para resolver ou talvez como tinha
                            chegado aquele ponto. E ao parar para refletir lembrou de ter gasto a mais em produtos que
                            muitas vezes nem iria utilizar. O aprendizado de Educação Financeira auxilia as pessoas a
                            evitar esses problemas econômicos.</p>

                        <li><strong>Aqui estão algumas definições importantes:</strong></li>

                        <br>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Finanças Pessoais:</strong>
                            Finanças pessoais dizem respeito à gestão do dinheiro e dos recursos financeiros de uma
                            pessoa para alcançar seus objetivos financeiros pessoais. Isso envolve o controle de gastos,
                            o planejamento de investimentos, a economia para emergências, o pagamento de dívidas e o
                            desenvolvimento de uma estratégia financeira para atingir metas como comprar uma casa, pagar
                            a educação dos filhos ou se aposentar confortavelmente.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Orçamento:</strong> O orçamento é
                            uma ferramenta financeira que ajuda a controlar as finanças pessoais. Ele envolve a criação
                            de um plano detalhado que lista todas as fontes de renda e despesas de uma pessoa durante um
                            período específico, geralmente mensal. Um orçamento ajuda a entender para onde vai o
                            dinheiro, identificar áreas de gastos excessivos e fazer ajustes para economizar e alcançar
                            metas financeiras.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Planejamento Financeiro:</strong> O
                            planejamento financeiro é o processo de definir metas financeiras, criar um plano para
                            atingir essas metas e implementar esse plano ao longo do tempo. Isso inclui considerar
                            aspectos como economias, investimentos, gestão de dívidas, seguros e aposentadoria.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Previdência Social:</strong> A
                            previdência social é um sistema de seguridade social fornecido pelo governo para fornecer
                            assistência financeira a indivíduos em situações específicas, como aposentadoria, invalidez,
                            desemprego e assistência a famílias de baixa renda. Os trabalhadores contribuem para esse
                            sistema ao longo de suas carreiras e, em troca, recebem benefícios quando elegíveis.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Sistema Financeiro:</strong> O
                            sistema financeiro é um conjunto de instituições, regulamentações e mercados que facilitam a
                            circulação de dinheiro na economia. Isso inclui bancos, instituições de crédito, bolsas de
                            valores, agências reguladoras e outros participantes que desempenham papéis cruciais na
                            gestão e movimentação de recursos financeiros.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Investimento:</strong> Investimento
                            refere-se à alocação de dinheiro em ativos financeiros, como ações, títulos, imóveis ou
                            outros instrumentos financeiros, com o objetivo de obter um retorno financeiro. Os
                            investimentos podem gerar renda, crescimento de capital ou uma combinação dos dois. As
                            pessoas investem para aumentar sua riqueza ao longo do tempo e alcançar metas financeiras de
                            longo prazo, como aposentadoria.</p>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; <strong>Cartão de Crédito e
                                Débito:</strong> A diferença entre crédito e débito é que o primeiro é uma modalidade de
                            pagamento a prazo, enquanto o segundo envolve pagamentos à vista. Quando o instrumento
                            financeiro tem a função de crédito, significa que você pode comprar hoje e pagar depois,
                            seja em um único pagamento ou dividido em várias parcelas.
                            Já o débito requer que haja saldo disponível no ato da compra, pois o dinheiro é descontado
                            instantaneamente.</p>

                        <br>

                        <li><strong>Práticas Importantes:</strong></li>

                        <br>

                        <ul>
                            <li>Uma prática básica para aumentar a saúde financeira é guardar dinheiro tanto para um
                                objetivo específico quanto para ter uma reserva em casos de emergência.</li>

                            <br>

                            <li>Faça coisas como o tradicional cofrinho ou algo parecido e combine uma data para abrir
                                em conjunto e ver quanto dinheiro você conseguiu poupar durante esse período.</li>

                            <br>

                            <li>Definir metas e objetivos relevantes no curto, médio e longo prazos.</li>

                            <br>

                            <li>Entender quais são os interesses e desejos que pretende realizar com seu dinheiro
                                estimula a priorização desses gastos ao longo do tempo, o que também reforça a
                                importância de poupar dinheiro para conseguir cumprir esses objetivos no futuro.</li>

                            <br>

                            <li>Um ponto básico mas importante da educação financeira é o controle sobre ganhos e
                                gastos, e isso deve ser incentivado desde cedo para garantir que o jovem tenha
                                consciência da sua própria situação financeira.</li>

                            <br>

                            <li>Acompanhar com atenção todo o dinheiro recebido e todos os gastos realizados permite a
                                você entender como funciona esse fluxo de entradas e saídas e, mesmo que os valores não
                                sejam muito altos em um primeiro momento, esse conceito contribui para uma tomada de
                                decisão mais consciente.</li>

                            <br>

                            <li>Desenvolver o interesse por ler e se informar sobre finanças é uma forma de garantir o
                                aprendizado constante sobre esse assunto, o que é cada vez mais importante conforme a
                                maneira como indivíduos e a sociedade em geral lida com dinheiro.</li>

                            <br>

                            <li>Assim como os conceitos de receitas, gastos, poupança e investimento são importantes
                                para uma boa educação financeira, também é necessário entender sobre as dívidas e como
                                elas funcionam.</li>

                            <br>

                            <li>Embora o endividamento possa ser perigoso quando foge do controle, as dívidas adquiridas
                                de maneira consciente e bem planejada podem ser uma ótima ajuda para atingir seus
                                objetivos.</li>

                            <br>

                            <li>Buscar um financiamento educacional, por exemplo, é uma forma de dívida que vai acelerar
                                o seu desenvolvimento pessoal e profissional e, assim, contribuir para uma melhoria na
                                sua qualidade de vida e na própria capacidade de quitar essa dívida.</li>
                        </ul>

                        <br>

                        <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp; Embora a educação financeira seja
                            importante para os adultos que têm de gerir as finanças domésticas, este tema continua a ser
                            muito importante também para os jovens. A educação financeira desde tenra idade não só torna
                            os jovens melhores na gestão do dinheiro, mas também os prepara para transmitir esse
                            conhecimento à próxima geração, impactando o futuro de toda a sua família.
                            Quando pensamos nos benefícios diretos de investir em educação financeira para os jovens,
                            vemos os benefícios do autocontrole emocional, da disciplina, da organização e do
                            planejamento, do autoconhecimento, da inteligência gerencial e financeira, da
                            responsabilidade e autonomia social, da independência, da visão analítica , etc.</p>

                        <ul>
                            <li><strong>Autocontrole emocional</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Ter mais controle sobre as próprias
                                finanças ajuda os jovens a serem mais donos de si mesmos, contribuindo para o
                                desenvolvimento do seu autocontrole também em outras situações.</p>

                            <li><strong>Disciplina</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Entender quais são as limitações de
                                gastos de acordo com o dinheiro recebido estimula a disciplina para equilibrar esses
                                fluxos financeiros.</p>

                            <li><strong>Organização e planejamento</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;O estabelecimento de metas financeiras
                                estimula o planejamento de médio e longo prazo, incentivando a organização dos jovens
                                para alcançar seus objetivos.</p>

                            <li><strong>Autoconhecimento</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Ter responsabilidade sobre o próprio
                                dinheiro faz com que o jovem entenda quais são as suas prioridades e objetivos,
                                incentivando o autoconhecimento para tomar as decisões que mais fazem sentido de acordo
                                com a sua situação e interesses.</p>

                            <li><strong>Gestão e inteligência financeira</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Assim como a educação financeira
                                contribui para melhorar a organização e planejamento em geral, ela também ajuda os
                                jovens a desenvolverem desde cedo maior habilidade para gerenciar suas finanças e
                                tomarem decisões mais conscientes em relação ao seu dinheiro no futuro.</p>

                            <li><strong>Responsabilidade social</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;A educação financeira permite que os
                                jovens entendam mais sobre o destino e os impactos do dinheiro que gastam, ajudando a
                                fazer escolhas mais responsáveis de acordo com seus próprios valores pessoais.</p>

                            <li><strong>Autonomia e independência</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Ter uma atitude de protagonismo em
                                relação ao próprio dinheiro estimula a autonomia e independência financeira nos jovens,
                                contribuindo para que eles se desenvolvam mais cedo e com mais segurança.</p>

                            <li><strong>Visão analítica</strong></li>
                            <p class="text-paragraf">&nbsp; &nbsp; &nbsp; &nbsp;Por fim, a visão analítica para entender
                                a situação geral de suas finanças e tomar decisões melhores também é um ponto impactado
                                pela educação financeira para jovens.</p>
                        </ul>

                        <br>

                        <li><strong>Recomendações:</strong></li>

                        <br>

                        <li><strong>Livros:</strong></li>

                        <ul>
                            <li>O Investidor Inteligente(Benjamin Graham) </li>
                            <img class="img-fluid" width="400" height="341" src="assets/img/Despesa/investidor.png" />
                            <li>Os Segredos da Mente Milionária(T.Harv Eker) </li>
                            <img class="img-fluid" width="400" height="341" src="assets/img/Despesa/segredos.png" />
                            <li>O Poder do Hábito – Por que fazemos o que fazemos na vida e nos negócios(Charles Duhigg)
                            </li>
                            <img class="img-fluid" width="400" height="341" src="assets/img/Despesa/Poder.png" />
                            <li>Os Axiomas de Zurique(Max Gunther)</li>
                            <img class="img-fluid" width="400" height="341" src="assets/img/Despesa/zurique.png" />
                        </ul>

                        <br>

                        <li><strong>Vídeos:</strong></li>

                        <br>

                        <p class="text-paragraf">Manual da Evolução. A EDUCAÇÃO FINANCEIRA Resumida Em 1 ÚNICO Fato
                            Sobre Dinheiro. Disponível em: <a
                                href="https://youtu.be/a_N5zvN0lYE?si=yGz2xmoPjuq6ioJ4">Clique aqui!!</a> </p>

                        <p class="text-paragraf">Os Sócios Podcast. COMO ORGANIZAR SUA VIDA FINANCEIRA? (com Gustavo
                            Cerbasi e Carlos Castro) | Os Sócios Podcast 129. Disponível em: <a
                                href="https://youtu.be/4EdXiPh6MpU?si=GQHnqmgXMoxMAwSQ">Clique aqui!!</a></p>

                        <br>
                        <li><strong>Referências:</strong></li>
                        <p class="text-paragraf"></p>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Autor</h4>
                    <p class="lead mb-0">
                        Elóra Dana Falkembak

                        <br />

                        IFPR, 2023
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Pela web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Agradecimentos</h4>
                    <p class="lead mb-0">
                        Obrigado por acessar esse site!!
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Categorias das Despesas</h2>
                                

                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">Antes de adicionar uma nova despesa, adicione as categorias que deseja selecionar futuramente para cada despesa, ou seja, de qual tipo ela é. Exemplos: Alimentação, Lazer, Saúde...
                                </p>
                                <br>
                                

                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="text">Nome:</label>
                                        <input type="text" class="form-control" id="nomeC" name="nomeC"
                                            placeholder="Nome" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Descrição:</label>
                                        <input type="text" class="form-control" id="descricaoC" name="descricaoC"
                                            placeholder="Descrição" required>
                                    </div>

                                    <br>

                                    <button class="btn btn-primary" type="submit" name="submitC" id="submitC">Adicionar
                                        Categoria</button>

                                    <button class="btn btn-primary" type="reset" name="resetC"
                                        id="resetC">Limpar</button>
                                </form>
                                
                                <br><br>
                                
                                <!-- Tabela Categorias-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        
                                        while ($user_dataC = mysqli_fetch_assoc($resC)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataC['id'] . "</td>";
                                            echo "<td>" . $user_dataC['nome'] . "</td>";
                                            echo "<td>" . $user_dataC['descricao'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_categoria.php?id=" . $user_dataC['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <br>
                                <br>
                                <!-- Portfolio Modal - Title-->
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Despesas</h2>
                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">Adicione suas despesas no formulário abaixo, e em seguida elas irão aparecer na tabela para que você tenha controle de seus gastos.
                                </p>
                                <br>

                                <!--Formulário Despesas-->
                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="text">Descrição:</label>
                                        <input type="text" class="form-control" id="descricaoD" name="descricaoD"
                                            placeholder="Descrição" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Valor:</label>
                                        <input type="number" class="form-control" id="valorD" name="valorD" step=".02"
                                            placeholder="Valor" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="data">Data:</label>
                                        <input type="date" class="form-control" id="dataD" name="dataD" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="select">Categoria:</label>
                                        <select class="form-select" aria-label="Default select example" id="categoriaD"
                                            name="categoriaD" required>
                                            <option>Selecione...</option>
                                            <?php
                                            $resultado = $conexao->query($sqlC);
                                            while ($row_categorias = mysqli_fetch_assoc($resultado)) { ?>
                                                <option value="<?php echo $row_categorias['id']; ?>">
                                                    <?php echo $row_categorias['nome']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Repetição(Mensal):</label>
                                        <input type="number" class="form-control" id="repeticaoD" name="repeticaoD"
                                            placeholder="Repetição Mensal" required>
                                    </div>

                                    <br>

                                    <button class="btn btn-primary" type="submit" name="submitD"
                                        id="submitD">Adicionar</button>

                                    <button class="btn btn-primary" type="reset" name="resetD"
                                        id="resetD">Limpar</button>
                                </form>
                                <br> <br>

                                <!-- Tabela Despesas-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Descrição</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th>Categoria</th>
                                            <th>Repetição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($user_dataD = mysqli_fetch_assoc($resD)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataD['id'] . "</td>";
                                            echo "<td>" . $user_dataD['descricao'] . "</td>";
                                            echo "<td>" . $user_dataD['valor'] . "</td>";
                                            echo "<td>" . $user_dataD['data'] = date('d/m/Y') . "</td>";
                                            echo "<td>" . $user_dataD['categoria_id'] . "</td>";
                                            echo "<td>" . $user_dataD['repeticao'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_despesa.php?id=" . $user_dataD['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br><br>

                                <!-- Portfolio Modal - Text-->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 2-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Tipos das Receitas</h2>
                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">Antes de adicionar suas receitas(ganhos), escolha de qual tipo elas serão, você pode colocar "Salário", "Renda Extra", entre outros que desejar.
                                </p>
                                <br>
                                
                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="text">Nome:</label>
                                        <input type="text" class="form-control" id="nomeT" name="nomeT"
                                            placeholder="Nome" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Descrição:</label>
                                        <input type="text" class="form-control" id="descricaoT" name="descricaoT"
                                            placeholder="Descrição" required>
                                    </div>

                                    <br>
                                    <button class="btn btn-primary" type="submit" name="submitT" id="submitT">Adicionar
                                        Tipo</button>

                                    <button class="btn btn-primary" type="reset" name="resetT"
                                        id="resetT">Limpar</button>
                                </form>
                                <br>

                                <!-- Tabela Categorias-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($user_dataT = mysqli_fetch_assoc($resT)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataT['id'] . "</td>";
                                            echo "<td>" . $user_dataT['nome'] . "</td>";
                                            echo "<td>" . $user_dataT['descricao'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_tipo.php?id=" . $user_dataT['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <br>

                                <!-- Portfolio Modal - Title-->
                             <br>
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Receitas</h2>
                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">Adicione suas receitas(ganhos) no formulário abaixo e em seguida elas aparecerão na tabela para sua visualização.
                                </p>
                                <br>
                                

                                <!--Formulário Receitas-->
                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="text">Descrição:</label>
                                        <input type="text" class="form-control" id="descricaoR" name="descricaoR"
                                            placeholder="Descrição" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Valor:</label>
                                        <input type="number" class="form-control" id="valorR" name="valorR" step=".02"
                                            placeholder="Valor" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="data">Data:</label>
                                        <input type="date" class="form-control" id="dataR" name="dataR">
                                    </div>

                                    <div class="form-group">
                                        <label for="select">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="tipoR"
                                            name="tipoR">
                                            <option>Selecione...</option>
                                            <?php
                                            $resultado = $conexao->query($sqlT);
                                            while ($row_tipos = mysqli_fetch_assoc($resultado)) { ?>
                                                <option value="<?php echo $row_tipos['id']; ?>">
                                                    <?php echo $row_tipos['nome']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Repetição(Mensal):</label>
                                        <input type="number" class="form-control" id="repeticaoR" name="repeticaoR"
                                            placeholder="Repetição Mensal" required>
                                    </div>
                                    <br>

                                    <button class="btn btn-primary" type="submit" name="submitR"
                                        id="submitR">Adicionar</button>

                                    <button class="btn btn-primary" type="reset" name="resetR"
                                        id="resetR">Limpar</button>
                                </form>
                                <br><br>

                                <!-- Tabela Receitas-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Descrição</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th>Tipo</th>
                                            <th>Repetição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($user_dataR = mysqli_fetch_assoc($resR)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataR['id'] . "</td>";
                                            echo "<td>" . $user_dataR['descricao'] . "</td>";
                                            echo "<td>" . $user_dataR['valor'] . "</td>";
                                            echo "<td>" . $user_dataR['data'] = date('d/m/Y') . "</td>";
                                            echo "<td>" . $user_dataR['tipo_id'] . "</td>";
                                            echo "<td>" . $user_dataR['repeticao'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_receita.php?id=" . $user_dataR['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <br><br>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 3-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Metas Financeiras</h2>
                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">Adicione suas metas financeiras no formulário abaixo e em seguida elas aparecerão na tabela para sua visualização. Exemplos: comprar uma casa, um carro, uma roupa, fazer um investimento, ajudar alguém, dentre outros.
                                </p>
                                <br>
                                

                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="text">Descrição:</label>
                                        <input type="text" class="form-control" id="descricaoM" name="descricaoM"
                                            placeholder="Descrição" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Valor Total:</label>
                                        <input type="number" class="form-control" id="valorM" name="valorM" step=".02"
                                            placeholder="Valor" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Tempo:</label>
                                        <input type="text" class="form-control" id="tempoM" name="tempoM"
                                            placeholder="Tempo" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Parcela Mensal:</label>
                                        <input type="number" class="form-control" id="parcelaM" name="parcelaM"
                                            step=".02" placeholder="Parcela Mensal" required>
                                    </div>

                                    <br>

                                    <button class="btn btn-primary" type="submit" name="submitM"
                                        id="submitM">Adicionar</button>

                                    <button class="btn btn-primary" type="reset" name="resetM"
                                        id="resetM">Limpar</button>
                                </form>
                                <br> <br>

                                <!-- Tabela Metas-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Descrição</th>
                                            <th>Valor Total</th>
                                            <th>Tempo</th>
                                            <th>Parcela Mensal</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($user_dataM = mysqli_fetch_assoc($resM)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataM['id'] . "</td>";
                                            echo "<td>" . $user_dataM['descricao'] . "</td>";
                                            echo "<td>" . $user_dataM['valor'] . "</td>";
                                            echo "<td>" . $user_dataM['tempo'] . "</td>";
                                            echo "<td>" . $user_dataM['parcela_mensal'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_meta.php?id=" . $user_dataM['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br><br>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modal 4-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                
                                <h2 class="page-section-heading text-center text-uppercase mb-0 text-secondary">Limite de Gastos</h2>
                                <!-- Icone de estrela-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <p class="masthead-subheading font-weight-light mb-0">O limite de gasto serve para que você possa estipular um valor máximo que pode gastar em cada categoria.
                                </p>
                                <br>
                                

                                <form action="index.php" method="POST">
                                    <div class="form-group">
                                        <label for="number">Alimentação:</label>
                                        <input type="number" class="form-control" id="alimentacao" name="alimentacao"
                                            step=".02" placeholder="Alimentação" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Lazer:</label>
                                        <input type="number" class="form-control" id="lazer" name="lazer" step=".02"
                                            placeholder="Lazer" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Saúde:</label>
                                        <input type="number" class="form-control" id="saude" name="saude" step=".02"
                                            placeholder="Saúde" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Estudo:</label>
                                        <input type="number" class="form-control" id="estudo" name="estudo" step=".02"
                                            placeholder="Estudo" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Casa:</label>
                                        <input type="number" class="form-control" id="casa" name="casa" step=".02"
                                            placeholder="Casa" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Compra:</label>
                                        <input type="number" class="form-control" id="compra" name="compra" step=".02"
                                            placeholder="Compra" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Viagem:</label>
                                        <input type="number" class="form-control" id="viagem" name="viagem" step=".02"
                                            placeholder="Viagem" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Cuidado Pessoal:</label>
                                        <input type="number" class="form-control" id="cuidado" name="cuidado" step=".02"
                                            placeholder="Cuidado Pessola" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Trabalho:</label>
                                        <input type="number" class="form-control" id="trabalho" name="trabalho"
                                            step=".02" placeholder="Trabalho" required>
                                    </div>

                                    <br>
                                    <button class="btn btn-primary" type="submit" name="submitL"
                                        id="submitL">Adicionar</button>

                                    <button class="btn btn-primary" type="reset" name="resetL"
                                        id="resetL">Limpar</button>
                                </form>
                                <br> <br>

                                <!-- Tabela Limite de Gasto-->
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Alimentação</th>
                                            <th>Lazer</th>
                                            <th>Saúde</th>
                                            <th>Estudos</th>
                                            <th>Casa</th>
                                            <th>Compras</th>
                                            <th>Viagem</th>
                                            <th>Cuidados Pesoais</th>
                                            <th>Trabalho</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($user_dataL = mysqli_fetch_assoc($resL)) {
                                            echo "<tr>";
                                            echo "<td>" . $user_dataL['id'] . "</td>";
                                            echo "<td>" . $user_dataL['alimentacao'] . "</td>";
                                            echo "<td>" . $user_dataL['lazer'] . "</td>";
                                            echo "<td>" . $user_dataL['saude'] . "</td>";
                                            echo "<td>" . $user_dataL['estudo'] . "</td>";
                                            echo "<td>" . $user_dataL['casa'] . "</td>";
                                            echo "<td>" . $user_dataL['compra'] . "</td>";
                                            echo "<td>" . $user_dataL['viagem'] . "</td>";
                                            echo "<td>" . $user_dataL['cuidado'] . "</td>";
                                            echo "<td>" . $user_dataL['trabalho'] . "</td>";
                                            echo "<td><a class='btn btn-secondary' role='button' href='processo_excluir_limite_gasto.php?id=" . $user_dataL['id'] ."'><i class='fas fa-trash'></i></a>&nbsp;&nbsp;</td>\n";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br><br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script barra de progresso-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante1 = document.getElementById("meuControleDeslizante1");
        const valorExibido1 = document.getElementById("valorControleDeslizante1");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante1.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido1.textContent = controleDeslizante1.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante2 = document.getElementById("meuControleDeslizante2");
        const valorExibido2 = document.getElementById("valorControleDeslizante2");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante2.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido2.textContent = controleDeslizante2.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante3 = document.getElementById("meuControleDeslizante3");
        const valorExibido3 = document.getElementById("valorControleDeslizante3");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante3.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido3.textContent = controleDeslizante3.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante4 = document.getElementById("meuControleDeslizante4");
        const valorExibido4 = document.getElementById("valorControleDeslizante4");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante4.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido4.textContent = controleDeslizante4.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante5 = document.getElementById("meuControleDeslizante5");
        const valorExibido5 = document.getElementById("valorControleDeslizante5");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante5.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido5.textContent = controleDeslizante5.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante6 = document.getElementById("meuControleDeslizante6");
        const valorExibido6 = document.getElementById("valorControleDeslizante6");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante6.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido6.textContent = controleDeslizante6.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante7 = document.getElementById("meuControleDeslizante7");
        const valorExibido7 = document.getElementById("valorControleDeslizante7");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante7.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido7.textContent = controleDeslizante7.value;
        });
    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante8 = document.getElementById("meuControleDeslizante8");
        const valorExibido8 = document.getElementById("valorControleDeslizante8");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante8.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido8.textContent = controleDeslizante8.value;
        });

    </script>

    <script>
        // Selecione o controle deslizante e o elemento para exibir o valor
        const controleDeslizante9 = document.getElementById("meuControleDeslizante9");
        const valorExibido9 = document.getElementById("valorControleDeslizante9");

        // Adicione um ouvinte de evento para detectar mudanças no controle deslizante
        controleDeslizante9.addEventListener("input", function () {
            // Atualize o valor exibido com o valor atual do controle deslizante
            valorExibido9.textContent = controleDeslizante9.value;
        });
    </script>
</body>

</html>