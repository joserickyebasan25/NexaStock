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
            <a href="home.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('home.php', $current_page); ?>"><i class="fas fa-chart-pie"></i> Dashboard</a>
            <a href="Inventory.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('Inventory.php', $current_page); ?>"><i class="fas fa-boxes-stacked"></i> Inventory Mgmt</a>
            <a href="Assets.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('Assets.php', $current_page); ?>"><i class="fas fa-desktop"></i> Asset Mgmt</a>
            <a href="StaffManagement.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('StaffManagement.php', $current_page); ?>"><i class="fas fa-users-gear"></i> Staff Mgmt</a>
            <a href="StockMoni.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('StockMoni.php', $current_page); ?>"><i class="fas fa-arrow-trend-up"></i> Stock Monitoring</a>
            <a href="Report.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo isActive('Report.php', $current_page); ?>"><i class="fas fa-file-contract"></i> Reports & Analytics</a>
        </nav>
    </aside>

    <main class="flex-1 p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Company Assets</h1>
            <div class="badge badge-lg glass border-white/10 gap-2 p-4 font-semibold">Total Value: $241,000</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="glass-card p-4 rounded-2xl flex items-center gap-4">
                <div class="p-3 bg-blue-500/20 text-blue-400 rounded-xl"><i class="fas fa-laptop"></i></div>
                <div><p class="text-xs text-slate-500">Laptops</p><p class="font-bold">450 Units</p></div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6">
            <h3 class="font-bold mb-4 text-slate-300">Registered Hardware</h3>
            <table class="table w-full">
                <thead class="text-slate-500 border-b border-white/5">
                    <tr><th>Asset Name</th><th>Serial No.</th><th>Assigned To</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-white/5 transition-colors border-white/5">
                        <td>MacBook Pro M3 14"</td>
                        <td><span class="font-mono text-xs opacity-70">SN-2024-X99</span></td>
                        <td>Sarah Jenkins</td>
                        <td><span class="badge badge-success badge-sm font-bold">Assigned</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
<?php include('footer.php'); ?>