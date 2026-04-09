s<?php include('header.php'); ?>

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
        </div>
    </header>

    <div class="flex">
        <aside class="w-64 hidden md:block min-height-[calc(100vh-64px)] border-r border-white/5 p-4 space-y-2">
            <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-4 ml-4">Main Menu</p>
            <nav class="space-y-1">
                <a href="home.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
                    <i class="fas fa-chart-pie"></i> Dashboard
                </a>
                <a href="Inventory.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-purple-600/10 text-purple-400 border border-purple-500/20 transition-all">
                    <i class="fas fa-boxes-stacked"></i> Inventory Mgmt
                </a>
                <a href="Assets.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
                    <i class="fas fa-desktop"></i> Asset Mgmt
                </a>
                <a href="StaffManagement.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
                    <i class="fas fa-users-gear"></i> Staff Mgmt
                </a>
                <a href="StockMoni.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
                    <i class="fas fa-arrow-trend-up"></i> Stock Monitoring
                </a>
                <a href="Report.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
                    <i class="fas fa-file-contract"></i> Reports & Analytics
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-6 space-y-8 overflow-y-auto">
            <header class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Inventory Master List</h1>
                    <p class="text-slate-400 text-sm">Update product details and manage warehouse stock.</p>
                </div>
                <button onclick="add_modal.showModal()" class="btn btn-primary bg-purple-600 border-none shadow-lg shadow-purple-500/20">
                    <i class="fas fa-plus"></i> Add New Product
                </button>
            </header>

            <div class="glass-card rounded-3xl overflow-hidden">
                <table class="table table-zebra">
                    <thead>
                        <tr class="text-slate-400 border-white/5">
                            <th>Product</th><th>Category</th><th>SKU</th><th>Stock Level</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-white/5">
                            <td><div class="font-bold">Logitech MX Master</div></td>
                            <td>Peripherals</td>
                            <td><span class="font-mono text-xs">#INV-9021</span></td>
                            <td>
                                <progress class="progress progress-primary w-20 mr-2" value="70" max="100"></progress>
                                <span class="text-xs">42 Units</span>
                            </td>
                            <td><button class="btn btn-ghost btn-xs"><i class="fas fa-ellipsis-v"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
<?php include('footer.php'); ?>