<?php include('header.php'); ?>

<div class="min-h-screen w-full flex items-center justify-center bg-[#0a0c10] relative overflow-hidden">
    
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-sky-500/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-500/10 blur-[120px] rounded-full"></div>

    <div class="z-10 w-full max-w-6xl px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        
        <div class="hidden lg:block space-y-8">
            <div class="flex items-center gap-4">
                <div class="bg-gradient-to-br from-purple-500 to-blue-600 p-2 rounded-lg shadow-lg shadow-purple-500/20">
                    <i class="fas fa-box text-xl text-white"></i>
                </div>
            <div>
                    <h1 class="text-4xl font-black text-white tracking-tighter uppercase">NexaStock</h1>
                    <p class="text-sky-400 font-bold text-xs uppercase tracking-[0.3em]">Inventory & Asset Management</p>
                </div>
            </div>
            
            <h2 class="text-5xl font-black text-white leading-tight">
                Automatic Management with <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-sky-400 to-blue-600 italic">Integrated Analytics</span>
            </h2>
            
            <div class="flex gap-4">
                <div class="bg-white/5 border border-white/10 px-6 py-3 rounded-2xl flex items-center gap-3">
                    <span class="text-sky-400">🛡️</span>
                    <span class="text-sm font-bold text-slate-300">Secure</span>
                </div>
                <div class="bg-white/5 border border-white/10 px-6 py-3 rounded-2xl flex items-center gap-3">
                    <span class="text-sky-400">🧠</span>
                    <span class="text-sm font-bold text-slate-300">Smart Control</span>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="bg-[#11141b]/80 backdrop-blur-2xl p-10 rounded-[3rem] w-full max-w-md shadow-[0_0_80px_-15px_rgba(14,165,233,0.15)] border border-white/10">
                
                <div class="text-center mb-10">
                    <h3 class="font-black text-3xl text-white tracking-tight leading-none">Welcome Back</h3>
                    <p class="text-slate-400 text-sm font-medium mt-3">Sign in to access your dashboard</p>
                </div>

                <div id="loginPanel" class="space-y-6">
                    <form id="signinForm" class="space-y-5">
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-500 ml-3">Email Address</label>
                            <div class="relative">
                                <input type="text"  id="login_email" 
                                    class="input bg-white/5 border border-white/10 w-full h-16 rounded-[1.25rem] focus:ring-2 ring-sky-500/50 focus:bg-white/10 transition-all font-bold text-white px-6 outline-none" />
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-[11px] font-black uppercase tracking-widest text-slate-500 ml-3">Password</label>
                            <input type="password" id="login_password" placeholder="••••••••" 
                                class="input bg-white/5 border border-white/10 w-full h-16 rounded-[1.25rem] focus:ring-2 ring-sky-500/50 focus:bg-white/10 transition-all font-bold text-white px-6 outline-none" />
                        </div>

                        <div class="flex items-center justify-between px-2">
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" class="checkbox checkbox-xs border-slate-600 rounded bg-transparent checked:bg-sky-500">
                                <span class="text-xs text-slate-500 group-hover:text-slate-300 transition-colors">Remember me</span>
                            </label>
                           
                        </div>

                        <div class="pt-4 space-y-5">
                            <button type="submit" class="btn bg-gradient-to-r from-sky-500 to-blue-600 hover:brightness-110 border-none text-white w-full h-16 rounded-2xl font-black text-lg transition-all hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-2">
                                Sign In →
                            </button>
                            
                            <div class="flex items-center gap-4 py-2">
                                <div class="h-px flex-1 bg-white/10"></div>
                                <span class="text-[10px] font-bold text-slate-600 uppercase">or continue with</span>
                                <div class="h-px flex-1 bg-white/10"></div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <button type="button" class="btn bg-white/5 border border-white/10 text-white rounded-xl hover:bg-white/10 h-12 flex items-center justify-center gap-2">
                                    <span class="text-lg">G</span> Google
                                </button>
                                <button type="button" class="btn bg-white/5 border border-white/10 text-white rounded-xl hover:bg-white/10 h-12 flex items-center justify-center gap-2">
                                    <span class="text-lg">⌘</span> GitHub
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>