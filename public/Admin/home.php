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
                    <input class="input join-item bg-transparent border-none focus:outline-none w-96" placeholder="Search inventory..."/>
                    <button class="btn join-item bg-transparent border-none hover:bg-white/5"><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="navbar-end gap-2">
                <div class="dropdown dropdown-end">
                    <button class="btn btn-ghost btn-circle hover:bg-white/10">
                        <div class="indicator">
                            <i class="fa-regular fa-bell text-lg"></i>
                            <span class="badge badge-xs badge-secondary indicator-item"></span>
                        </div>
                    </button>
                </div>
                
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar border border-white/10 ml-2">
                        <div class="w-10 rounded-full">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=8b5cf6&color=fff" />
                        </div>
                    </div>
                    <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content glass-card rounded-box w-52 border border-white/10">
                        <li><a>Profile</a></li>
                        <li><a>Settings</a></li>
                        <li><a class="text-error">Logout</a></li>
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
                        <span class="text-success text-xs font-bold bg-success/10 px-2 py-1 rounded-lg">+12.5%</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Total Inventory Value</h3>
                        <p class="text-2xl font-bold mt-1">$428,290</p>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-3xl hover-3d group">
                    <div class="flex justify-between items-start">
                        <div class="p-3 bg-blue-500/10 rounded-2xl text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                            <i class="fas fa-microchip text-2xl"></i>
                        </div>
                        <span class="text-slate-400 text-xs font-bold bg-white/5 px-2 py-1 rounded-lg">Static</span>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-slate-400 text-sm font-medium">Total Assets</h3>
                        <p class="text-2xl font-bold mt-1">1,240</p>
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
                        <p class="text-2xl font-bold mt-1 text-red-400">14 Items</p>
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
                        <p class="text-2xl font-bold mt-1">38</p>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 glass-card rounded-3xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-bold">Inventory Throughput</h2>
                        <div class="flex gap-2">
                            <select class="select select-sm select-bordered bg-white/5 border-white/10 text-xs focus:outline-none">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                            </select>
                            <button class="btn btn-sm glass"><i class="fas fa-download"></i></button>
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
                    <ul class="space-y-6 relative before:absolute before:inset-y-0 before:left-3 before:w-0.5 before:bg-white/5">
                        <li class="relative pl-8">
                            <span class="absolute left-0 top-1 w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-[10px]"><i class="fas fa-plus"></i></span>
                            <p class="text-sm font-semibold">New Asset Added</p>
                            <p class="text-xs text-slate-400">Admin added 'MacBook Pro M3' to inventory</p>
                            <span class="text-[10px] text-slate-500">2 mins ago</span>
                        </li>
                        <li class="relative pl-8">
                            <span class="absolute left-0 top-1 w-6 h-6 rounded-full bg-warning flex items-center justify-center text-[10px] text-black"><i class="fas fa-pen-to-square"></i></span>
                            <p class="text-sm font-semibold">Stock Adjustment</p>
                            <p class="text-xs text-slate-400">Sarah M. updated 'Dell Monitor' quantities</p>
                            <span class="text-[10px] text-slate-500">45 mins ago</span>
                        </li>
                        <li class="relative pl-8">
                            <span class="absolute left-0 top-1 w-6 h-6 rounded-full bg-error flex items-center justify-center text-[10px]"><i class="fas fa-trash-can"></i></span>
                            <p class="text-sm font-semibold">User Removed</p>
                            <p class="text-xs text-slate-400">Staff 'John Doe' access revoked</p>
                            <span class="text-[10px] text-slate-500">3 hours ago</span>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="glass-card rounded-3xl overflow-hidden">
                <div class="p-6 flex justify-between items-center border-b border-white/5">
                    <div>
                        <h2 class="text-lg font-bold">Inventory Control</h2>
                        <p class="text-xs text-slate-400">Manage products and stock levels</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn btn-sm btn-outline border-white/10 hover:bg-white/5">Export CSV</button>
                        <button onclick="add_modal.showModal()" class="btn btn-sm btn-primary bg-purple-600 border-none shadow-lg shadow-purple-500/30">Add Product</button>
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
                                <th>Value</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="hover:bg-white/5 border-white/5">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="mask mask-squircle w-10 h-10 bg-white/5 p-2">
                                            <i class="fas fa-laptop text-purple-400"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold">MacBook Pro 16"</div>
                                            <div class="text-xs opacity-50">Apple Silicon M3</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-mono text-xs">#INV-9021</span></td>
                                <td><span class="badge badge-success badge-outline text-[10px] font-bold">IN STOCK</span></td>
                                <td class="font-semibold">42 Units</td>
                                <td>$104,580</td>
                                <td class="text-right">
                                    <button class="btn btn-ghost btn-xs"><i class="fas fa-edit text-blue-400"></i></button>
                                    <button class="btn btn-ghost btn-xs"><i class="fas fa-trash text-red-400"></i></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-white/5 border-white/5">
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="mask mask-squircle w-10 h-10 bg-white/5 p-2">
                                            <i class="fas fa-keyboard text-purple-400"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold">Keychron K2 V2</div>
                                            <div class="text-xs opacity-50">Mechanical Keyboard</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-mono text-xs">#INV-4412</span></td>
                                <td><span class="badge badge-error badge-outline text-[10px] font-bold">LOW STOCK</span></td>
                                <td class="font-semibold">05 Units</td>
                                <td>$495</td>
                                <td class="text-right">
                                    <button class="btn btn-ghost btn-xs"><i class="fas fa-edit text-blue-400"></i></button>
                                    <button class="btn btn-ghost btn-xs"><i class="fas fa-trash text-red-400"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <div class="fixed bottom-6 right-6 dropdown dropdown-top dropdown-end">
        <div tabindex="0" role="button" class="btn btn-circle btn-primary w-14 h-14 shadow-2xl shadow-purple-600/50 border-none bg-gradient-to-br from-purple-500 to-blue-600 hover:scale-110 transition-transform">
            <i class="fas fa-plus text-xl text-white"></i>
        </div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl glass-card rounded-box w-52 mb-4 border border-white/10">
            <li><a onclick="add_modal.showModal()"><i class="fas fa-plus-circle text-purple-400"></i> New Product</a></li>
            <li><a><i class="fas fa-desktop text-blue-400"></i> Register Asset</a></li>
            <li><a><i class="fas fa-sliders text-emerald-400"></i> Adjust Stock</a></li>
        </ul>
    </div>

    <dialog id="add_modal" class="modal">
        <div class="modal-box glass-card border-white/10 max-w-2xl">
            <h3 class="font-bold text-lg border-b border-white/5 pb-4 mb-4">Add New Inventory Item</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label"><span class="label-text text-slate-400">Product Name</span></label>
                    <input type="text" placeholder="e.g. UltraWide Monitor" class="input input-bordered bg-white/5 border-white/10" />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text text-slate-400">SKU/ID</span></label>
                    <input type="text" placeholder="NS-001" class="input input-bordered bg-white/5 border-white/10" />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text text-slate-400">Category</span></label>
                    <select class="select select-bordered bg-white/5 border-white/10">
                        <option>Electronics</option>
                        <option>Furniture</option>
                        <option>Software Licences</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text text-slate-400">Initial Quantity</span></label>
                    <input type="number" placeholder="0" class="input input-bordered bg-white/5 border-white/10" />
                </div>
            </div>
            <div class="modal-action border-t border-white/5 pt-4 mt-6">
                <form method="dialog">
                    <button class="btn btn-ghost">Cancel</button>
                    <button class="btn btn-primary bg-purple-600 border-none px-8">Save Item</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

</body>
</html>

<?php include('footer.php'); ?>