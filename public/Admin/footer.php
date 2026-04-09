</body>
<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
    // Export Data
    function exportTableToCSV(filename) {
        let csv = [];
        const rows = document.querySelectorAll("table tr");
        
        for (let i = 0; i < rows.length; i++) {
            let row = [], cols = rows[i].querySelectorAll("td, th");
            for (let j = 0; j < cols.length; j++) row.push(cols[j].innerText);
            csv.push(row.join(","));
        }
        
        const csvFile = new Blob([csv.join("\n")], {type: "text/csv"});
        const downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) modal.showModal();
    }
    //------------------------------------------------------------------------------------------------------------------

    // LOAD all users
        function loadStaff(){
    $.post('/NexaStock/handlers/staff.php',{action:'fetch'}, function(data){
        let html = '';
        data.forEach(s => {
            let initials = s.first_name.charAt(0)+s.last_name.charAt(0);
            let badge = s.role=='admin'?'<span class="badge bg-purple-600 text-white text-xs">Admin</span>':'<span class="badge bg-sky-500 text-white text-xs">Staff</span>';
            html += `<div class="staff-item flex items-center justify-between p-4 rounded-2xl bg-white/5 border border-white/10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold">${initials}</div>
                            <div><p class="text-white font-semibold">${s.first_name} ${s.last_name}</p>${badge}</div>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="editStaff(${s.id},'${s.first_name}','${s.last_name}','${s.email}','${s.role}')" class="btn btn-xs bg-blue-500 text-white">Edit</button>
                            <button onclick="deleteStaff(${s.id})" class="btn btn-xs bg-red-500 text-white">Delete</button>
                        </div>
                    </div>`;
        });
        $('#staffList').html(html);
    },'json');
}

$('#staffForm').submit(function(e){
    e.preventDefault();
    let id = $('#staff_id').val();
    $.post('/NexaStock/handlers/staff.php',{
        action:id?'update':'add',
        id:id,
        fname:$('#fname').val(),
        lname:$('#lname').val(),
        email:$('#email').val(),
        password:$('#password').val(),
        role:$('#role').val()
    }, function(res){
        if(res.status=='error'){ 
            Swal.fire({icon:'error',title:'Oops',text:res.message});
            return; 
        }
        Swal.fire({icon:'success',title:'Success',text:res.message});
        staffModal.close(); 
        $('#staffForm')[0].reset();
        $('#password').show();
        loadStaff();
    },'json');
});


function openAddModal(){ $('#modalTitle').text('Add Staff'); $('#staffForm')[0].reset(); $('#staff_id').val(''); $('#password').show(); staffModal.showModal(); }
function editStaff(id,f,l,e,r){ $('#modalTitle').text('Edit Staff'); $('#staff_id').val(id); $('#fname').val(f); $('#lname').val(l); $('#email').val(e); $('#role').val(r); $('#password').hide(); staffModal.showModal(); }
function deleteStaff(id){ Swal.fire({title:"Delete?",icon:"warning",showCancelButton:true}).then((res)=>{ if(res.isConfirmed){ $.post('/NexaStock/handlers/staff.php',{action:'delete',id:id},function(){ loadStaff(); }); } }); }

$('#searchStaff').on('keyup', function(){
    let value = $(this).val().toLowerCase();
    $('.staff-item').filter(function(){ $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); });
});

$(document).ready(function(){ loadStaff(); });

//------------------------------------------------------------------------------------------------------------------

// Load Product
function loadProducts() {
    $.post('/NexaStock/handlers/products.php', { action: 'fetch' }, function(data){
        let html = '';

        if(data.length === 0){
            html = '<tr><td colspan="4" class="text-center text-slate-400">No products found</td></tr>';
        } else {
            data.forEach(p => {
                let status = p.stock > 0
                    ? '<span class="badge bg-green-500 text-white">In Stock</span>'
                    : '<span class="badge bg-red-500 text-white">Out of Stock</span>';

                html += `<tr>
                            <td>${p.product_name}</td>
                            <td>${p.category}</td>
                            <td>${parseFloat(p.price).toFixed(2)}</td>
                            <td>${status}</td>
                        </tr>`;
            });
        }

        $('#productList').html(html);
    }, 'json').fail(function(xhr, status, error){
        console.error('AJAX Error:', status, error);
        $('#productList').html('<tr><td colspan="4" class="text-center text-red-500">Failed to load products</td></tr>');
    });
}

// Product Search Filter
$('#searchProduct').on('keyup', function(){
    let value = $(this).val().toLowerCase();
    $('#productList tr').filter(function(){
        $(this).toggle($(this).text().toLowerCase().includes(value));
    });
});

$(document).ready(function(){
    loadProducts();
});

</script>
</body>
</html>