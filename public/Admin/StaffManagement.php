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
            ?>
            <a href="home.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='home.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-chart-pie"></i> Dashboard</a>
            <a href="Inventory.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='Inventory.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-boxes-stacked"></i> Inventory Mgmt</a>
            <a href="Assets.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='Assets.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-desktop"></i> Asset Mgmt</a>
            <a href="StaffManagement.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='StaffManagement.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-users-gear"></i> Staff Mgmt</a>
            <a href="StockMoni.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='StockMoni.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-arrow-trend-up"></i> Stock Monitoring</a>
            <a href="Report.php" class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($current_page=='Report.php')?'bg-purple-600/10 text-purple-400 border border-purple-500/20':'text-slate-400 hover:text-white hover:bg-white/5'; ?>"><i class="fas fa-file-contract"></i> Reports & Analytics</a>
        </nav>
    </aside>

    <main class="flex-1 p-6 space-y-6">

        <section class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <h1 class="text-2xl font-bold text-white">Staff & Administration</h1>

            <div class="flex gap-3">
                <input type="text" id="searchStaff" placeholder="Search staff..."
                    class="input input-sm bg-white/5 border border-white/10 text-white placeholder-slate-500" />

                <button onclick="openAddModal()" class="btn btn-sm glass border-white/10 text-white hover:bg-purple-600">
                    <i class="fas fa-user-plus"></i> Add Staff
                </button>
            </div>
        </section>

        <div class="glass-card rounded-3xl p-6">
            <div class="glass-card p-6 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl">
                <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">Active Staff</h3>
                <div id="staffList" class="space-y-4"></div>
            </div>
        </div>
    </main>


    <dialog id="staffModal" class="modal">
        <div class="modal-box bg-[#11141b] text-white border border-white/10">
            <h3 id="modalTitle" class="font-bold text-lg mb-4">Add Staff</h3>
            <form id="staffForm" class="space-y-4">
                <input type="hidden" id="staff_id">
                <input type="text" id="fname" placeholder="First Name" class="input w-full bg-white/5 border border-white/10 text-white" />
                <input type="text" id="lname" placeholder="Last Name" class="input w-full bg-white/5 border border-white/10 text-white" />
                <input type="email" id="email" placeholder="Email" class="input w-full bg-white/5 border border-white/10 text-white" />
                <input type="password" id="password" placeholder="Password" class="input w-full bg-white/5 border border-white/10 text-white" />
                <select id="role" class="select w-full bg-white/5 border border-white/10 text-white">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>

                <div class="modal-action">
                    <button type="submit" class="btn bg-purple-600 border-none text-white">Save</button>
                    <button type="button" onclick="staffModal.close()" class="btn">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>

</div>

<?php include('footer.php'); ?>