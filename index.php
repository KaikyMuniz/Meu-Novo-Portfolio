<?php
/**
 * Página Principal do Portfólio em PHP
 */
require_once 'config.php';
include_once 'header.php';

// Filtro de categoria de projetos por query string
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
$filteredProjects = [];
foreach ($projects as $p) {
    if ($selectedCategory === 'all' || $p['category'] === $selectedCategory) {
        $filteredProjects[] = $p;
    }
}

// Estilos de Controle do Tema (Escuro / Claro) instalados de forma centralizada
$style_textTitle = ($theme === 'dark') ? 'text-white' : 'text-slate-900';
$style_textMuted = ($theme === 'dark') ? 'text-slate-500' : 'text-slate-400';
$style_textSec = ($theme === 'dark') ? 'text-slate-400' : 'text-slate-600';
$style_border = ($theme === 'dark') ? 'border-slate-800' : 'border-slate-200';
$style_border900 = ($theme === 'dark') ? 'border-slate-900 border-slate-800/80' : 'border-slate-200 border-slate-100';
$style_cardBg = ($theme === 'dark') ? 'bg-slate-900/40 border-slate-800/80 hover:bg-slate-900/60 hover:border-slate-700/80 shadow-black/25' : 'bg-white border-slate-200/80 hover:bg-slate-50/50 hover:border-indigo-400/40 shadow-slate-100/50 shadow-sm';
$style_cardBgNoH = ($theme === 'dark') ? 'bg-slate-900/40 border-slate-800/80' : 'bg-white border-slate-200/80 shadow-sm';
$style_iconBg = ($theme === 'dark') ? 'bg-slate-950 border border-slate-800/60' : 'bg-slate-50 border border-slate-200/60 shadow-inner';
$style_badgeBg = ($theme === 'dark') ? 'bg-slate-950/80 border border-slate-800/40 text-slate-400' : 'bg-slate-100 border border-slate-200/40 text-slate-600';
$style_terminalBg = ($theme === 'dark') ? 'bg-slate-900/60 border-slate-800' : 'bg-slate-950 border-slate-900';

function translateSkillLevel($level, $lang)
{
    if ($lang === 'pt') {
        switch (strtolower($level)) {
            case 'advanced':
                return 'Avançado';
            case 'intermediate':
                return 'Intermediário';
            case 'basic':
                return 'Básico';
        }
    }
    return ucfirst($level);
}

function getPhpProjectIcon($id)
{
    switch ($id) {
        case "kodeka-dev":
            return '💼';
        case "portfolio-helena":
            return '⚡';
        case "shines-clean":
            return '✨';
        case "gaacci":
            return '❤️';
        case "pandim":
            return '💬';
        case "api-paises":
            return '🌐';
        case "orientacao-360":
            return '🧭';
        case "jokenpo":
            return '🎮';
        case "mega-sena":
            return '🎲';
        case "math-week":
            return '🧠';
        case "bhaskara":
            return '🧮';
        case "mcdonalds":
            return '💼';
        default:
            return '💻';
    }
}
?>

<main class="flex-1 w-full max-w-6xl mx-auto px-4 sm:px-6">

    <!-- HERO SECTION -->
    <section id="hero" class="pt-12 pb-20 md:py-24 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

        <!-- Left Text Content -->
        <div class="lg:col-span-7 space-y-6">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 bg-sky-500/10 border border-sky-500/20 rounded-full text-sky-400 text-xs font-mono">
                <span class="w-1.5 h-1.5 bg-sky-400 rounded-full animate-pulse"></span>
                <?php echo $t['backEndDev']; ?>
            </div>

            <h1
                class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-tight <?php echo $style_textTitle; ?>">
                <?php echo $t['heroGreeting']; ?>
                <br>
                <span class="bg-gradient-to-r from-sky-400 via-indigo-400 to-purple-400 bg-clip-text text-transparent">
                    <?php echo $t['heroSub']; ?>
                </span>
            </h1>

            <p class="<?php echo $style_textSec; ?> text-base sm:text-lg max-w-xl font-normal leading-relaxed">
                <?php echo $t['heroDesc']; ?>
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="#projects"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white rounded-xl font-medium outline-none border border-sky-400/20 shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/30 transition-all hover:translate-y-[-2px]">
                    <?php echo $t['viewProjectsBtn']; ?>
                    <span class="font-mono">📄</span>
                </a>

                <a href="#contact"
                    class="inline-flex items-center gap-2 px-6 py-3 <?php echo ($theme === 'dark') ? 'bg-slate-900 hover:bg-slate-800 text-slate-200 hover:text-white border-slate-800 hover:border-slate-700' : 'bg-white hover:bg-slate-100 text-slate-700 hover:text-slate-900 border-slate-200 hover:border-slate-300 shadow-sm'; ?> rounded-xl font-medium outline-none border transition-all hover:translate-y-[-2px]">
                    <?php echo $t['contactBtn']; ?>
                    <span class="text-sky-400">✉️</span>
                </a>
            </div>

            <!-- Stats parameters indicators -->
            <div class="grid grid-cols-3 gap-6 pt-8 border-t <?php echo $style_border900; ?>">
                <div>
                    <span class="block font-display font-bold text-3xl <?php echo $style_textTitle; ?>">30+</span>
                    <span class="text-xs text-slate-500 font-medium tracking-wide uppercase">
                        <?php echo $t['yearsActive']; ?>
                    </span>
                </div>
                <div>
                    <span class="block font-display font-bold text-3xl <?php echo $style_textTitle; ?>">PHP</span>
                    <span class="text-xs text-slate-500 font-medium tracking-wide uppercase">
                        Backend
                    </span>
                </div>
                <div>
                    <span class="block font-display font-bold text-3xl <?php echo $style_textTitle; ?>">SQL</span>
                    <span class="text-xs text-slate-500 font-medium tracking-wide uppercase">
                        <?php echo $t['dbMgmt']; ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Right Terminal Mock -->
        <div class="lg:col-span-5 h-full flex items-center">
            <div
                class="w-full <?php echo $style_terminalBg; ?> rounded-2xl shadow-2xl relative overflow-hidden backdrop-blur-md transition-colors duration-200">
                <div class="bg-slate-900 px-4 py-3 border-b border-slate-800/80 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-rose-500/80 rounded-full"></div>
                        <div class="w-3 h-3 bg-amber-500/80 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-500/80 rounded-full"></div>
                        <span class="ml-2 font-mono text-xs text-slate-500 select-none">kaiky_profile.php</span>
                    </div>
                </div>

                <div class="p-5 font-mono text-[12px] overflow-auto max-h-[340px] leading-relaxed text-slate-300">
                    <pre class="whitespace-pre overflow-x-auto text-sky-300/95"><code><span class="text-pink-400">&lt;?php</span>
<span class="text-slate-500">/**
 * Kaiky Muniz - Software Developer
 * Hello World
 */</span>
<span class="text-indigo-400">class</span> <span class="text-emerald-400">KaikyDev</span> <span class="text-indigo-400">extends</span> <span class="text-emerald-300">Developer</span> 
{
    <span class="text-indigo-400">public</span> <span class="text-slate-300">function</span> <span class="text-emerald-400">getProfile</span>(): array 
    {
        <span class="text-pink-400">return</span> [
            <span class="text-amber-300">'name'</span> => <span class="text-emerald-300">'Kaiky Muniz'</span>,
            <span class="text-amber-300">'stack'</span> => [<span class="text-emerald-300">'PHP'</span>, <span class="text-emerald-300">'JavaScript'</span>, <span class="text-emerald-300">'MySQL'</span>],
            <span class="text-amber-300">'Education'</span> => <span class="text-emerald-300">Bachelor's Degree in Software Engineering – Uninter (In progress)</span>,
            <span class="text-amber-300">'Technical Degree'</span> => <span class="text-emerald-300">Systems Development – Etec</span>,
            <span class="text-amber-300">'favorite series'</span> => <span class="text-emerald-300">'Mr Robot and Breaking Bad'</span>
        ];
    }
}
<span class="inline-block w-1.5 h-4 ml-0.5 bg-sky-400/80 align-middle animate-pulse"></span></code></pre>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-20 border-t <?php echo $style_border900; ?> scroll-mt-20">
        <div class="space-y-4 text-center max-w-2xl mx-auto mb-12">
            <h2 class="font-display font-bold text-3xl sm:text-4xl <?php echo $style_textTitle; ?> tracking-tight">
                <?php echo $t['projectsTitle']; ?>
            </h2>
            <p class="<?php echo $style_textSec; ?> leading-relaxed text-sm sm:text-base">
                <?php echo $t['projectsDesc']; ?>
            </p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2 mb-10 pb-2 overflow-x-auto">
            <?php
            $categoriesList = [
                ['id' => 'all', 'label' => $t['allCategories']],
                ['id' => 'freelance', 'label' => $t['catFreelance']],
                ['id' => 'web', 'label' => $t['catWeb']],
                ['id' => 'backend', 'label' => $t['catBackend']],
                ['id' => 'game', 'label' => $t['catGame']],
                ['id' => 'utility', 'label' => $t['catUtility']],
            ];
            foreach ($categoriesList as $cat):
                $isActive = ($selectedCategory === $cat['id']);
                $filterUrl = getPortfolioUrl(null, null, $cat['id']) . "#projects";

                if ($isActive) {
                    $pillClass = ($theme === 'dark')
                        ? 'bg-slate-800 text-white border border-indigo-500/20 shadow-lg shadow-indigo-500/5'
                        : 'bg-indigo-50 text-indigo-700 border border-indigo-200 shadow-sm font-semibold';
                } else {
                    $pillClass = ($theme === 'dark')
                        ? 'text-slate-500 hover:text-slate-300 bg-slate-900/40 border border-transparent hover:bg-slate-900'
                        : 'text-slate-600 hover:text-indigo-600 bg-slate-100 border border-transparent hover:bg-slate-200/50';
                }
                ?>
                <a href="<?php echo $filterUrl; ?>"
                    class="px-4 py-2 rounded-xl text-xs sm:text-sm font-medium transition-all duration-200 shrink-0 <?php echo $pillClass; ?>">
                    <?php echo $cat['label']; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($filteredProjects)): ?>
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 text-slate-500 font-medium">
                    Nenhum projeto encontrado nesta categoria.
                </div>
            <?php else: ?>
                <?php foreach ($filteredProjects as $p): ?>
                    <div
                        class="<?php echo $style_cardBg; ?> rounded-2xl p-6 flex flex-col transition-all duration-300 group hover:-translate-y-1">

                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="p-3 rounded-xl <?php echo $style_iconBg; ?> text-xl font-medium flex items-center justify-center">
                                <?php echo getPhpProjectIcon($p['id']); ?>
                            </div>
                            <?php if ($p['featured']): ?>
                                <span
                                    class="px-2.5 py-0.5 bg-gradient-to-r from-sky-500/10 to-indigo-500/10 border border-sky-400/20 text-sky-400 font-mono text-[10px] uppercase font-bold tracking-wider rounded-full">
                                    <?php echo $t['featured']; ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="flex-grow space-y-2">
                            <div class="flex items-baseline justify-between gap-2">
                                <h3
                                    class="font-display font-semibold transition-colors duration-200 <?php echo $style_textTitle; ?> <?php echo ($theme === 'dark') ? 'group-hover:text-sky-300' : 'group-hover:text-indigo-600'; ?>">
                                    <?php echo $p['title']; ?>
                                </h3>
                                <span class="text-[10px] font-mono text-slate-500 shrink-0">
                                    <?php echo ($lang === 'pt') ? $p['datePt'] : $p['dateEn']; ?>
                                </span>
                            </div>

                            <p class="<?php echo $style_textSec; ?> text-xs sm:text-sm leading-relaxed line-clamp-3">
                                <?php echo ($lang === 'pt') ? $p['descriptionPt'] : $p['descriptionEn']; ?>
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-1.5 pt-4 pb-2">
                            <?php foreach ($p['techs'] as $tech): ?>
                                <span class="px-2 py-0.5 <?php echo $style_badgeBg; ?> font-mono text-[9px] tracking-wider rounded">
                                    <?php echo $tech; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="flex items-center gap-4 pt-4 mt-4 border-t <?php echo $style_border900; ?>">
                            <a href="<?php echo $p['link']; ?>" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1 text-xs font-semibold <?php echo ($theme === 'dark') ? 'text-sky-400 hover:text-sky-300' : 'text-sky-600 hover:text-sky-700'; ?> transition-all">
                                <span><?php echo $t['seeProject']; ?></span>
                                <span class="text-[10px]">↗️</span>
                            </a>

                            <?php if (isset($p['docLink']) && !empty($p['docLink'])): ?>
                                <a href="<?php echo $p['docLink']; ?>" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-500 hover:text-amber-400 transition-all ml-auto">
                                    <span>📘</span>
                                    <span><?php echo $t['seeDocs']; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section id="skills" class="py-20 border-t <?php echo $style_border900; ?> scroll-mt-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4 space-y-4">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-500/10 border border-indigo-500/20 rounded-full text-indigo-400 text-xs font-mono">
                    <span>🔌</span>
                    <?php echo $t['techSkillsTitle']; ?>
                </div>
                <h2
                    class="font-display font-bold text-3xl <?php echo $style_textTitle; ?> tracking-tight leading-tight">
                    <?php echo ($lang === 'pt') ? 'Habilidades & Linguagens' : 'Skills & Tooling'; ?>
                </h2>
                <p class="<?php echo $style_textSec; ?> text-sm leading-relaxed">
                    <?php echo $t['techSkillsDesc']; ?>
                </p>
            </div>

            <div class="lg:col-span-8 space-y-8">

                <div class="space-y-4">
                    <h3
                        class="font-mono text-xs <?php echo ($theme === 'dark') ? 'text-sky-400' : 'text-sky-600'; ?> font-bold uppercase tracking-wider flex items-center gap-2">
                        <span>⚙️</span>
                        <?php echo $t['skillsBackend']; ?>
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php foreach ($skills as $skill):
                            if ($skill['category'] === 'backend'): ?>
                                <div
                                    class="<?php echo $style_cardBgNoH; ?> rounded-xl p-3 flex items-center justify-between transition-colors duration-200">
                                    <span
                                        class="font-display font-medium <?php echo ($theme === 'dark') ? 'text-slate-200' : 'text-slate-700'; ?> text-sm"><?php echo $skill['name']; ?></span>
                                    <span
                                        class="text-[9px] font-mono tracking-wider uppercase px-2 py-0.5 rounded <?php echo $skill['level'] === 'Advanced' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20'; ?>">
                                        <?php echo translateSkillLevel($skill['level'], $lang); ?>
                                    </span>
                                </div>
                            <?php endif; endforeach; ?>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3
                        class="font-mono text-xs <?php echo ($theme === 'dark') ? 'text-sky-400' : 'text-sky-600'; ?> font-bold uppercase tracking-wider flex items-center gap-2">
                        <span>🎨</span>
                        <?php echo $t['skillsFrontend']; ?>
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php foreach ($skills as $skill):
                            if ($skill['category'] === 'frontend'): ?>
                                <div
                                    class="<?php echo $style_cardBgNoH; ?> rounded-xl p-3 flex items-center justify-between transition-colors duration-200">
                                    <span
                                        class="font-display font-medium <?php echo ($theme === 'dark') ? 'text-slate-200' : 'text-slate-700'; ?> text-sm"><?php echo $skill['name']; ?></span>
                                    <span
                                        class="text-[9px] font-mono tracking-wider uppercase px-2 py-0.5 rounded <?php echo $skill['level'] === 'Advanced' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20'; ?>">
                                        <?php echo translateSkillLevel($skill['level'], $lang); ?>
                                    </span>
                                </div>
                            <?php endif; endforeach; ?>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3
                        class="font-mono text-xs <?php echo ($theme === 'dark') ? 'text-sky-400' : 'text-sky-600'; ?> font-bold uppercase tracking-wider flex items-center gap-2">
                        <span>🛠️</span>
                        <?php echo $t['skillsTools']; ?>
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php foreach ($skills as $skill):
                            if ($skill['category'] === 'tools'): ?>
                                <div
                                    class="<?php echo $style_cardBgNoH; ?> rounded-xl p-3 flex items-center justify-between transition-colors duration-200">
                                    <span
                                        class="font-display font-medium <?php echo ($theme === 'dark') ? 'text-slate-200' : 'text-slate-700'; ?> text-sm"><?php echo $skill['name']; ?></span>
                                    <span
                                        class="text-[9px] font-mono tracking-wider uppercase px-2 py-0.5 rounded <?php echo $skill['level'] === 'Advanced' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : ($skill['level'] === 'Basic' ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20'); ?>">
                                        <?php echo translateSkillLevel($skill['level'], $lang); ?>
                                    </span>
                                </div>
                            <?php endif; endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="about" class="py-20 border-t <?php echo $style_border900; ?> scroll-mt-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <!-- LADO 1: FOTO PROFILE CARD (STICKY) -->
            <div class="lg:col-span-4 flex justify-center lg:sticky lg:top-24">
                <div
                    class="w-full max-w-sm rounded-3xl border p-6 shadow-2xl relative overflow-hidden group transition-all <?php echo ($theme === 'dark') ? 'bg-gradient-to-br from-slate-900 to-slate-950 border-slate-800/80' : 'bg-white border-slate-200 shadow-lg shadow-slate-100/70'; ?>">
                    <div class="relative z-10 space-y-6 text-center">
                        <!-- Foto de Perfil / Profile Avatar -->
                        <div
                            class="relative w-48 h-48 rounded-2xl bg-gradient-to-tr from-sky-400 via-indigo-500 to-emerald-400 p-[3px] mx-auto overflow-hidden group-hover:scale-105 transition-transform duration-300 shadow-md transform-gpu">
                            <div
                                class="w-full h-full rounded-[14px] overflow-hidden <?php echo ($theme === 'dark') ? 'bg-slate-950' : 'bg-slate-50'; ?> flex items-center justify-center">
                                <?php
                                if ($theme === 'dark') {
                                    $avatar_src = "assets/image/foto.png"; // Fallback escuro
                                } else {
                                    // Tema Claro (Light Theme)
                                    $avatar_src = "assets/image/foto.jpg"; // Fallback claro
                                }
                                ?>
                                <img 
                                    src="<?php echo $avatar_src; ?>" alt="Kaiky Muniz"> 
                            </div>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-2xl <?php echo $style_textTitle; ?>">Kaiky Muniz</h3>
                            <p
                                class="text-xs font-mono tracking-wider uppercase inline-block mt-1 <?php echo ($theme === 'dark') ? 'text-sky-400' : 'text-sky-600 font-semibold'; ?>">
                                <?php echo ($lang === 'pt') ? 'Auxiliar de Gestão Pública & Freelancer' : 'Public Management & Freelance Dev'; ?>
                            </p>
                            <div
                                class="flex items-center justify-center gap-1.5 mt-3 text-xs <?php echo $style_textSec; ?> font-mono">
                                <span>Itaquaquecetuba, SP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LADO 2: BIOGRAFIA E LINHA DO TEMPO -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Biografia Básica -->
                <div class="space-y-4">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-yellow-500/10 border border-yellow-500/20 rounded-full text-yellow-400 text-xs font-mono">
                        <span>💡</span>
                        <?php echo $t['navAbout']; ?>
                    </div>
                    <h2
                        class="font-display font-bold text-3xl tracking-tight <?php echo $style_textTitle; ?> leading-tight">
                        <?php echo $t['aboutHeadline']; ?>
                    </h2>
                    <p
                        class="leading-relaxed text-sm sm:text-base <?php echo ($theme === 'dark') ? 'text-slate-300' : 'text-slate-700'; ?>">
                        <?php echo $t['aboutText']; ?>
                    </p>
                </div>

                <!-- Value Proposition Badges -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 <?php echo $style_cardBgNoH; ?> rounded-xl transition-colors duration-200">
                        <h4
                            class="font-display font-bold <?php echo $style_textTitle; ?> text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            <?php echo $t['cleanCodeTitle']; ?>
                        </h4>
                        <p class="<?php echo $style_textSec; ?> text-xs mt-1.5 leading-relaxed">
                            <?php echo $t['cleanCodeDesc']; ?>
                        </p>
                    </div>

                    <div class="p-4 <?php echo $style_cardBgNoH; ?> rounded-xl transition-colors duration-200">
                        <h4
                            class="font-display font-bold <?php echo $style_textTitle; ?> text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                            <?php echo $t['queryEngTitle']; ?>
                        </h4>
                        <p class="<?php echo $style_textSec; ?> text-xs mt-1.5 leading-relaxed">
                            <?php echo $t['queryEngDesc']; ?>
                        </p>
                    </div>
                </div>

                <!-- Academic and Professional timeline -->
                <div class="pt-8 border-t <?php echo $style_border900; ?>">
                    <h3
                        class="font-display font-bold text-xl sm:text-2xl mb-8 flex items-center gap-3 <?php echo $style_textTitle; ?>">
                        <span class="text-indigo-400 text-2xl leading-none">💼</span>
                        <?php echo $t['aboutExperiencesTitle']; ?>
                    </h3>

                    <div
                        class="space-y-8 relative before:absolute before:inset-0 before:right-auto before:left-4 sm:before:left-6 before:w-[2px] before:bg-gradient-to-b before:from-indigo-500 before:via-sky-400 before:to-emerald-400">

                        <!-- Milestone 1: Auxiliar de Gestão Pública -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-indigo-400 group-hover:border-indigo-400' : 'bg-white border-slate-200 text-indigo-600 shadow-sm group-hover:border-indigo-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">🏢</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp1Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-indigo-400">
                                            <?php echo $t['exp1Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp1Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp1Desc']; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 2: Poupatempo -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-sky-400 group-hover:border-sky-400' : 'bg-white border-slate-200 text-sky-600 shadow-sm group-hover:border-sky-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">💻</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp2Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-sky-400">
                                            <?php echo $t['exp2Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-sky-500/10 text-sky-400 border border-sky-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp2Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp2Desc']; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 5: Bacharelado Uninter -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-violet-400 group-hover:border-violet-400' : 'bg-white border-slate-200 text-violet-600 shadow-sm group-hover:border-violet-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">🎓</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp5Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-violet-400">
                                            <?php echo $t['exp5Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-violet-500/10 text-violet-400 border border-violet-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp5Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp5Desc']; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 3: Desenvolvedor Freelancer -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-emerald-400 group-hover:border-emerald-400' : 'bg-white border-slate-200 text-emerald-600 shadow-sm group-hover:border-emerald-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">🌐</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp3Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-emerald-400">
                                            <?php echo $t['exp3Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp3Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp3Desc']; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Milestone 4: TCC -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-amber-500 group-hover:border-amber-400' : 'bg-white border-slate-200 text-amber-600 shadow-sm group-hover:border-amber-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">👨‍💻</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp4Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-amber-500">
                                            <?php echo $t['exp4Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-amber-500/10 text-amber-500 border border-amber-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp4Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp4Desc']; ?>
                                </p>
                            </div>
                        </div>
                        <!-- Milestone 6: Etec -->
                        <div class="relative pl-12 sm:pl-16 group">
                            <div
                                class="absolute left-0 top-1.5 w-8 h-8 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border transition-all <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-700 text-pink-400 group-hover:border-pink-400' : 'bg-white border-slate-200 text-pink-600 shadow-sm group-hover:border-pink-500'; ?> z-10">
                                <span class="text-sm sm:text-base select-none">🏫</span>
                            </div>
                            <div class="rounded-2xl border p-5 sm:p-6 transition-all <?php echo $style_cardBg; ?>">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                                    <div>
                                        <h4
                                            class="font-display font-bold text-base sm:text-lg <?php echo $style_textTitle; ?>">
                                            <?php echo $t['exp6Title']; ?>
                                        </h4>
                                        <span class="text-xs sm:text-sm font-medium text-pink-400">
                                            <?php echo $t['exp6Company']; ?>
                                        </span>
                                    </div>
                                    <div
                                        class="inline-flex items-center gap-1.5 text-[10px] font-mono px-2.5 py-1 rounded-full bg-pink-500/10 text-pink-400 border border-pink-500/20 self-start sm:self-center">
                                        <span class="text-[9px]">📅</span>
                                        <?php echo $t['exp6Period']; ?>
                                    </div>
                                </div>
                                <p class="text-xs sm:text-sm leading-relaxed <?php echo $style_textSec; ?>">
                                    <?php echo $t['exp6Desc']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-20 border-t <?php echo $style_border900; ?> scroll-mt-20">
        <div class="space-y-4 text-center max-w-2xl mx-auto mb-12">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 bg-teal-500/10 border border-teal-500/20 rounded-full text-teal-400 text-xs font-mono mx-auto">
                <span>📧</span>
                <?php echo $t['navContact']; ?>
            </div>
            <h2 class="font-display font-bold text-3xl sm:text-4xl <?php echo $style_textTitle; ?> tracking-tight">
                <?php echo $t['contactTitle']; ?>
            </h2>
            <p class="<?php echo $style_textSec; ?> leading-relaxed text-sm sm:text-base">
                <?php echo $t['contactDesc']; ?>
            </p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/kaiky-muniz/" target="_blank" rel="noopener noreferrer"
                class="<?php echo $style_cardBg; ?> hover:border-blue-500/20 p-6 rounded-2xl flex flex-col space-y-4 text-left transition-all hover:translate-y-[-2px] group">
                <div
                    class="w-12 h-12 rounded-xl flex items-center justify-center transition-colors <?php echo $style_iconBg; ?> text-slate-400 group-hover:text-blue-400 group-hover:border-blue-500/20 group-hover:bg-blue-500/5">
                    <span class="text-xl">💼</span>
                </div>
                <div class="space-y-1">
                    <span class="font-display font-bold <?php echo $style_textTitle; ?> text-base block">LinkedIn</span>
                    <span class="text-slate-500 text-xs font-mono uppercase tracking-wider">Acessar Perfil</span>
                </div>
            </a>

            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?phone=5511932973447" target="_blank" rel="noopener noreferrer"
                class="<?php echo $style_cardBg; ?> hover:border-emerald-500/20 p-6 rounded-2xl flex flex-col space-y-4 text-left transition-all hover:translate-y-[-2px] group">
                <div
                    class="w-12 h-12 rounded-xl flex items-center justify-center transition-colors <?php echo $style_iconBg; ?> text-slate-400 group-hover:text-emerald-400 group-hover:border-emerald-500/20 group-hover:bg-emerald-500/5">
                    <span class="text-xl">💬</span>
                </div>
                <div class="space-y-1">
                    <span class="font-display font-bold <?php echo $style_textTitle; ?> text-base block">WhatsApp</span>
                    <span class="text-slate-500 text-xs font-mono uppercase text-left group-hover:text-slate-300">
                        +55 (11) 93297-3447
                    </span>
                </div>
            </a>

            <a href="mailto:kaikymss@gmail.com" target="_blank" rel="noopener noreferrer"
                class="<?php echo $style_cardBg; ?> hover:border-teal-500/20 p-6 rounded-2xl flex flex-col space-y-4 text-left transition-all hover:translate-y-[-2px] cursor-pointer group">
                <div
                    class="w-12 h-12 rounded-xl flex items-center justify-center transition-colors <?php echo $style_iconBg; ?> text-slate-400 group-hover:text-teal-400 group-hover:border-teal-500/20 group-hover:bg-teal-500/5">
                    <span class="text-xl">✉️</span>
                </div>
                <div class="space-y-1">
                    <span class="font-display font-bold <?php echo $style_textTitle; ?> text-base block">Email</span>
                    <span class="<?php echo $style_textSec; ?> text-xs font-mono select-all">
                        kaikymss@gmail.com
                    </span>
                </div>
            </a>

        </div>
    </section>

</main>

<?php
include_once 'footer.php';
?>