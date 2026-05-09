<dialog id="stock_modal" class="modal">
    <div class="modal-box glass-card border-white/10">
        <h3 class="font-bold text-lg mb-6">Stock Movement Form</h3>
        <form id="staffStockMovementForm" class="space-y-4">
            <div class="form-control">
                <label class="label"><span class="label-text opacity-60">Select Product</span></label>
                <select id="staffStockProduct" class="select select-bordered bg-slate-800 border-white/10 focus:outline-none">
                    <option value="">Pick an item...</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label"><span class="label-text opacity-60">Movement Type</span></label>
                    <select id="staffMovementType" class="select select-bordered bg-slate-800 border-white/10">
                        <option value="in">Stock In</option>
                        <option value="out">Stock Out</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text opacity-60">Quantity</span></label>
                    <input id="staffMovementQty" type="number" min="1" placeholder="e.g. 10" class="input input-bordered bg-slate-800 border-white/10" />
                </div>
            </div>
            <div class="form-control">
                <label class="label"><span class="label-text opacity-60">Movement Date</span></label>
                <input id="staffMovementDate" type="date" class="input input-bordered bg-slate-800 border-white/10" />
            </div>
            <div class="form-control">
                <label class="label"><span class="label-text opacity-60">Reference / Notes</span></label>
                <textarea id="staffMovementNotes" class="textarea textarea-bordered bg-slate-800 border-white/10 h-20" placeholder="e.g. Replenishing floor stock or Client Order ID"></textarea>
            </div>
            <div class="modal-action">
                <button type="button" onclick="stock_modal.close()" class="btn btn-ghost">Cancel</button>
                <button type="submit" class="btn btn-primary bg-blue-600 border-none px-6">Submit Movement</button>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop bg-slate-950/80 backdrop-blur-sm">
        <button>close</button>
    </form>
</dialog>
