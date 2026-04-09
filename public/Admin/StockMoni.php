<?php include('header.php'); ?>
<header class="sticky top-0 z-50 w-full glass-card border-b border-white/10 px-4 py-2">
    <div class="navbar bg-transparent">
        <div class="navbar-start">
            <div class="flex items-center gap-2 group cursor-pointer">
                <div class="bg-gradient-to-br from-purple-500 to-blue-600 p-2 rounded-lg shadow-lg shadow-purple-500/20">
                    <i class="fas fa-box-open text-xl text-white"></i>
                </div>
                <span class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-slate-400">NexaStock</span>
            </div>
        </div>
    </div>
</header>
<div class="flex">
    <aside class="w-64 hidden md:block min-h-screen border-r border-white/5 p-4 space-y-2">
        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-4 ml-4">Main Menu</p>
        <nav class="space-y-1">
            <?php 
                $current_page = basename($_SERVER['PHP_SELF']); 
                  function isActive($page, $current) {
                    return ($page == $current) ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5';
                }
            ?>
            <a href="home.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'home.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-chart-pie"></i> Dashboard</a>
            <a href="Inventory.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'Inventory.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-boxes-stacked"></i> Inventory Mgmt</a>
            <a href="Assets.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'Assets.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-desktop"></i> Asset Mgmt</a>
            <a href="StaffManagement.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'StaffManagement.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-users-gear"></i> Staff Mgmt</a>
            <a href="StockMoni.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'StockMoni.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-arrow-trend-up"></i> Stock Monitoring</a>
            <a href="Report.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page == 'Report.php' ? 'bg-purple-600/10 text-purple-400 border border-purple-500/20' : 'text-slate-400 hover:text-white hover:bg-white/5'); ?>"><i class="fas fa-file-contract"></i> Reports & Analytics</a>
        </nav>
    </aside>

<main class="flex-1 p-6 space-y-6">
    <h1 class="text-2xl font-bold">Stock Monitoring</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3 glass-card rounded-3xl p-6">
            <h3 class="font-bold mb-6">Stock Fluctuation (24h)</h3>
            <div class="h-48 flex items-end gap-1">
                <div class="flex-1 bg-purple-500/40 rounded-t-lg" style="height: 30%"></div>
                <div class="flex-1 bg-purple-500/40 rounded-t-lg" style="height: 50%"></div>
                <div class="flex-1 bg-blue-500 rounded-t-lg" style="height: 80%"></div>
                <div class="flex-1 bg-purple-500/40 rounded-t-lg" style="height: 45%"></div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 border-red-500/20">
            <h3 class="text-red-400 font-bold mb-4 underline">Critical Alerts</h3>
            <div class="space-y-4 text-xs">
                <div class="p-2 bg-red-500/10 rounded-lg border border-red-500/20">
                    <p class="font-bold">Dell Monitor U24</p>
                    <p class="opacity-60 text-[10px]">Only 2 remaining in storage</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>