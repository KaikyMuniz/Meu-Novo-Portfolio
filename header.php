<?php
/**
 * Cabeçalho do Portfólio em PHP
 */
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaiky Muniz | <?php echo $t['heroSub']; ?></title>
    <meta name="description" content="<?php echo $t['metaDescription']; ?>">
    <!-- Import Poppins and JetBrains Mono Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Import Tailwind CSS v4 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                        display: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background:
                <?php echo ($theme === 'dark') ? '#0f172a' : '#f1f5f9'; ?>
            ;
        }

        ::-webkit-scrollbar-thumb {
            background:
                <?php echo ($theme === 'dark') ? '#334155' : '#cbd5e1'; ?>
            ;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background:
                <?php echo ($theme === 'dark') ? '#475569' : '#94a3b8'; ?>
            ;
        }

        body {
            background-color: <?php echo ($theme === 'dark') ? '#0b1120' : '#f8fafc'; ?>;
            color: <?php echo ($theme === 'dark') ? '#f1f5f9' : '#1e293b'; ?>;
            background-image: 
                linear-gradient(to right, <?php echo ($theme === 'dark') ? 'rgba(255,255,255,0.015)' : 'rgba(15,23,42,0.012)'; ?> 1px, transparent 1px),
                linear-gradient(to bottom, <?php echo ($theme === 'dark') ? 'rgba(255,255,255,0.015)' : 'rgba(15,23,42,0.012)'; ?> 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-sans transition-colors duration-200 antialiased overflow-x-hidden <?php echo ($theme === 'dark') ? 'selection:bg-sky-500/30 selection:text-white' : 'selection:bg-indigo-500/20 selection:text-slate-900'; ?>">

    <!-- Gradient Glowing Spots Safely Contained to Prevent Mobile Overflow -->
    <div class="absolute inset-y-0 left-0 right-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-1/4 left-10 w-96 h-96 <?php echo ($theme === 'dark') ? 'bg-blue-500/5' : 'bg-blue-500/3'; ?> rounded-full blur-[120px] select-none"></div>
        <div class="absolute top-2/3 right-10 w-[450px] h-[450px] <?php echo ($theme === 'dark') ? 'bg-purple-500/5' : 'bg-indigo-500/3'; ?> rounded-full blur-[140px] select-none"></div>
    </div>

    <!-- GLASS HEADER navbar element -->
    <header id="headernav"
        class="sticky top-0 z-50 backdrop-blur-md transition-colors duration-200 <?php echo ($theme === 'dark') ? 'bg-slate-950/75 border-b border-slate-900' : 'bg-white/80 border-b border-slate-200/80 shadow-sm'; ?>">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="#hero" class="flex items-center gap-3 group">
                <div
                    class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-500 via-sky-500 to-emerald-500 p-[2px] shadow-lg shadow-indigo-500/15">
                    <div
                        class="w-full h-full <?php echo ($theme === 'dark') ? 'bg-slate-950' : 'bg-slate-50'; ?> rounded-[6px] flex items-center justify-center font-mono font-bold <?php echo ($theme === 'dark') ? 'text-white' : 'text-slate-800'; ?> group-hover:scale-105 transition-transform">
                        KM
                    </div>
                </div>
                <div>
                    <span
                        class="font-display font-bold text-lg tracking-tight <?php echo ($theme === 'dark') ? 'bg-gradient-to-r from-white via-slate-100 to-slate-400 bg-clip-text text-transparent' : 'bg-gradient-to-r from-slate-900 via-slate-800 to-slate-700 bg-clip-text text-transparent'; ?>">
                        Kaiky Muniz
                    </span>
                    <p
                        class="text-[10px] <?php echo ($theme === 'dark') ? 'text-sky-400/80' : 'text-sky-600/90'; ?> font-mono tracking-wider uppercase leading-none mt-0.5">
                        <?php echo $t['backEndDev']; ?>
                    </p>
                </div>
            </a>

            <!-- Navigation Links centered on desktop -->
            <nav
                class="hidden md:flex items-center gap-8 text-sm font-medium <?php echo ($theme === 'dark') ? 'text-slate-400' : 'text-slate-600'; ?>">
                <a href="#hero"
                    class="<?php echo ($theme === 'dark') ? 'hover:text-white' : 'hover:text-slate-900'; ?> hover:translate-y-[-1px] transition-all duration-200"><?php echo $t['navHome']; ?></a>
                <a href="#projects"
                    class="<?php echo ($theme === 'dark') ? 'hover:text-white' : 'hover:text-slate-900'; ?> hover:translate-y-[-1px] transition-all duration-200"><?php echo $t['navProjects']; ?></a>
                <a href="#skills"
                    class="<?php echo ($theme === 'dark') ? 'hover:text-white' : 'hover:text-slate-900'; ?> hover:translate-y-[-1px] transition-all duration-200"><?php echo $t['techSkillsTitle']; ?></a>
                <a href="#about"
                    class="<?php echo ($theme === 'dark') ? 'hover:text-white' : 'hover:text-slate-900'; ?> hover:translate-y-[-1px] transition-all duration-200"><?php echo $t['navAbout']; ?></a>
                <a href="#contact"
                    class="<?php echo ($theme === 'dark') ? 'hover:text-white' : 'hover:text-slate-900'; ?> hover:translate-y-[-1px] transition-all duration-200"><?php echo $t['navContact']; ?></a>
            </nav>

            <!-- Language and Theme switchers inside header containing flags -->
            <div class="flex items-center gap-3">
                <div
                    class="<?php echo ($theme === 'dark') ? 'bg-slate-900/95 border-slate-800' : 'bg-slate-100 border-slate-200/90 shadow-inner'; ?> rounded-full border p-1 flex items-center">
                    <!-- Português com bandeira do Brasil -->
                    <a href="<?php echo getPortfolioUrl('pt'); ?>"
                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-full text-xs font-semibold transition-all <?php echo $lang === 'pt' ? (($theme === 'dark') ? 'bg-gradient-to-r from-emerald-500/20 to-blue-500/20 text-white border border-emerald-500/30' : 'bg-white text-emerald-800 border border-emerald-300 shadow-sm') : (($theme === 'dark') ? 'text-slate-400 hover:text-white' : 'text-slate-500 hover:text-slate-800'); ?>"
                        title="Mudar idioma para Português (Brasil)">
                        <span>🇧🇷</span>
                        <span class="hidden sm:inline">PT</span>
                    </a>

                    <!-- Inglês com bandeira dos EUA -->
                    <a href="<?php echo getPortfolioUrl('en'); ?>"
                        class="flex items-center gap-1 px-2.5 py-1.5 rounded-full text-xs font-semibold transition-all <?php echo $lang === 'en' ? (($theme === 'dark') ? 'bg-gradient-to-r from-blue-500/20 to-indigo-500/20 text-white border border-blue-500/30' : 'bg-white text-blue-800 border border-blue-300 shadow-sm') : (($theme === 'dark') ? 'text-slate-400 hover:text-white' : 'text-slate-500 hover:text-slate-800'); ?>"
                        title="Switch language to English (US)">
                        <span>🇺🇸</span>
                        <span class="hidden sm:inline">EN</span>
                    </a>
                </div>

                <!-- Theme Switcher Button -->
                <a href="<?php echo getPortfolioUrl(null, ($theme === 'dark' ? 'light' : 'dark')); ?>"
                    class="w-9 h-9 rounded-full border flex items-center justify-center transition-all shadow-sm text-sm hover:scale-105 active:scale-95 <?php echo ($theme === 'dark') ? 'bg-slate-900 border-slate-800 text-amber-400 hover:bg-slate-800 hover:text-amber-300' : 'bg-white border-slate-200 text-slate-700 hover:bg-slate-50 hover:text-indigo-600'; ?>"
                    title="<?php echo ($theme === 'dark') ? $t['themeLight'] : $t['themeDark']; ?>">
                    <span><?php echo ($theme === 'dark') ? '☀️' : '🌙'; ?></span>
                </a>
            </div>
        </div>
    </header>
</body>