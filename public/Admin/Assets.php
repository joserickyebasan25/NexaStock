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
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-white">Registered Products</h1>
            <input type="text" id="searchProduct" placeholder="Search product..."
                class="input input-sm bg-white/5 border border-white/10 text-white placeholder-slate-400" />
        </div>

        <div class="glass-card rounded-3xl p-6">
            <table class="table w-full text-white">
                <thead class="text-slate-500 border-b border-white/5">
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="productList"></tbody>
            </table>
        </div>
    </main>
</div>

<?php include('footer.php'); ?>