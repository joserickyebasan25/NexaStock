<?php include('header.php'); ?>
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
    <section class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Staff & Permissions</h1>
        <button class="btn btn-sm glass border-white/10 text-white hover:bg-purple-600"><i class="fas fa-user-plus"></i> Invite Staff</button>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="glass-card rounded-3xl p-6">
            <h3 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Active Staff</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-2xl bg-white/5 border border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="avatar online placeholder"><div class="bg-neutral text-neutral-content rounded-full w-10"><span>AD</span></div></div>
                        <div><p class="font-bold text-sm">Alex Admin</p><p class="text-[10px] text-purple-400 font-bold uppercase">Super Admin</p></div>
                    </div>
                    <button class="btn btn-circle btn-ghost btn-sm"><i class="fas fa-cog"></i></button>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-3xl p-6 bg-gradient-to-br from-white/5 to-transparent">
            <h3 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Security Audit</h3>
            <div class="text-xs space-y-3">
                <p class="text-slate-400"><span class="text-emerald-400">Success:</span> Sarah J. logged in from IP 192.168.1.1</p>
                <p class="text-slate-400"><span class="text-red-400">Denied:</span> Failed login attempt on 'Guest' account</p>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>