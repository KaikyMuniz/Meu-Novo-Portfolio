<?php
/**
 * Configuração de Idiomas e Dados Globais do Portfólio
 * Kaiky Muniz - Desenvolvedor Backend
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicialização e definição do idioma corrente (pt ou en)
$lang = 'pt';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'pt';
    $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

// Inicialização e definição do tema do portfólio (dark ou light)
$theme = 'dark';
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'] === 'light' ? 'light' : 'dark';
    $_SESSION['theme'] = $theme;
    setcookie('theme', $theme, time() + (86400 * 30), "/");
} elseif (isset($_SESSION['theme'])) {
    $theme = $_SESSION['theme'];
} elseif (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}

// Arquivo de traduções estruturado
$translations = [
    'pt' => [
        'metaDescription' => 'Portfólio de Kaiky Muniz, desenvolvedor Backend com foco em PHP, bancos de dados, PHP e JavaScript.',
        'navHome' => 'Início',
        'navProjects' => 'Projetos',
        'navAbout' => 'Sobre mim',
        'navContact' => 'Contato',

        'heroGreeting' => 'Olá, sou o Kaiky Muniz!',
        'heroSub' => 'Desenvolvedor Back-End',
        'heroDesc' => 'Focado em construir APIs robustas, gerenciar bancos de dados eficientes e criar aplicações web rápidas e funcionais. Seja muito bem-vindo(a) ao meu portfólio!',
        'viewProjectsBtn' => 'Ver Projetos',
        'contactBtn' => 'Entrar em Contato',

        'backEndDev' => 'Desenvolvedor Backend',
        'apiInt' => 'REST / Integrações',
        'dbMgmt' => 'Bancos de Dados',
        'yearsActive' => 'Projetos Ativos',

        'techSkillsTitle' => 'Habilidades Técnicas',
        'techSkillsDesc' => 'Sólido domínio de lógica de programação para backend, do ciclo completo de requisições web, segurança em bancos de dados SQL, além de conhecimentos em integrações de APIs RESTful.',
        'skillsBackend' => 'Back-End & Bancos de Dados',
        'skillsFrontend' => 'Front-End',
        'skillsTools' => 'Ferramentas & Metodologias',

        'projectsTitle' => 'Meus Projetos',
        'projectsDesc' => 'Trabalhos acadêmicos, freelancers e desafios práticos resolvidos ao longo da minha jornada tech.',
        'allCategories' => 'Todos',
        'catFreelance' => 'Freelancer',
        'catWeb' => 'Sites Institucionais',
        'catBackend' => 'APIs & Core PHP/JS',
        'catGame' => 'Jogos Interativos',
        'catUtility' => 'Utilitários',

        'seeProject' => 'Confira o projeto',
        'seeDocs' => 'Confira a documentação',
        'featured' => 'Destaque',

        'aboutTitle' => 'Sobre Mim',
        'aboutHeadline' => 'Um pouco mais de quem eu sou e minhas aspirações na engenharia backend.',
        'aboutSubtitle' => 'Desenvolvedor focado em soluções lógicas para o backend.',
        'aboutText' => 'Sou apaixonado por tecnologia e fascinado pela arquitetura de sistemas. Gosto de resolver problemas estruturando fluxos de dados, mantendo bancos de dados bem organizados e construindo APIs funcionais e seguras. Utilizo linguagens como PHP e JavaScript, prezando sempre por código legível e otimizado para o servidor.',
        'aboutDetailTitle' => 'Filosofia de Trabalho',
        'cleanCodeTitle' => 'Código Limpo',
        'cleanCodeDesc' => 'Escrever lógica de maneira modular e clara facilitando a escalabilidade, manutenção e o trabalho em equipe.',
        'queryEngTitle' => 'Engenharia de Dados',
        'queryEngDesc' => 'Modelar bancos de dados seguros, performáticos, normalizados e com consultas SQL rápidas.',

        'contactTitle' => 'Entre em Contato',
        'contactDesc' => 'Estou sempre aberto a novos projetos, oportunidades de trabalho de backend e colaborações freelancers.',
        'copyEmailSuccess' => 'E-mail copiado! Cole onde preferir.',
        'footerCopyright' => 'Todos os direitos reservados. Projetado e desenvolvido com PHP e Tailwind CSS.',

        'langSelect' => 'Mudar idioma',
        'themeSelect' => 'Mudar tema',
        'themeDark' => 'Modo Escuro',
        'themeLight' => 'Modo Claro',

        // Academic and Professional Experience
        'aboutExperiencesTitle' => 'Experiências Acadêmicas e Profissionais',
        'exp1Title' => 'Auxiliar de Gestão Pública',
        'exp1Company' => 'Prefeitura de Itaquaquecetuba — Funcionário Público',
        'exp1Period' => '12/2025 - o momento',
        'exp1Desc' => 'Atuo atualmente com rotinas administrativas lidando com a criação de processos e demais compromissos requisitados pelo município.',
        'exp2Title' => 'Recepcionista Geral & Backup de TI',
        'exp2Company' => 'Poupatempo de Itaquaquecetuba',
        'exp2Period' => '03/2024 - 12/2025',
        'exp2Desc' => 'Trabalhava diariamente com o atendimento aos cidadãos de São Paulo e com serviços de emissão de documentos (CIN, CNH, Documentos de Veículos). Além disso, realizo consultas e regularização de documentos, serviços de trânsito, serviços eleitorais, dentre outros. Também atuo em determinadas ocasiões como TI da unidade Poupatempo de Itaquaquecetuba, em casos de férias ou ausências dos principais TIs da unidade.',
        'exp3Title' => 'Desenvolvedor Web Freelancer',
        'exp3Company' => 'Kodeka Dev & Autônomo',
        'exp3Period' => '2024 - o momento',
        'exp3Desc' => 'Atuo de forma independente liderando o fechamento de vendas e o desenvolvimento de websites profissionais de alto padrão e landing pages comerciais (como e-commerces de alto padrão e sites institucionais). Gerencio todo o ciclo dos projetos como freelancer, desde a prospecção ativa até a modelagem do banco de dados, desenvolvimento completo do back-end e otimização para SEO.',
        'exp4Title' => 'Desenvolvedor Web',
        'exp4Company' => 'Trabalho de Conclusão de Curso (TCC)',
        'exp4Period' => '02/2023 - 12/2023',
        'exp4Desc' => 'Projeto: Orientação 360 - O projeto consiste em um website que disponibiliza um melhor direcionamento e oportunidade aos jovens que concluem seu ensino médio, e lidam com a falta de orientação para ingressar no mercado de trabalho ou em um ensino superior. Observação: O projeto se encontra disponível na página \'Meus Projetos\'.',
        'exp5Title' => 'Bacharelado em Engenharia de Software',
        'exp5Company' => 'Uninter — Ensino Superior',
        'exp5Period' => '02/2024 - 02/2028',
        'exp5Desc' => 'Curso superior com foco em engenharia de requisitos, arquitetura e engenharia de software, metodologias ágeis de desenvolvimento, qualidade e teste de software, e gestão de projetos com foco na criação de sistemas complexos e robustos.',
        'exp6Title' => 'Ensino Médio Integrado ao Técnico em Desenvolvimento de Sistemas',
        'exp6Company' => 'Etec de Itaquaquecetuba — Ensino Técnico',
        'exp6Period' => '01/2021 - 12/2023',
        'exp6Desc' => 'Formação profissionalizante abrangendo lógica de programação, desenvolvimento web, banco de dados relacionais, análise de sistemas, infraestrutura local de computadores e trabalho em equipe no desenvolvimento de projetos de backend e frontend.',
    ],
    'en' => [
        'metaDescription' => 'Modern portfolio of Kaiky Muniz, Backend developer focusing on APIs, databases, PHP, and Node.js.',
        'navHome' => 'Home',
        'navProjects' => 'Projects',
        'navAbout' => 'About Me',
        'navContact' => 'Contact',

        'heroGreeting' => "Hi, I'm Kaiky Muniz!",
        'heroSub' => 'Back-End Developer',
        'heroDesc' => 'Focused on building robust APIs, managing efficient databases, and creating fast, functional Web Applications. Welcome to my portfolio!',
        'viewProjectsBtn' => 'View Projects',
        'contactBtn' => 'Get in Touch',

        'backEndDev' => 'Backend Developer',
        'apiInt' => 'REST / Integrations',
        'dbMgmt' => 'Databases',
        'yearsActive' => 'Active Projects',

        'techSkillsTitle' => 'Technical Skills',
        'techSkillsDesc' => 'Solid logic grasp on backend engineering, request lifecycle management, database query structures, with high focus on REST integration patterns.',
        'skillsBackend' => 'Backend & SQL Databases',
        'skillsFrontend' => 'Frontend',
        'skillsTools' => 'Ecosystem & Tools',

        'projectsTitle' => 'My Projects',
        'projectsDesc' => 'Academic projects, freelance endeavors, and hands-on technical solutions designed throughout my journey.',
        'allCategories' => 'All',
        'catFreelance' => 'Freelance',
        'catWeb' => 'Corporate Sites',
        'catBackend' => 'APIs & Core PHP/JS',
        'catGame' => 'Interactive Games',
        'catUtility' => 'Utilities',

        'seeProject' => 'Check project',
        'seeDocs' => 'Read documentation',
        'featured' => 'Featured',

        'aboutTitle' => 'About Me',
        'aboutHeadline' => 'A structured look into who I am and my engineering goals in the software industry.',
        'aboutSubtitle' => 'Developer focused on strict logic and backend-driven engineering.',
        'aboutText' => 'I am deeply passionate about systems orchestration, networking and backend. I love handling data flows, optimizing SQL schemas, and deploying reliable APIs. I use PHP and Node.js on a daily basis and focus on writing legible, fast, and scalable server architectures with native security constraints.',
        'aboutDetailTitle' => 'Development Philosophy',
        'cleanCodeTitle' => 'Clean Code',
        'cleanCodeDesc' => 'Writing clear, decoupled modules following DRY and single-responsibility structures for painless integrations.',
        'queryEngTitle' => 'Data Management',
        'queryEngDesc' => 'Structuring databases, indices, and writing optimized SQL queries guaranteeing data integrity.',

        'contactTitle' => 'Get in Touch',
        'contactDesc' => 'I am always open to discussing new backend opportunities, freelance projects, and database architectures.',
        'copyEmailSuccess' => 'Email address copied! Paste it anywhere.',
        'footerCopyright' => 'All rights reserved. Styled with Tailwind CSS & built natively under PHP.',

        'langSelect' => 'Change language',
        'themeSelect' => 'Change theme',
        'themeDark' => 'Dark Mode',
        'themeLight' => 'Light Mode',

        // Academic and Professional Experience
        'aboutExperiencesTitle' => 'Academic and Professional Experience',
        'exp1Title' => 'Public Management Assistant',
        'exp1Company' => 'Itaquaquecetuba City Hall — Public Representative',
        'exp1Period' => '12/2025 - Present',
        'exp1Desc' => 'Currently working with administrative routines, handling process creation, public records, and other civic demands requested by the municipality.',
        'exp2Title' => 'General Receptionist & IT Backup',
        'exp2Company' => 'Poupatempo de Itaquaquecetuba',
        'exp2Period' => '03/2024 - 12/2025',
        'exp2Desc' => 'Worked daily in citizen dispatching and document issuance workflows (CIN, CNH, Vehicle records). Conducted regularizations, and managed traffic/electoral procedures. Served on demand as the IT Administrator for the Itaquaquecetuba Poupatempo branch during holidays and staff absences.',
        'exp3Title' => 'Freelance Web Developer',
        'exp3Company' => 'Kodeka Dev & Self-Employed',
        'exp3Period' => '2024 - Present',
        'exp3Desc' => 'Developing advanced high-profile websites, custom landing pages, and commercial e-commerces. Handling the complete lifecycle as a freelancer, from client outreach and sales closing, to schema definitions, API developments, and SEO tuning.',
        'exp4Title' => 'Web Developer',
        'exp4Company' => 'Graduation Final Project (TCC)',
        'exp4Period' => '02/2023 - 12/2023',
        'exp4Desc' => 'Project: Orientação 360 - Designed and engineered a web application helping recent high school graduates explore professional tracks, universities, and career pathways. (Note: Project reference is available in the \'My Projects\' catalog).',
        'exp5Title' => "Bachelor's Degree in Software Engineering",
        'exp5Company' => 'Uninter — Higher Education',
        'exp5Period' => '02/2024 - 02/2028',
        'exp5Desc' => 'Higher education focusing on systems architecture, requirement engineering, agile methodologies, software testing and quality assurance, and project management targeted at delivering complex, reliable software solutions.',
        'exp6Title' => 'Integrated High School and Systems Development Technician',
        'exp6Company' => 'Etec de Itaquaquecetuba — Technical School',
        'exp6Period' => '01/2021 - 12/2023',
        'exp6Desc' => 'Technical program covering programming logic, web development, relational database design, systems analysis, computer networking basics, and collaborative full-stack web project design.',
    ]
];

$t = $translations[$lang];

// Helper para manter URLs dinâmicas com parâmetros de idioma, tema e categoria
function getPortfolioUrl($newLang = null, $newTheme = null, $newCat = null)
{
    global $lang, $theme, $selectedCategory;
    $l = ($newLang !== null) ? $newLang : $lang;
    $th = ($newTheme !== null) ? $newTheme : $theme;
    $c = ($newCat !== null) ? $newCat : (isset($selectedCategory) ? $selectedCategory : 'all');

    return "?lang=" . urlencode($l) . "&theme=" . urlencode($th) . "&category=" . urlencode($c);
}

// Projetos cadastrados
$projects = [
    [
        'id' => 'kodeka-dev',
        'title' => 'Kodeka Dev',
        'descriptionPt' => 'Plataforma criada com o objetivo de prospectar novos clientes e realizar vendas de websites institucionais e e-commerces de alto padrão como desenvolvedor freelancer.',
        'descriptionEn' => 'Commercial and business platform designed to prospect new clients and close sales of custom landing pages, institutional websites, and high-end e-commerces as a freelance developer.',
        'datePt' => 'Março de 2025',
        'dateEn' => 'March 2025',
        'techs' => ['HTML5', 'Tailwind CSS', 'JavaScript'],
        'link' => 'https://kodekadev.com/',
        'category' => 'freelance',
        'featured' => true
    ],
    [
        'id' => 'portfolio-helena',
        'title' => 'Portfólio Pessoal',
        'descriptionPt' => 'Projeto freelancer focado em compartilhar conquistas e objetivos profissionais da Helena Landim, agindo como um portfólio pessoal elegante.',
        'descriptionEn' => 'Freelance project focused on sharing professional achievements and goals for Helena Landim, operating as an elegant personal portfolio.',
        'datePt' => 'Janeiro de 2025',
        'dateEn' => 'January 2025',
        'techs' => ['WordPress'],
        'link' => 'https://helenalandimportfolio.site/',
        'category' => 'freelance',
        'featured' => true
    ],
    [
        'id' => 'shines-clean',
        'title' => "Shine's Clean",
        'descriptionPt' => 'Website comercial destinado a compartilhar os serviços profissionais de higienização e limpeza de estofados da empresa Shine\'s Clean.',
        'descriptionEn' => 'Commercial website designed to showcase professional upholstery cleaning and sanitizing services for Shine\'s Clean.',
        'datePt' => 'Novembro de 2024',
        'dateEn' => 'November 2024',
        'techs' => ['HTML5', 'Tailwind CSS', 'JavaScript'],
        'link' => 'https://shinesclean.com.br/',
        'category' => 'freelance',
        'featured' => true
    ],
    [
        'id' => 'gaacci',
        'title' => 'Gaacci ONG',
        'descriptionPt' => 'Website institucional desenvolvido para divulgação de uma ONG voltada para a inclusão de crianças de comunidades vulneráveis na escola regular.',
        'descriptionEn' => 'Institutional website built to promote an NGO focused on the inclusion of vulnerable community children into mainstream schooling.',
        'datePt' => 'Fevereiro a Maio de 2024',
        'dateEn' => 'February to May 2024',
        'techs' => ['PHP', 'MySQL', 'CSS3', 'Git'],
        'link' => 'https://gaacci.org/',
        'category' => 'freelance',
        'featured' => true
    ],
    [
        'id' => 'pandim',
        'title' => 'Pandim',
        'descriptionPt' => 'Uma rede social semelhante ao Twitter, contendo recursos de postagens em tempo real, perfil personalizável, CRUD completo e recuperação de conta por e-mail.',
        'descriptionEn' => 'A social network resembling Twitter, featuring real-time posts, customizable profiles, full CRUD operations, and email account recovery.',
        'datePt' => 'Dezembro de 2023',
        'dateEn' => 'December 2023',
        'techs' => ['PHP', 'MySQL', 'JavaScript', 'SMTP Mailer'],
        'link' => 'https://mediumslateblue-ant-549701.hostingersite.com/',
        'category' => 'backend',
        'featured' => true
    ],
    [
        'id' => 'api-paises',
        'title' => 'Trabalhando com API em PHP',
        'descriptionPt' => 'Dashboard completo que consome uma API geográfica pública para buscar, filtrar e renderizar dados e bandeiras de diversos países.',
        'descriptionEn' => 'A complete dashboard consuming a public geographic API to fetch, filter, and render data and flags from various countries.',
        'datePt' => 'Fevereiro a Novembro de 2023',
        'dateEn' => 'February to November 2023',
        'techs' => ['PHP', 'REST API', 'JSON', 'CSS3'],
        'link' => 'https://lightsteelblue-tarsier-958345.hostingersite.com/',
        'category' => 'backend',
        'featured' => false
    ],
    [
        'id' => 'orientacao-360',
        'title' => 'Orientação 360',
        'descriptionPt' => 'Projeto de conclusão de curso para auxiliar jovens formandos do ensino médio na escolha do caminho pessoal e profissional no pós-escola.',
        'descriptionEn' => 'Graduation project built to assist high school graduates in choosing their personal and professional path after school.',
        'datePt' => 'Novembro de 2023',
        'dateEn' => 'November 2023',
        'techs' => ['PHP', 'MySQL', 'JavaScript', 'Academic Docs'],
        'link' => 'https://skyblue-antelope-855282.hostingersite.com/',
        'docLink' => 'https://kaikyportfolio.site/assets/document/Monografia%20-%20Orienta%C3%A7%C3%A3o%20360.pdf',
        'category' => 'web',
        'featured' => false
    ],
    [
        'id' => 'jokenpo',
        'title' => 'Pedra, Papel e Tesoura',
        'descriptionPt' => 'Jogo interativo desenhado para entretenimento rápido, permitindo que o usuário dispute partidas de pedra, papel e tesoura contra o sistema com IA simples.',
        'descriptionEn' => 'Interactive game designed for quick entertainment, enabling users to play Rock, Paper, Scissors against an AI system.',
        'datePt' => 'Outubro de 2023',
        'dateEn' => 'October 2023',
        'techs' => ['JavaScript', 'HTML5', 'CSS3', 'Keyframes'],
        'link' => 'https://jogo-pedra-papel-e-tesoura.vercel.app/',
        'category' => 'game',
        'featured' => false
    ],
    [
        'id' => 'mega-sena',
        'title' => 'Sorteio Mega Sena',
        'descriptionPt' => 'Simulador estatístico onde o usuário escolhe 6 números de 01 a 60 e analisa os resultados gerados pelo sorteio randômico do sistema.',
        'descriptionEn' => 'Statistical simulator where users pick 6 numbers from 01 to 60 and analyze results generated by the random system drawing.',
        'datePt' => 'Setembro de 2023',
        'dateEn' => 'September 2023',
        'techs' => ['JavaScript', 'Math Engine', 'CSS3 Animation'],
        'link' => 'https://mega-sena-sorteio.vercel.app/',
        'category' => 'utility',
        'featured' => false
    ],
    [
        'id' => 'math-week',
        'title' => 'Math Week Enigmas',
        'descriptionPt' => 'Plataforma de desativação de bomba por enigmas criada para eventos acadêmicos, unindo resolução de problemas espaciais e matemáticos.',
        'descriptionEn' => 'Riddle platform designed for a technical school event, combining math and space puzzle-solving to \'defuse a bomb\' under pressure.',
        'datePt' => 'Novembro de 2022',
        'dateEn' => 'November 2022',
        'techs' => ['HTML5', 'CSS3', 'JavaScript', 'Event Triggering'],
        'link' => 'https://desativar-bomba.vercel.app/',
        'category' => 'game',
        'featured' => false
    ],
    [
        'id' => 'bhaskara',
        'title' => 'Calculadora de Delta e Bhaskara',
        'descriptionPt' => 'Calculadora científica que resolve equações quadráticas inteiras, exibindo o passo a passo didático das fórmulas e gráficos de delta e bhaskara.',
        'descriptionEn' => 'Scientific calculator that solves quadratic equations, explaining step-by-step mathematical theorems and formulas for delta & bhaskara.',
        'datePt' => 'Setembro de 2022',
        'dateEn' => 'September 2022',
        'techs' => ['JavaScript', 'HTML5', 'CSS3 Layouts'],
        'link' => 'https://resolver-delta-e-bhaskara.vercel.app/',
        'category' => 'utility',
        'featured' => false
    ],
    [
        'id' => 'mcdonalds',
        'title' => "McDonald's - Trabalhe Conosco",
        'descriptionPt' => 'Primeiro projeto acadêmico focado no back-end utilizando PHP e Sessões do servidor para simulação de formulários de recrutamento.',
        'descriptionEn' => 'First backend academic project focusing on PHP and Server Sessions to simulate recruitment application forms.',
        'datePt' => 'Novembro de 2022',
        'dateEn' => 'November 2022',
        'techs' => ['PHP', 'HTML Sessions', 'Basic CSS'],
        'link' => 'https://darkred-cobra-827281.hostingersite.com/',
        'category' => 'web',
        'featured' => false
    ]
];

// Skills cadastradas
$skills = [
    ['name' => 'PHP', 'level' => 'Advanced', 'category' => 'backend'],
    ['name' => 'Node.js', 'level' => 'Intermediate', 'category' => 'backend'],
    ['name' => 'MySQL', 'level' => 'Advanced', 'category' => 'backend'],
    ['name' => 'APIs RESTful', 'level' => 'Advanced', 'category' => 'backend'],

    ['name' => 'HTML5 / CSS3', 'level' => 'Advanced', 'category' => 'frontend'],
    ['name' => 'JavaScript', 'level' => 'Advanced', 'category' => 'frontend'],
    ['name' => 'Tailwind CSS', 'level' => 'Intermediate', 'category' => 'frontend'],

    ['name' => 'Git', 'level' => 'Advanced', 'category' => 'tools'],
    ['name' => 'GitHub', 'level' => 'Advanced', 'category' => 'tools'],
    ['name' => 'Figma', 'level' => 'Intermediate', 'category' => 'tools'],
    ['name' => 'Docker', 'level' => 'Basic', 'category' => 'tools'],
    ['name' => 'Composer (PHP)', 'level' => 'Advanced', 'category' => 'tools'],
    ['name' => 'npm / Yarn', 'level' => 'Intermediate', 'category' => 'tools'],
];
