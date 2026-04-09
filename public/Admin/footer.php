<script>
    // 1. Search Functionality (Filters any table on the current page)
    const searchInput = document.querySelector('input[placeholder*="Search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }

    // 2. Delete Confirmation
    function confirmDelete(itemName) {
        if (confirm(`Are you sure you want to delete ${itemName}? This action cannot be undone.`)) {
            // Here you would redirect to a delete.php?id=... or use fetch()
            console.log("Deleting:", itemName);
            alert(itemName + " has been removed.");
        }
    }

    // 3. Export CSV Functionality (Simple Browser Download)
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

    // 4. Modal Trigger (Ensure the Modal ID matches)
    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) modal.showModal();
    }
</script>