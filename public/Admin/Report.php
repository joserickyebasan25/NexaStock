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
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Analytics & Reports</h1>
            <button class="btn btn-secondary border-none shadow-lg shadow-secondary/20"><i class="fas fa-file-pdf"></i> Generate Full Audit</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="glass-card rounded-3xl p-8 text-center space-y-4 hover:border-blue-500/30 transition-all">
                <i class="fas fa-cloud-arrow-down text-4xl text-blue-400"></i>
                <h3 class="text-xl font-bold">Export Inventory Data</h3>
                <p class="text-xs text-slate-400">Download your entire product list in CSV or Excel format.</p>
                <button class="btn btn-block glass hover:bg-blue-600 hover:text-white">Download .CSV</button>
            </div>
            
            <div class="glass-card rounded-3xl p-8 text-center space-y-4 hover:border-emerald-500/30 transition-all">
                <i class="fas fa-chart-line text-4xl text-emerald-400"></i>
                <h3 class="text-xl font-bold">Asset Depreciation</h3>
                <p class="text-xs text-slate-400">View the current value versus purchase price of hardware.</p>
                <button class="btn btn-block glass hover:bg-emerald-600 hover:text-white">View Chart</button>
            </div>
        </div>
    </main>
</div>
<?php include('footer.php'); ?>