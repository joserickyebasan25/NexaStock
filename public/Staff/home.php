<?php include('header.php'); ?> 

    <header class="navbar bg-slate-900/50 border-b border-white/5 px-6 sticky top-0 z-50 backdrop-blur-md">
        <div class="flex-1">
            <div class="flex items-center gap-2">
                <div class="bg-blue-600 p-1.5 rounded-lg">
                    <i class="fas fa-box text-white text-sm"></i>
                </div>
                <span class="text-lg font-bold tracking-tight">NexaStock <span class="text-xs font-normal opacity-50 ml-1"></span></span>
            </div>
        </div>
        <div class="flex-none gap-4">
            <div class="form-control hidden md:block">
                <input type="text" placeholder="Quick Search..." class="input input-sm input-bordered bg-slate-800 border-white/10 w-64" />
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar border border-white/10">
                    <div class="w-10 rounded-full">
                        <img src="https://ui-avatars.com/api/?name=Staff+Member&background=3b82f6&color=fff" />
                    </div>
                </div>
                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content glass-card rounded-box w-52">
                    <li><a>My Profile</a></li>
                    <li><a>Help Desk</a></li>
                    <li><a class="text-error">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="flex">
        <aside class="w-64 hidden lg:block h-[calc(100vh-64px)] p-4 border-r border-white/5">
            <ul class="menu w-full p-0 gap-1 text-slate-400">
                <li><a class="active bg-blue-600/10 text-blue-400"><i class="fas fa-house"></i> Dashboard</a></li>
                <li><a href="Inventory.php"><i class="fas fa-boxes-stacked"></i>Inventory</a></li>
                <li><a href="Assets.php"><i class="fas fa-tags"></i>Assets</a></li>
                <li><a href="Stock.php"><i class="fas fa-right-left"></i>Stock In/Out</a></li>
            </ul>
        </aside>

        <main class="flex-1 p-6 space-y-8 max-w-7xl mx-auto">
            
            <section>
                <h2 class="text-sm font-semibold uppercase tracking-widest text-slate-500 mb-4">Operations Center</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button onclick="stock_modal.showModal()" class="btn h-24 glass-card action-card border-l-4 border-l-emerald-500 flex flex-col items-center justify-center gap-2 transition-all">
                        <i class="fas fa-arrow-down text-emerald-500 text-xl"></i>
                        <span>Stock In</span>
                    </button>
                    <button onclick="stock_modal.showModal()" class="btn h-24 glass-card action-card border-l-4 border-l-amber-500 flex flex-col items-center justify-center gap-2 transition-all">
                        <i class="fas fa-arrow-up text-amber-500 text-xl"></i>
                        <span>Stock Out</span>
                    </button>
                    <button class="btn h-24 glass-card action-card border-l-4 border-l-blue-500 flex flex-col items-center justify-center gap-2 transition-all">
                        <i class="fas fa-barcode text-blue-500 text-xl"></i>
                        <span>Scan Asset</span>
                    </button>
                </div>
            </section>

            <section class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="glass-card p-4 rounded-2xl border border-white/5">
                    <p class="text-xs text-slate-400">Inbound (Today)</p>
                    <p class="text-xl font-bold">124 <span class="text-xs font-normal opacity-50">Units</span></p>
                </div>
                <div class="glass-card p-4 rounded-2xl border border-white/5">
                    <p class="text-xs text-slate-400">Outbound (Today)</p>
                    <p class="text-xl font-bold">86 <span class="text-xs font-normal opacity-50">Units</span></p>
                </div>
                <div class="glass-card p-4 rounded-2xl border border-white/5 border-rose-500/20">
                    <p class="text-xs text-slate-400 text-rose-400">Low Stock Items</p>
                    <p class="text-xl font-bold text-rose-400">03</p>
                </div>
                <div class="glass-card p-4 rounded-2xl border border-white/5 border-blue-500/20">
                    <p class="text-xs text-slate-400">Assigned Tasks</p>
                    <p class="text-xl font-bold text-blue-400">05</p>
                </div>
            </section>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <div class="xl:col-span-2 glass-card rounded-2xl overflow-hidden border border-white/5">
                    <div class="p-4 border-b border-white/5 flex justify-between items-center bg-slate-800/30">
                        <h3 class="font-bold">Inventory Watchlist</h3>
                        <a href="#" class="text-xs text-blue-400 hover:underline">View All Inventory</a>
                    </div>
                    <table class="table w-full">
                        <thead class="bg-slate-900/50">
                            <tr class="text-slate-500 border-white/5">
                                <th>Product</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Quick Edit</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-white/5">
                                <td>Logitech MX Master 3S</td>
                                <td><span class="badge badge-success badge-xs"></span> In Stock</td>
                                <td class="font-mono">14</td>
                                <td>
                                    <button class="btn btn-xs btn-outline border-white/10 hover:bg-white/5" onclick="stock_modal.showModal()">Update</button>
                                </td>
                            </tr>
                            <tr class="border-white/5">
                                <td>Dell XPS 15 Charger</td>
                                <td><span class="badge badge-warning badge-xs"></span> Low</td>
                                <td class="font-mono text-warning font-bold">02</td>
                                <td>
                                    <button class="btn btn-xs btn-outline border-white/10 hover:bg-white/5" onclick="stock_modal.showModal()">Update</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="glass-card rounded-2xl border border-white/5 p-4 h-fit">
                    <h3 class="font-bold mb-4 text-sm uppercase tracking-wide opacity-50">My Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="text-emerald-500 mt-1"><i class="fas fa-circle-check text-xs"></i></div>
                            <div>
                                <p class="text-xs font-semibold text-slate-200">Stocked In: 50x USB-C Hubs</p>
                                <p class="text-[10px] text-slate-500">10:45 AM • Rack A-12</p>
                            </div>
                        </div>
                        <div class="flex gap-3 opacity-70">
                            <div class="text-amber-500 mt-1"><i class="fas fa-circle-check text-xs"></i></div>
                            <div>
                                <p class="text-xs font-semibold text-slate-200">Stocked Out: 1x MacBook Pro</p>
                                <p class="text-[10px] text-slate-500">09:15 AM • Order #8821</p>
                            </div>
                        </div>
                        <div class="flex gap-3 opacity-50">
                            <div class="text-blue-500 mt-1"><i class="fas fa-clipboard-list text-xs"></i></div>
                            <div>
                                <p class="text-xs font-semibold text-slate-200">Inventory Count Completed</p>
                                <p class="text-[10px] text-slate-500">Yesterday • Zone B</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <dialog id="stock_modal" class="modal">
        <div class="modal-box glass-card border-white/10">
            <h3 class="font-bold text-lg mb-6">Stock Movement Form</h3>
            <div class="space-y-4">
                <div class="form-control">
                    <label class="label"><span class="label-text opacity-60">Select Product</span></label>
                    <select class="select select-bordered bg-slate-800 border-white/10 focus:outline-none">
                        <option disabled selected>Pick an item...</option>
                        <option>Logitech MX Master 3S</option>
                        <option>Dell XPS 1 Charger</option>
                        <option>Ethernet Cable 5m</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text opacity-60">Quantity Change</span></label>
                        <input type="number" placeholder="e.g. 10" class="input input-bordered bg-slate-800 border-white/10" />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text opacity-60">Movement Date</span></label>
                        <input type="date" class="input input-bordered bg-slate-800 border-white/10" />
                    </div>
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text opacity-60">Reference / Notes</span></label>
                    <textarea class="textarea textarea-bordered bg-slate-800 border-white/10 h-20" placeholder="e.g. Replenishing floor stock or Client Order ID"></textarea>
                </div>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-ghost">Cancel</button>
                    <button class="btn btn-primary bg-blue-600 border-none px-6">Submit Movement</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop bg-slate-950/80 backdrop-blur-sm">
            <button>close</button>
        </form>
    </dialog>

</body>
</html>

<?php include('footer.php'); ?>