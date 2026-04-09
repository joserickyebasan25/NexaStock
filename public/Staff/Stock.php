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
</header>

<div class="flex">
    <aside class="w-64 hidden lg:block h-[calc(100vh-64px)] p-4 border-r border-white/5">
        <ul class="menu w-full p-0 gap-1 text-slate-400">
            <li><a href="home.php"><i class="fas fa-house"></i> Dashboard</a></li>
            <li><a href="Inventory.php"><i class="fas fa-boxes-stacked"></i> Inventory</a></li>
            <li><a href="Assets.php"><i class="fas fa-tags"></i> Assets</a></li>
            <li><a href="Stock.php" class="active bg-blue-600/10 text-blue-400"><i class="fas fa-right-left"></i> Stock In/Out</a></li>
        </ul>
    </aside>

    <main class="flex-1 p-6 space-y-8 max-w-7xl mx-auto">
        <section>
            <h2 class="text-lg font-bold">Stock Transactions</h2>
            <p class="text-sm text-slate-400">History of stock movements and manual adjustments.</p>
        </section>

        <div class="glass-card rounded-2xl overflow-hidden border border-white/5">
            <div class="p-4 border-b border-white/5 flex justify-between items-center bg-slate-800/30">
                <h3 class="font-bold">Movement Log</h3>
                <button class="btn btn-sm btn-primary bg-emerald-600 border-none" onclick="stock_modal.showModal()">Process Movement</button>
            </div>

            <table class="table w-full">
                <thead class="bg-slate-900/50">
                    <tr class="text-slate-500 border-white/5">
                        <th>Date</th>
                        <th>Type</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>By Staff</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-white/5">
                        <td>2026-03-31</td>
                        <td><span class="text-emerald-400"><i class="fas fa-arrow-trend-down"></i> STOCK IN</span></td>
                        <td>USB-C Hub</td>
                        <td>+50</td>
                        <td>Admin_Sarah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

<?php include('footer.php'); ?>