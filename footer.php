<?php
/**
 * Rodapé do Portfólio em PHP
 */
require_once 'config.php';
?>
<footer id="footer"
    class="mt-auto transition-colors duration-200 border-t <?php echo ($theme === 'dark') ? 'border-slate-900 bg-slate-950/80' : 'border-slate-200 bg-white/95 shadow-sm'; ?> py-8 backdrop-blur-md">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2 select-none">
            <span
                class="font-display font-bold text-sm tracking-tight <?php echo ($theme === 'dark') ? 'text-slate-400' : 'text-slate-700'; ?>">
                Kaiky Muniz
            </span>
            <span class="<?php echo ($theme === 'dark') ? 'text-slate-600' : 'text-slate-300'; ?> text-xs">|</span>
            <span
                class="text-[11px] font-mono <?php echo ($theme === 'dark') ? 'text-slate-600' : 'text-slate-400'; ?> tracking-wider">
                <?php echo $t['backEndDev']; ?>
            </span>
        </div>

        <p class="text-slate-500 text-[11px] font-medium text-center md:text-right leading-relaxed select-none">
            &copy; <?php echo date('Y'); ?> Kaiky Muniz/>
        </p>
    </div>
</footer>
</body>

</html>