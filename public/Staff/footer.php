<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
$(document).ready(function () {
    let staffProducts = [];

    function escapeHtml(value) {
        return $('<div>').text(value ?? '').html();
    }

    function statusBadge(stock) {
        stock = Number(stock || 0);
        if (stock <= 0) return '<div class="badge badge-error badge-outline text-[10px]">OUT</div>';
        if (stock <= 5) return '<div class="badge badge-warning badge-outline text-[10px]">LOW</div>';
        return '<div class="badge badge-success badge-outline text-[10px]">AVAILABLE</div>';
    }

    function renderInventory(products) {
        if (!$('#staffInventoryList').length) return;

        const rows = products.length ? products.map((product) => `
            <tr class="border-white/5">
                <td>${escapeHtml(product.product_name)}</td>
                <td>${Number(product.stock || 0)} pcs</td>
                <td>${statusBadge(product.stock)}</td>
                <td><button class="btn btn-xs btn-outline border-white/10" onclick="stock_modal.showModal()">Update</button></td>
            </tr>
        `).join('') : '<tr><td colspan="4" class="text-center text-slate-400">No inventory found.</td></tr>';

        $('#staffInventoryList').html(rows);
    }

    function renderWatchlist(products) {
        if (!$('#staffWatchlist').length) return;

        const watchlist = products.slice(0, 8);
        const rows = watchlist.length ? watchlist.map((product) => `
            <tr class="border-white/5">
                <td>${escapeHtml(product.product_name)}</td>
                <td>${statusBadge(product.stock)}</td>
                <td class="font-mono">${Number(product.stock || 0)}</td>
                <td>
                    <button class="btn btn-xs btn-outline border-white/10 hover:bg-white/5" onclick="stock_modal.showModal()">Update</button>
                </td>
            </tr>
        `).join('') : '<tr><td colspan="4" class="text-center text-slate-400">No products found.</td></tr>';

        $('#staffWatchlist').html(rows);
    }

    function renderAssets(products) {
        if (!$('#staffAssetList').length) return;

        const rows = products.length ? products.map((product) => `
            <tr class="border-white/5">
                <td>${escapeHtml(product.product_name)}</td>
                <td>${escapeHtml(product.category)}</td>
                <td>${Number(product.stock || 0)} pcs</td>
                <td>${Number(product.price || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td><button class="btn btn-xs btn-outline border-white/10" onclick="stock_modal.showModal()">Update Stock</button></td>
            </tr>
        `).join('') : '<tr><td colspan="5" class="text-center text-slate-400">No assets found.</td></tr>';

        $('#staffAssetList').html(rows);
    }

    function populateProducts(products) {
        if (!$('#staffStockProduct').length) return;

        $('#staffStockProduct').html('<option value="">Pick an item...</option>' + products.map((product) => `
            <option value="${product.id}">${escapeHtml(product.product_name)} (${Number(product.stock || 0)} pcs)</option>
        `).join(''));
    }

    function loadProducts() {
        $.post('/NexaStock/handlers/products.php', { action: 'fetch' }, function (products) {
            staffProducts = products;
            renderInventory(products);
            renderWatchlist(products);
            renderAssets(products);
            populateProducts(products);
        }, 'json');
    }

    function loadMovements() {
        if (!$('#staffMovementList').length && !$('#staffRecentActivity').length) return;

        $.post('/NexaStock/handlers/stock_movements.php', { action: 'fetch' }, function (movements) {
            if ($('#staffMovementList').length) {
                const rows = movements.length ? movements.map((movement) => {
                    const isIn = movement.movement_type === 'in';
                    return `
                        <tr class="border-white/5">
                            <td>${escapeHtml(movement.movement_date)}</td>
                            <td><span class="${isIn ? 'text-emerald-400' : 'text-amber-400'}">${isIn ? 'STOCK IN' : 'STOCK OUT'}</span></td>
                            <td>${escapeHtml(movement.product_name || 'Deleted product')}</td>
                            <td>${isIn ? '+' : '-'}${Number(movement.quantity || 0)}</td>
                            <td>${escapeHtml(movement.created_by || 'Staff')}</td>
                        </tr>
                    `;
                }).join('') : '<tr><td colspan="5" class="text-center text-slate-400">No stock movements yet.</td></tr>';

                $('#staffMovementList').html(rows);
            }

            if ($('#staffRecentActivity').length) {
                const activity = movements.length ? movements.slice(0, 4).map((movement) => {
                    const isIn = movement.movement_type === 'in';
                    return `
                        <div class="flex gap-3">
                            <div class="${isIn ? 'text-emerald-500' : 'text-amber-500'} mt-1"><i class="fas fa-circle-check text-xs"></i></div>
                            <div>
                                <p class="text-xs font-semibold text-slate-200">${isIn ? 'Stocked In' : 'Stocked Out'}: ${Number(movement.quantity || 0)} pcs ${escapeHtml(movement.product_name || '')}</p>
                                <p class="text-[10px] text-slate-500">${escapeHtml(movement.movement_date)}</p>
                            </div>
                        </div>
                    `;
                }).join('') : '<p class="text-xs text-slate-400">No recent activity yet.</p>';

                $('#staffRecentActivity').html(activity);
            }
        }, 'json');
    }

    function loadStats() {
        if (!$('#staffInboundToday').length) return;

        $.post('/NexaStock/handlers/dashboard_stats.php', { action: 'fetch' }, function (response) {
            if (!response.success) return;
            const stats = response.data;
            $('#staffInboundToday').text(stats.inbound_today || 0);
            $('#staffOutboundToday').text(stats.outbound_today || 0);
            $('#staffLowStockCount').text(stats.low_stock || 0);
            $('#staffTotalProducts').text(stats.total_products || 0);
        }, 'json');
    }

    $('#staffSearchInventory').on('input', function () {
        const value = $(this).val().toLowerCase();
        renderInventory(staffProducts.filter((product) => `${product.product_name} ${product.category}`.toLowerCase().includes(value)));
    });

    $('#staffQuickSearch').on('input', function () {
        const value = $(this).val().toLowerCase();
        renderWatchlist(staffProducts.filter((product) => `${product.product_name} ${product.category}`.toLowerCase().includes(value)));
    });

    $('#refreshStaffAssets').on('click', loadProducts);

    $('#staffMovementDate').val(new Date().toISOString().slice(0, 10));

    $('#staffStockMovementForm').on('submit', function (event) {
        event.preventDefault();

        $.post('/NexaStock/handlers/add_stock_movement.php', {
            action: 'move_stock',
            product_id: $('#staffStockProduct').val(),
            movement_type: $('#staffMovementType').val(),
            quantity: $('#staffMovementQty').val(),
            movement_date: $('#staffMovementDate').val(),
            notes: $('#staffMovementNotes').val(),
            created_by: 'Staff'
        }, function (response) {
            if (response.success) {
                stock_modal.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Stock Updated',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    $('#staffStockMovementForm')[0].reset();
                    $('#staffMovementDate').val(new Date().toISOString().slice(0, 10));
                    loadProducts();
                    loadMovements();
                    loadStats();
                });
            } else {
                Swal.fire({
                    target: document.getElementById('stock_modal'),
                    icon: 'error',
                    title: 'Movement Failed',
                    text: response.message
                });
            }
        }, 'json');
    });

    loadProducts();
    loadMovements();
    loadStats();
});
</script>
</body>
</html>
