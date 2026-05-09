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
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h1 class="text-2xl font-bold">Stock Monitoring</h1>
        <button class="btn btn-primary bg-purple-600 border-none" onclick="document.getElementById('stockMovementModal').showModal()">
            <i class="fas fa-right-left"></i> Process Movement
        </button>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3 glass-card rounded-3xl p-6">
            <h3 class="font-bold mb-6">Recent Stock Movements</h3>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="text-slate-400 border-white/5">
                            <th>Date</th>
                            <th>Type</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody id="movementList"></tbody>
                </table>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 border-red-500/20">
            <h3 class="text-red-400 font-bold mb-4 underline">Critical Alerts</h3>
            <div id="criticalStockList" class="space-y-4 text-xs"></div>
        </div>
    </div>
</main>

<dialog id="stockMovementModal" class="modal">
    <div class="modal-box bg-[#11141b] text-white border border-white/10">
        <h3 class="font-bold text-lg mb-4">Process Stock Movement</h3>
        <form id="stockMovementForm" class="space-y-4">
            <select id="stockProduct" class="select w-full bg-white/5 border border-white/10 text-white">
                <option class="bg-[#11141b] text-white" value="">Select product</option>
            </select>
            <select id="movementType" class="select w-full bg-white/5 border border-white/10 text-white">
                <option class="bg-[#11141b] text-white" value="in">Stock In</option>
                <option class="bg-[#11141b] text-white" value="out">Stock Out</option>
            </select>
            <input type="number" id="movementQty" min="1" step="1" placeholder="Quantity" class="input w-full bg-white/5 border border-white/10 text-white" />
            <input type="date" id="movementDate" class="input w-full bg-white/5 border border-white/10 text-white" />
            <textarea id="movementNotes" placeholder="Notes" class="textarea w-full bg-white/5 border border-white/10 text-white"></textarea>
            <div class="modal-action">
                <button type="submit" class="btn bg-purple-600 border-none text-white">Save</button>
                <button type="button" onclick="document.getElementById('stockMovementModal').close()" class="btn">Cancel</button>
            </div>
        </form>
    </div>
</dialog>

<?php include('footer.php'); ?>
