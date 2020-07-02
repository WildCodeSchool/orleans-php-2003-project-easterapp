function sortTable(n) {
    let table; let rows; let switching; let i; let x; let y; let shouldSwitch; let dir; let
        switchcount = 0;
    // eslint-disable-next-line prefer-const
    table = document.getElementById('sortFeature');
    switching = true;
    dir = 'asc';
    while (switching) {
        switching = false;
        // eslint-disable-next-line prefer-destructuring
        rows = table.rows;
        // eslint-disable-next-line no-plusplus
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName('TD')[n];
            y = rows[i + 1].getElementsByTagName('TD')[n];
            if (dir === 'asc') {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === 'desc') {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // eslint-disable-next-line no-plusplus
            switchcount++;
        } else if (switchcount === 0 && dir === 'asc') {
            dir = 'desc';
            switching = true;
        }
    }
}

window.addEventListener('load', () => {
    document.getElementById('nameSort').addEventListener('click', () => {
        sortTable(0);
    });
    document.getElementById('categorySort').addEventListener('click', () => {
        sortTable(2);
    });
});
