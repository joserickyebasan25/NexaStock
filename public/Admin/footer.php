<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
    // EXPORT DATA
function exportTableToCSV(filename) {
    const csv = [];
    const rows = document.querySelectorAll('table tr');

    for (let i = 0; i < rows.length; i++) {
        const row = [];
        const cols = rows[i].querySelectorAll('td, th');

        for (let j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }

        csv.push(row.join(','));
    }

    const csvFile = new Blob([csv.join('\n')], { type: 'text/csv' });
    const downloadLink = document.createElement('a');
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = 'none';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    downloadLink.remove();
}

//---------------------------------------------------------------------------//

    //MODAL
function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) modal.showModal();
}

//---------------------------------------------------------------------------//

    //LOAD PRODUCT
$(document).ready(function () {
    function loadProducts() {
        if (!$('#productList').length) return;

        $.post('/NexaStock/handlers/products.php', { action: 'fetch' }, function (data) {
            let html = '';

            if (!data.length) {
                html = '<tr><td colspan="4" class="text-center text-slate-400">No products found</td></tr>';
            } else {
                data.forEach((product) => {
                    const status = product.stock > 0
                        ? '<span class="badge bg-green-500 text-white">In Stock</span>'
                        : '<span class="badge bg-red-500 text-white">Out of Stock</span>';

                    html += `<tr>
                        <td>${product.product_name}</td>
                        <td>${product.category}</td>
                        <td>${parseFloat(product.price).toFixed(2)}</td>
                        <td>${status}</td>
                    </tr>`;
                });
            }

            $('#productList').html(html);
        }, 'json').fail(function () {
            $('#productList').html('<tr><td colspan="4" class="text-center text-red-500">Failed to load products</td></tr>');
        });
    }

//---------------------------------------------------------------------------//

    //SEARCH PRODUCT
    $('#searchProduct').on('input', function () {
        const value = $(this).val().toLowerCase();
        $('#productList tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().includes(value));
        });
    });

//---------------------------------------------------------------------------//
    loadProducts();

    function money(value) {
        return Number(value || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function productRow(product, compact = false) {
        const stock = Number(product.stock || 0);
        const price = Number(product.price || 0);
        const value = price * stock;

        if (compact) {
            const status = stock > 5
                ? '<span class="badge badge-success badge-outline text-[10px] font-bold">IN STOCK</span>'
                : stock > 0
                    ? '<span class="badge badge-warning badge-outline text-[10px] font-bold">LOW STOCK</span>'
                    : '<span class="badge badge-error badge-outline text-[10px] font-bold">OUT OF STOCK</span>';

            return `<tr>
                <td>
                    <div class="font-semibold">${escapeHtml(product.product_name)}</div>
                    <div class="text-xs text-slate-500">${escapeHtml(product.category || 'Uncategorized')}</div>
                </td>
                <td><span class="font-mono text-xs">#${escapeHtml(product.sku || product.id)}</span></td>
                <td>${status}</td>
                <td>${stock} pcs</td>
                <td class="text-right">
                    <button type="button" class="btn btn-xs bg-white/10 border-white/10 text-white editProduct" data-product='${escapeHtml(JSON.stringify(product))}'>
                        <i class="fas fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-xs bg-red-600/20 border-red-500/30 text-red-200 deleteProduct" data-id="${product.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>`;
        }

        return `<tr>
            <td class="font-semibold">${escapeHtml(product.product_name)}</td>
            <td>${escapeHtml(product.category)}</td>
            <td>${stock}</td>
            <td>${money(price)}</td>
            <td>
                <div class="flex gap-2">
                    <button type="button" class="btn btn-xs bg-white/10 border-white/10 text-white editProduct" data-product='${escapeHtml(JSON.stringify(product))}'>
                        <i class="fas fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-xs bg-red-600/20 border-red-500/30 text-red-200 deleteProduct" data-id="${product.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>`;
    }

    function renderAdminInventory(products) {
        if ($('#inventoryList').length) {
            const rows = products.length
                ? products.map((product) => productRow(product)).join('')
                : '<tr><td colspan="5" class="text-center text-slate-400">No products found.</td></tr>';

            $('#inventoryList').html(rows);
        }

        if ($('#adminDashboardInventoryList').length) {
            const rows = products.length
                ? products.slice(0, 8).map((product) => productRow(product, true)).join('')
                : '<tr><td colspan="5" class="text-center text-slate-400">No products found.</td></tr>';

            $('#adminDashboardInventoryList').html(rows);
        }
    }

    function loadAdminInventory() {
        if (!$('#inventoryList').length && !$('#adminDashboardInventoryList').length) return;

        $.post('/NexaStock/handlers/products.php', { action: 'fetch' }, function (products) {
            renderAdminInventory(products);
        }, 'json').fail(function () {
            $('#inventoryList, #adminDashboardInventoryList').html('<tr><td colspan="5" class="text-center text-red-500">Failed to load products.</td></tr>');
        });
    }

    window.openProductModal = function () {
        const modal = document.getElementById('productModal');
        const form = document.getElementById('productForm');

        if (!modal || !form) return;

        $('#productModalTitle').text('Add Product');
        form.reset();
        $('#product_id').val('');
        modal.showModal();
    };

    $('#productForm').on('submit', function (event) {
        event.preventDefault();

        const id = $('#product_id').val();
        const payload = {
            action: id ? 'update' : 'add',
            product_name: $('#product_name').val(),
            sku: '',
            category: $('#category').val(),
            price: $('#price').val(),
            stock: $('#stock').val()
        };

        if (id) payload.id = id;

        $.post(id ? '/NexaStock/handlers/update_product.php' : '/NexaStock/handlers/add_product.php', payload, function (response) {
            if (response.success) {
                document.getElementById('productModal')?.close();
                Swal.fire({
                    icon: 'success',
                    title: id ? 'Product Updated' : 'Product Added',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    loadAdminInventory();
                    loadProducts();
                    loadDashboardStats();
                });
                return;
            }

            Swal.fire({
                icon: 'error',
                title: 'Action Failed',
                text: response.message
            });
        }, 'json').fail(function () {
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'Something went wrong. Please try again.'
            });
        });
    });

    $(document).on('click', '.editProduct', function () {
        const product = $(this).data('product');
        const modal = document.getElementById('productModal');

        if (!modal) return;

        $('#productModalTitle').text('Edit Product');
        $('#product_id').val(product.id);
        $('#product_name').val(product.product_name);
        $('#category').val(product.category);
        $('#price').val(product.price);
        $('#stock').val(product.stock);
        modal.showModal();
    });

    $(document).on('click', '.deleteProduct', function () {
        const productId = $(this).data('id');

        Swal.fire({
            icon: 'warning',
            title: 'Delete Product?',
            text: 'This product and its stock history will be removed.',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            buttonsStyling: false,
            customClass: {
                actions: 'gap-3',
                confirmButton: 'px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700',
                cancelButton: 'px-4 py-2 rounded-lg bg-slate-200 text-slate-900 font-semibold hover:bg-slate-300'
            }
        }).then((result) => {
            if (!result.isConfirmed) return;

            $.post('/NexaStock/handlers/delete_product.php', {
                action: 'delete',
                id: productId
            }, function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Deleted',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        loadAdminInventory();
                        loadProducts();
                        loadDashboardStats();
                    });
                    return;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Delete Failed',
                    text: response.message
                });
            }, 'json').fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Something went wrong. Please try again.'
                });
            });
        });
    });

    $('#searchInventory').on('input', function () {
        const value = $(this).val().toLowerCase();
        $('#inventoryList tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().includes(value));
        });
    });

    $('#dashboardExportCsv').on('click', function () {
        window.location.href = '/NexaStock/handlers/export_inventory_csv.php';
    });

    function populateStockProducts(products) {
        if (!$('#stockProduct').length) return;

        const options = products.map((product) => `
            <option class="bg-[#11141b] text-white" value="${product.id}">
                ${escapeHtml(product.product_name)} (${Number(product.stock || 0)} pcs)
            </option>
        `).join('');

        $('#stockProduct').html('<option class="bg-[#11141b] text-white" value="">Select product</option>' + options);
    }

    function renderCriticalStock(products) {
        if (!$('#criticalStockList').length) return;

        const critical = products.filter((product) => Number(product.stock || 0) <= 5);
        const rows = critical.length ? critical.map((product) => `
            <div class="rounded-xl border border-red-500/20 bg-red-500/10 p-3">
                <p class="font-semibold text-red-200">${escapeHtml(product.product_name)}</p>
                <p class="text-slate-400">${Number(product.stock || 0)} pcs remaining</p>
            </div>
        `).join('') : '<p class="text-slate-400">No critical stock alerts.</p>';

        $('#criticalStockList').html(rows);
    }

    function loadStockProducts() {
        if (!$('#stockProduct').length && !$('#criticalStockList').length) return;

        $.post('/NexaStock/handlers/products.php', { action: 'fetch' }, function (products) {
            populateStockProducts(products);
            renderCriticalStock(products);
        }, 'json').fail(function () {
            $('#criticalStockList').html('<p class="text-red-400">Failed to load stock alerts.</p>');
        });
    }

    function renderAdminMovements(movements) {
        if (!$('#movementList').length) return;

        const rows = movements.length ? movements.map((movement) => {
            const isIn = movement.movement_type === 'in';
            return `
                <tr class="border-white/5">
                    <td>${escapeHtml(movement.movement_date)}</td>
                    <td><span class="${isIn ? 'text-emerald-400' : 'text-amber-400'}">${isIn ? 'STOCK IN' : 'STOCK OUT'}</span></td>
                    <td>${escapeHtml(movement.product_name || 'Deleted product')}</td>
                    <td>${isIn ? '+' : '-'}${Number(movement.quantity || 0)}</td>
                    <td>
                        <div>${escapeHtml(movement.notes || '')}</div>
                        <div class="text-[10px] text-slate-500">${escapeHtml(movement.created_by || 'Admin')}</div>
                    </td>
                </tr>
            `;
        }).join('') : '<tr><td colspan="5" class="text-center text-slate-400">No stock movements yet.</td></tr>';

        $('#movementList').html(rows);
    }

    function renderAdminActivity(movements) {
        if (!$('#adminActivityList').length) return;

        const rows = movements.length ? movements.slice(0, 5).map((movement) => {
            const isIn = movement.movement_type === 'in';
            const icon = isIn ? 'fa-arrow-down' : 'fa-arrow-up';
            const color = isIn ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-slate-950';
            const actor = movement.created_by || 'Admin';
            const product = movement.product_name || 'Deleted product';
            const quantity = Number(movement.quantity || 0);
            const action = isIn ? 'stocked in' : 'stocked out';

            return `
                <li class="relative pl-8">
                    <span class="absolute left-0 top-1 w-6 h-6 rounded-full ${color} flex items-center justify-center text-[10px]">
                        <i class="fas ${icon}"></i>
                    </span>
                    <p class="text-sm font-semibold">${escapeHtml(actor)} ${action} ${quantity} pcs</p>
                    <p class="text-xs text-slate-400">${escapeHtml(product)}${movement.notes ? ` - ${escapeHtml(movement.notes)}` : ''}</p>
                    <span class="text-[10px] text-slate-500">${escapeHtml(movement.movement_date)}</span>
                </li>
            `;
        }).join('') : '<li class="pl-8 text-sm text-slate-400">No system activity yet.</li>';

        $('#adminActivityList').html(rows);
    }

    function loadAdminMovements() {
        if (!$('#movementList').length && !$('#adminActivityList').length) return;

        $.post('/NexaStock/handlers/stock_movements.php', { action: 'fetch' }, function (movements) {
            renderAdminMovements(movements);
            renderAdminActivity(movements);
        }, 'json').fail(function () {
            $('#movementList').html('<tr><td colspan="5" class="text-center text-red-500">Failed to load stock movements.</td></tr>');
            $('#adminActivityList').html('<li class="pl-8 text-sm text-red-400">Failed to load system activity.</li>');
        });
    }

    $('#movementDate').val(new Date().toISOString().slice(0, 10));

    $('#stockMovementForm').on('submit', function (event) {
        event.preventDefault();

        $.post('/NexaStock/handlers/add_stock_movement.php', {
            action: 'move_stock',
            product_id: $('#stockProduct').val(),
            movement_type: $('#movementType').val(),
            quantity: $('#movementQty').val(),
            movement_date: $('#movementDate').val(),
            notes: $('#movementNotes').val(),
            created_by: 'Admin'
        }, function (response) {
            if (response.success) {
                document.getElementById('stockMovementModal')?.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Stock Updated',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    $('#stockMovementForm')[0].reset();
                    $('#movementDate').val(new Date().toISOString().slice(0, 10));
                    loadAdminInventory();
                    loadStockProducts();
                    loadAdminMovements();
                    loadDashboardStats();
                });
                return;
            }

            Swal.fire({
                target: document.getElementById('stockMovementModal'),
                icon: 'error',
                title: 'Movement Failed',
                text: response.message
            });
        }, 'json').fail(function () {
            Swal.fire({
                target: document.getElementById('stockMovementModal'),
                icon: 'error',
                title: 'Server Error',
                text: 'Something went wrong. Please try again.'
            });
        });
    });

    function loadDashboardStats() {
        if (!$('#dashboardInventoryValue').length && !$('#dashboardTotalProducts').length && !$('#dashboardActiveUsers').length) return;

        $.post('/NexaStock/handlers/dashboard_stats.php', { action: 'fetch' }, function (response) {
            if (!response.success || !response.data) return;

            const stats = response.data;
            $('#dashboardInventoryValue').text(money(stats.inventory_value));
            $('#dashboardTotalProducts').text(stats.total_products || 0);
            $('#dashboardLowStock').text(`${stats.low_stock || 0} Items`);
            $('#dashboardActiveUsers').text(stats.active_users || 0);
        }, 'json');
    }

    loadDashboardStats();
    loadAdminInventory();
    loadStockProducts();
    loadAdminMovements();

    //STAFF AVATAR/PROFILE
    if (!$('#staffList').length) return;

    const defaultPhoto = 'https://ui-avatars.com/api/?name=Staff&background=8b5cf6&color=fff';

    function avatarFor(staff) {
        if (staff.photo) return staff.photo;
        const name = encodeURIComponent(`${staff.first_name || 'Staff'} ${staff.last_name || ''}`.trim());
        return `https://ui-avatars.com/api/?name=${name}&background=8b5cf6&color=fff`;
    }

    function escapeHtml(value) {
        return $('<div>').text(value ?? '').html();
    }

//---------------------------------------------------------------------------//

    // LOAD STAFF
    function loadStaff() {
        $.post('/NexaStock/handlers/display_staff.php', { action: 'fetch' }, function (staff) {
            const keyword = $('#searchStaff').val().toLowerCase();
            const filtered = staff.filter((item) => {
                const text = `${item.first_name} ${item.last_name} ${item.email} ${item.role}`.toLowerCase();
                return text.includes(keyword);
            });

            if (!filtered.length) {
                $('#staffList').html('<p class="text-sm text-slate-400">No staff found.</p>');
                return;
            }

            $('#staffList').html(filtered.map((item) => `
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 rounded-2xl border border-white/10 bg-white/5 p-4">
                    <div class="flex items-center gap-4 min-w-0">
                        <div class="avatar">
                            <div class="w-12 rounded-full">
                                <img src="${escapeHtml(avatarFor(item))}" alt="${escapeHtml(item.first_name)} ${escapeHtml(item.last_name)}" />
                            </div>
                        </div>
                        <div class="min-w-0">
                            <p class="font-semibold text-white truncate">${escapeHtml(item.first_name)} ${escapeHtml(item.last_name)}</p>
                            <p class="text-sm text-slate-400 truncate">${escapeHtml(item.email)}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="badge badge-outline border-purple-400/30 text-purple-300">${escapeHtml(item.role)}</span>
                        <button type="button" class="btn btn-sm bg-white/10 border-white/10 text-white editStaff" data-staff='${escapeHtml(JSON.stringify(item))}'>
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-sm bg-red-600/20 border-red-500/30 text-red-200 deleteStaff" data-id="${item.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `).join(''));
        }, 'json');
    }

    window.openAddModal = function () {
        $('#modalTitle').text('Add Staff');
        $('#staffForm')[0].reset();
        $('#staff_id').val('');
        $('#current_photo').val('');
        $('#password').attr('placeholder', 'Password');
        $('#photoPreview').attr('src', defaultPhoto);
        staffModal.showModal();
    };

    $('#photo').on('change', function () {
        const file = this.files[0];
        if (!file) {
            $('#photoPreview').attr('src', $('#current_photo').val() || defaultPhoto);
            return;
        }

        $('#photoPreview').attr('src', URL.createObjectURL(file));
    });
//---------------------------------------------------------------------------//

    //ADD STAFF
    $('#staffForm').on('submit', function (event) {
        event.preventDefault();

        const id = $('#staff_id').val();
        const formData = new FormData();
        formData.append('action', id ? 'update' : 'add');
        if (id) formData.append('id', id);
        formData.append('fname', $('#fname').val());
        formData.append('lname', $('#lname').val());
        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());
        formData.append('role', $('#role').val());
        if ($('#photo')[0].files[0]) {
            formData.append('photo', $('#photo')[0].files[0]);
        }

        $.ajax({
            url: id ? '/NexaStock/handlers/update_staff.php' : '/NexaStock/handlers/add_staff.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                staffModal.close();

                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: id ? 'Staff Updated' : 'Staff Added',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        loadStaff();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Action Failed',
                        text: response.message
                    });
                }
            },
            error: function () {
                staffModal.close();

                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });

//---------------------------------------------------------------------------//

    //UPDATE STAFF
    $(document).on('click', '.editStaff', function () {
        const staff = $(this).data('staff');
        $('#modalTitle').text('Edit Staff');
        $('#staff_id').val(staff.id);
        $('#current_photo').val(staff.photo || '');
        $('#fname').val(staff.first_name);
        $('#lname').val(staff.last_name);
        $('#email').val(staff.email);
        $('#password').val('').attr('placeholder', 'Leave blank to keep current password');
        $('#role').val(staff.role);
        $('#photo').val('');
        $('#photoPreview').attr('src', avatarFor(staff));
        staffModal.showModal();
    });

//---------------------------------------------------------------------------//
    
    //DELETE STAFF
    $(document).on('click', '.deleteStaff', function () {
        const staffId = $(this).data('id');

        Swal.fire({
            icon: 'warning',
            title: 'Delete Staff?',
            text: 'This staff account will be permanently removed.',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            buttonsStyling: false,
            customClass: {
                actions: 'gap-3',
                confirmButton: 'px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700',
                cancelButton: 'px-4 py-2 rounded-lg bg-slate-200 text-slate-900 font-semibold hover:bg-slate-300'
            }
        }).then((result) => {
            if (!result.isConfirmed) return;

            $.post('/NexaStock/handlers/delete_staff.php', {
                action: 'delete',
                id: staffId
            }, function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Staff Deleted',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        loadStaff();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Delete Failed',
                        text: response.message
                    });
                }
            }, 'json').fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Something went wrong. Please try again.'
                });
            });
        });
    });

//---------------------------------------------------------------------------//

    //SEARCH FILTER FOR STAFF
    $('#searchStaff').on('input', loadStaff);

    loadStaff();

//---------------------------------------------------------------------------//

});
</script>
</body>
</html>
