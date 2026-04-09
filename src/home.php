<?php include('header.php'); ?>

<div class="sticky top-0 z-50 flex justify-center pt-6 px-4">
    <nav class="bg-white/80 backdrop-blur-lg shadow-sm border border-slate-100 rounded-[2.5rem] px-8 py-4 flex items-center w-full max-w-6xl justify-between">
        <div class="flex items-center gap-4">
            <div class="relative w-12 h-12 group cursor-pointer">
                <img src='images/nexastock_logo.png' class="w-full h-full rounded-2xl object-cover shadow-inner border border-slate-100 group-hover:rotate-3 transition-transform">
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-black text-slate-800 tracking-tighter leading-none uppercase">NexaStock</span>
                <span class="text-[9px] font-black text-sky-500 uppercase tracking-[0.3em] mt-1">Inventory & Asset Management</span>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <button id="openSign" onclick="modal.showModal()"
                class="btn bg-slate-900 hover:bg-sky-600 text-white border-none rounded-2xl px-10 font-black transition-all hover:scale-105 active:scale-95 normal-case h-12 shadow-lg shadow-slate-200">
                Get Started
            </button>
        </div>
    </nav>
</div>

<section class="text-center mt-28 px-6 max-w-5xl mx-auto">
    <div class="inline-flex items-center gap-3 bg-sky-50 text-sky-600 px-5 py-2.5 rounded-full mb-8 border border-sky-100/50">
        <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sky-500"></span>
        </span>
        <span class="text-[10px] font-black uppercase tracking-[0.2em]">24/7 System Access</span>
    </div>
    
tracking-tight leading-none mb-8">
bg-clip-text bg-linear-to-r from-sky-400 to-blue-600 italic">
    </h1>
    
    <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto font-medium leading-relaxed">
        NexaStock helps you track products, monitor stock levels, and generate detailed analytics for smarter business decisions.
    </p>
</section>

<section class="max-w-6xl mx-auto mt-40 px-6">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
        <div class="max-w-md">
            <h2 class="text-4xl font-black text-slate-800 tracking-tight">Core Features</h2>
            <p class="text-slate-400 font-bold text-xs uppercase tracking-[0.2em] mt-3">Everything you need to run your store efficiently</p>
        </div>
h-px flex-1 bg-slate-100 mb-4 mx-12 hidden md:block">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="group bg-white p-10 rounded-[3rem] border border-slate-50 shadow-sm hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2">
rounded-3xl flex items-center justify-center text-3xl mb-8 group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-500">📦
            <h3 class="font-black text-2xl text-slate-800 mb-4">Product Management</h3>
            <p class="text-slate-500 leading-relaxed font-medium">Add, edit, and organize your inventory items with ease and efficiency.</p>
        </div>

        <div class="group bg-white p-10 rounded-[3rem] border border-slate-50 shadow-sm hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2">
            <div class="w-16 h-16 bg-sky-50 rounded-[1.5rem] flex items-center justify-center text-3xl mb-8 group-hover:bg-sky-500 group-hover:text-white transition-colors duration-500">🔄</div>
            <h3 class="font-black text-2xl text-slate-800 mb-4">Stock In / Out</h3>
            <p class="text-slate-500 leading-relaxed font-medium">Easily track stock movements and update quantities in real time.</p>
        </div>

        <div class="group bg-white p-10 rounded-[3rem] border border-slate-50 shadow-sm hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2">
            <div class="w-16 h-16 bg-rose-50 rounded-[1.5rem] flex items-center justify-center text-3xl mb-8 group-hover:bg-rose-500 group-hover:text-white transition-colors duration-500">📊</div>
            <h3 class="font-black text-2xl text-slate-800 mb-4">Reports & Analytics</h3>
            <p class="text-slate-500 leading-relaxed font-medium">Generate stock reports, sales summaries, and detailed analytics to guide decisions.</p>
        </div>

        <div class="group bg-white p-10 rounded-[3rem] border border-slate-50 shadow-sm hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2">
            <div class="w-16 h-16 bg-amber-50 rounded-[1.5rem] flex items-center justify-center text-3xl mb-8 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-500">👥</div>
            <h3 class="font-black text-2xl text-slate-800 mb-4">User Management</h3>
            <p class="text-slate-500 leading-relaxed font-medium">Manage staff access and permissions securely within your organization.</p>
        </div>

        <div class="group bg-white p-10 rounded-[3rem] border border-slate-50 shadow-sm hover:shadow-2xl hover:shadow-sky-100 transition-all duration-500 hover:-translate-y-2 lg:col-span-2">
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-16 h-16 bg-indigo-50 rounded-[1.5rem] flex items-center justify-center text-3xl shrink-0 group-hover:bg-indigo-500 group-hover:text-white transition-colors duration-500">⚡</div>
                <div>
                    <h3 class="font-black text-2xl text-slate-800 mb-4">Low Stock Alerts</h3>
                    <p class="text-slate-500 leading-relaxed font-medium">Never run out of essential products with automated alerts and notifications.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<dialog id="modal" class="modal modal-bottom sm:modal-middle backdrop-blur-md">
    <div class="modal-box bg-white p-0 rounded-[3rem] w-full max-w-md shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] overflow-hidden border border-white">
        
        <div class="bg-gradient-to-br from-sky-600 to-blue-700 p-10 text-white relative">
            <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-inner">🔐</div>
            <h3 id="modalTitle" class="font-black text-3xl tracking-tight leading-none">Welcome Back</h3>
            <p class="text-sky-100 text-sm font-medium opacity-80 mt-2">Sign in to access NexaStock dashboard</p>
            <button class="btn btn-sm btn-circle btn-ghost absolute right-8 top-10 text-white hover:bg-white/10" onclick="modal.close()">✕</button>
        </div>

        <div class="p-10">
            <div id="loginPanel" class="space-y-6">
                <form id="signinForm" class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-3">Email Address</label>
                        <input type="text" placeholder="name@email.com" id="login_email" class="input bg-slate-50 border-none w-full h-16 rounded-[1.25rem] focus:ring-4 ring-sky-100 transition-all font-bold text-slate-700 px-6" />
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-3">Password</label>
                        <input type="password" id="login_password" placeholder="••••••••" class="input bg-slate-50 border-none w-full h-16 rounded-[1.25rem] focus:ring-4 ring-sky-100 transition-all font-bold text-slate-700 px-6" />
                    </div>

                    <div class="pt-6 space-y-5">
                        <button type="submit" class="btn bg-sky-600 hover:bg-sky-700 border-none text-white w-full h-16 rounded-2xl font-black text-lg shadow-xl shadow-sky-100 transition-all hover:scale-[1.02] active:scale-95">
                            Log In
                        </button>
                        <div class="text-center">
                            <p class="text-sm font-bold text-slate-500">
                                New to NexaStock? 
                                <button type="button" class="text-sky-600 underline underline-offset-4 ml-1" onclick="swapForm('signup')">Create Account</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <form method="dialog" class="modal-backdrop bg-slate-900/60 transition-opacity duration-300"><button>close</button></form>
</dialog>

<?php include('footer.php'); ?>