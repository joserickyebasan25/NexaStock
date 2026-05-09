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
            
            <div class="navbar-center hidden lg:flex">
                <div class="join glass-card border-white/5">
                    <input id="dashboardSearchInventory" class="input join-item bg-transparent border-none focus:outline-none w-96" placeholder="Search inventory..."/>
                    <button class="btn join-item bg-transparent border-none hover:bg-white/5"><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="navbar-end gap-2">
                <div class="dropdown dropdown-end">
                    <button class="btn btn-ghost btn-circle hover:bg-white/10">
                        <div class="indicator">
                            <i class="fa-regular fa-bell text-lg"></i>
                            <span id="adminNotificationCount" class="badge badge-xs badge-secondary indicator-item hidden"></span>
                        </div>
                    </button>
                    <div tabindex="0" class="mt-3 z-[1] dropdown-content glass-card rounded-box w-80 border border-white/10 p-4">
                        <h3 class="font-bold text-sm mb-3">Notifications</h3>
                        <div id="adminNotificationList" class="space-y-3 text-sm"></div>
                    </div>
                </div>
                
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar border border-white/10 ml-2">
                        <div class="w-10 rounded-full">
                            <img src="<?php echo htmlspecialchars($currentUserAvatar); ?>" alt="<?php echo htmlspecialchars($currentUserName); ?>" />
                        </div>
                    </div>
                    <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content glass-card rounded-box w-52 border border-white/10">
                        <li class="px-3 py-2 text-xs text-slate-400"><?php echo htmlspecialchars($currentUserName); ?></li>
                        <li><a href="Report.php">Reports</a></li>
                        <li><a href="/NexaStock/handlers/logout.php" class="text-error">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <aside class="w-64 hidden md:block min-height-[calc(100vh-64px)] border-r border-white/5 p-4 space-y-2">
            <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-4 ml-4">Main Menu</p>
            <nav class="space-y-1">
                <a href="home.php" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-active transition-all">
                    <i class="fas fa-chart-pie"></i> Dashboard
                </a>
                <a href="Inventory.php" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all text-slate-400 hover:text-white">
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
            
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-card p-6 rounded-3xl hover-3d group">
                    <div class="flex justify-between items-start">
                        <div class="p-3 bg-purple-500/10 rounded-2xl text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                            <i class="fas fa-coins text-2xl"></i>
                        </div>
                        <span class="text-success text-xs font-bold bg-success/10 px-2 py-1 rounded-lg">Live</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Total Inventory Value</h3>
                        <p id="dashboardInventoryValue" class="text-2xl font-bold mt-1">0.00</p>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-3xl hover-3d group">
                    <div class="flex justify-between items-start">
                        <div class="p-3 bg-blue-500/10 rounded-2xl text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                            <i class="fas fa-microchip text-2xl"></i>
                        </div>
                        <span class="text-slate-400 text-xs font-bold bg-white/5 px-2 py-1 rounded-lg">Live</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Total Products</h3>
                        <p id="dashboardTotalProducts" class="text-2xl font-bold mt-1">0</p>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-3xl hover-3d group border-red-500/20">
                    <div class="flex justify-between items-start">
                        <div class="p-3 bg-red-500/10 rounded-2xl text-red-400 group-hover:bg-red-500 group-hover:text-white transition-colors">
                            <i class="fas fa-triangle-exclamation text-2xl"></i>
                        </div>
                        <span class="text-red-400 text-xs font-bold bg-red-500/10 px-2 py-1 rounded-lg">Critical</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Low Stock Alerts</h3>
                        <p id="dashboardLowStock" class="text-2xl font-bold mt-1 text-red-400">0 Items</p>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-3xl hover-3d group">
                    <div class="flex justify-between items-start">
                        <div class="p-3 bg-emerald-500/10 rounded-2xl text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                            <i class="fas fa-user-check text-2xl"></i>
                        </div>
                        <span class="text-success text-xs font-bold bg-success/10 px-2 py-1 rounded-lg">+2 New</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Active Users</h3>
                        <p id="dashboardActiveUsers" class="text-2xl font-bold mt-1">0</p>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 glass-card rounded-3xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold">Inventory Throughput</h2>
                        <div class="flex gap-2">
                            <select class="select select-sm select-bordered bg-white/5 border-white/10 text-xs focus:outline-none">
                                <option class="bg-[#11141b] text-white">Last 7 Days</option>
                                <option class="bg-[#11141b] text-white">Last 30 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="h-64 flex items-end justify-between px-2 gap-2">
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 40%"></div>
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 65%"></div>
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 45%"></div>
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 90%"></div>
                        <div class="w-full bg-blue-500/40 rounded-t-lg shadow-lg shadow-blue-500/20" style="height: 75%"></div>
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 55%"></div>
                        <div class="w-full bg-purple-500/20 rounded-t-lg transition-all hover:bg-purple-500/40" style="height: 80%"></div>
                    </div>
                    <div class="flex justify-between mt-4 text-[10px] text-slate-500 uppercase font-bold tracking-widest px-2">
                        <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                    </div>
                </div>

                <div class="glass-card rounded-3xl p-6 overflow-hidden">
                    <h2 class="text-lg font-bold mb-4">System Activity</h2>
                    <ul id="adminActivityList" class="space-y-6 relative before:absolute before:inset-y-0 before:left-3 before:w-0.5 before:bg-white/5"></ul>
                </div>
            </section>

            <section class="glass-card rounded-3xl overflow-hidden">
                <div class="p-6 flex justify-between items-center border-b border-white/5">
                    <div>
                        <h2 class="text-lg font-bold">Inventory Control</h2>
                        <p class="text-xs text-slate-400">Manage products and stock levels</p>
                    </div>
                    <div class="flex gap-2">
                        <button id="dashboardExportCsv" class="btn btn-sm btn-outline border-white/10 hover:bg-white/5">Export CSV</button>
                        <button onclick="openProductModal()" class="btn btn-sm btn-primary bg-purple-600 border-none shadow-lg shadow-purple-500/30">Add Product</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra bg-transparent">
                        <thead>
                            <tr class="border-white/5 text-slate-400">
                                <th>Product / Asset</th>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="adminDashboardInventoryList" class="text-sm"></tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>


<?php include('footer.php'); ?>
