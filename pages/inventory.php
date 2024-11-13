<?php
    if(isset($_GET['status'])) {
        if ($_GET['status'] == "success") {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #0e3616; background: #73ff9d">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2em; height: 1.2em; stroke: currentColor;" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record posted successfully.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if ($_GET['status'] == "deleted") {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #360e0e; background: #ff7373">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="width: 1.2em; height: 1.2em; stroke: currentColor;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record deleted.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        } else if ($_GET['status'] == 'updated') {
            echo '
            <div id="success" style="z-index: 999999; width: 30%; position: absolute; top: 3em; left: 50%; transform: translateX(-50%);
            padding: 1em;
            border-radius: 1em;
            display: flex;
            align-items: center;
            gap: 0.6em;
            color: #0e1a36; background: #739fff">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="width: 1.2em; height: 1.2em; stroke: currentColor;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Record updated.</span>
            </div>
            <style>
                #success {
                    opacity: 0;
                    transition: all;
                    animation-name: success;
                    animation-duration: 4s;
                }
        
                @keyframes success {
                    0%, 80% {
                        opacity: 1;
                    }
                    100% {
                        opacity: 0;
                    }
                }
            </style>
            ';
        }
    }
?>

<!-- CODE
<div class="container-fluid py-4">
    <div class="row mb-3">
        <div class="col-6">
            <a href="" class="btn btn-primary">Add</a> 
        </div>
        <div class="col-6 text-end"> 
            <input type="text" class="form-control d-inline-block" placeholder="Search..." aria-label="Search" style="width: 200px;"> 
        </div>
    </div>
</div> 
-->

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <!-- Naglagay aq Add button and search bar here, yung spacing ba e aayusin na din or sa styling na yon? -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-2 m-1 form-control align-items-center" style="width: 300px;">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g></svg>
                        <input oninput="onFilterTextBoxChanged(); document.getElementById('clear').style.display = this.value != '' ? 'block' : 'none';" type="text" id="search" placeholder="Search..." aria-label="Search" style="all: unset; flex: 1;">
                        <button id="clear" onclick="clearFilter(); document.getElementById('search').value = null; this.style.display = 'none'" class="w-5 h-5" style="all: unset; cursor: pointer; display: none;">
                            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>currentColorancurrentColorel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-currentColorase" fill="currentColor" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
                        </button>
                    </div>
                    <div class="d-flex" style="gap: 5px;">
                        <button class="btn btn-info" data-toggle="modal" data-target="#orderModal" id="orderProduct">Order</button>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">+ Add</button>
                    </div>
                </div>
                <ul class="nav nav-tabs mx-4 my-1">
                    <li class="nav-item">
                        <a class="tab nav-link <?php echo !isset($_GET['tab']) ? "active" : "" ?>" href="?page=inventory">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="tab nav-link <?php echo isset($_GET['tab']) ? "active" : "" ?>" href="?page=inventory&tab=archived">Archived</a>
                    </li>
                </ul>
                <div class="card-body pt-0">
                    <div id="myGrid" class="ag-theme-quartz" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include './components/modals/add_product.php';
    include './components/modals/edit_product.php';
    include './components/modals/archive_product.php';
    include './components/modals/restore_product.php';
    include './components/modals/order_product.php';
    $records = $crud->search("inventory", !isset($_GET['tab']) ? 0 : 1, ["archived"]);
    if ($records) {
        foreach ($records as $record) {
            editProductModal($record);
            archive($record['id'], $record['product_id']);
            restore($record['id'], $record['product_id']);
        }
    }
?>

<script>
    const inactiveTab = () => {
        const tabs = document.getElementsByClassName("tab");
        for(let i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove("active");
        }
    }

    let gridApi;
    let rowData = <?php echo json_encode($crud->search("inventory", !isset($_GET['tab']) ? 0 : 1, ["archived"]) ?? []) ?? []; ?>;
    let barcode = '';
    let lastInputTime = Date.now();

    document.addEventListener('keydown', function (event) {
        const currentTime = Date.now();
        
        if (currentTime - lastInputTime > 100) {
            barcode = '';
        }
        
        lastInputTime = currentTime;

        if (event.key.length === 1 && !event.ctrlKey && !event.altKey) {
            barcode += event.key;
        }

        if (event.key === 'Enter') {
            console.log(barcode)
            if (barcode.length > 2) {
                let data = rowData.filter(data => data.product_id == barcode);
                console.log(data)
                if ((data.length == 0 || document.getElementById(`editModal${barcode}`).style.display != "block") && document.getElementById(`addModal`).style.display != "block") {
                    console.log(barcode);
                    if (data.length > 0) {
                        $(`#editModal${barcode}`).modal('show');
                    } else {
                        $(`#addModal`).modal('show');
                        document.getElementById('barcodeInput').value = barcode;
                    }
                }
            }
            barcode = '';
            return;
        }
    });


    <?php
        if (isset($_GET['tab'])) {
            echo '
                const actionButtons = (id) => {
                    return (
                        `
                        <div class="d-flex gap-2 align-items-center" style="height: 100%;">
                            <button class="archive-btn" data-toggle="modal" data-target="#restoreModal${id}">
                                <svg style="width: 15px; height: 15px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M2 5C2 4.05719 2 3.58579 2.29289 3.29289C2.58579 3 3.05719 3 4 3H20C20.9428 3 21.4142 3 21.7071 3.29289C22 3.58579 22 4.05719 22 5C22 5.94281 22 6.41421 21.7071 6.70711C21.4142 7 20.9428 7 20 7H4C3.05719 7 2.58579 7 2.29289 6.70711C2 6.41421 2 5.94281 2 5Z" fill="currentColor"></path> <path d="M20.0689 8.49993C20.2101 8.49999 20.3551 8.50005 20.5 8.49805V12.9999C20.5 16.7711 20.5 18.6568 19.3284 19.8283C18.183 20.9737 16.3552 20.9993 12.75 20.9999L12.75 13.9543L14.4425 15.8349C14.7196 16.1428 15.1938 16.1678 15.5017 15.8907C15.8096 15.6136 15.8346 15.1394 15.5575 14.8315L12.5575 11.4982C12.4152 11.3401 12.2126 11.2499 12 11.2499C11.7874 11.2499 11.5848 11.3401 11.4425 11.4982L8.44254 14.8315C8.16544 15.1394 8.1904 15.6136 8.49828 15.8907C8.80617 16.1678 9.28038 16.1428 9.55748 15.8349L11.25 13.9543L11.25 20.9999C7.64485 20.9993 5.81697 20.9737 4.67157 19.8283C3.5 18.6568 3.5 16.7711 3.5 12.9999V8.49805C3.64488 8.50005 3.78999 8.49999 3.93114 8.49993H20.0689Z" fill="currentColor"></path> </g></svg>
                            </button>
                        </div>
                        `
                    );
                }
            ';
        } else {
            echo '
                const actionButtons = (id) => {
                    return (
                        `
                        <div class="d-flex gap-2 align-items-center" style="height: 100%;">
                            <button class="edit-btn" data-toggle="modal" id="edit${id}" data-target="#editModal${id}">
                                <svg style="width: 15px; height: 15px;" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorurrentColorerCarrier" stroke-linecurrentcurrentcurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColorurrentColoronCarrier"> <title>edit_currentColorurrentColorover [currentColorurrentColor]</title> <descurrentcurrentcurrentc>Created with SketcurrentColorurrentColorh.</descurrentcurrentcurrentc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-419.000000, -359.000000)" fill="currentColor"> <g id="icurrentColorurrentColorons" transform="translate(56.000000, 160.000000)"> <path d="M384,209.210475 L384,219 L363,219 L363,199.42095 L373.5,199.42095 L373.5,201.378855 L365.1,201.378855 L365.1,217.042095 L381.9,217.042095 L381.9,209.210475 L384,209.210475 Z M370.35,209.51395 L378.7731,201.64513 L380.4048,203.643172 L371.88195,212.147332 L370.35,212.147332 L370.35,209.51395 Z M368.25,214.105237 L372.7818,214.105237 L383.18415,203.64513 L378.8298,199 L368.25,208.687714 L368.25,214.105237 Z" id="edit_currentColorurrentColorover-[currentColorurrentColor]"> </path> </g> </g> </g> </g></svg>
                            </button>
                            <button class="archive-btn" data-toggle="modal" data-target="#archiveModal${id}">
                                <i class="fa fa-archive"></i>
                            </button>
                        </div>
                        `
                    );
                }
            ';
        }
    ?>

    const onFilterTextBoxChanged = () => {
        gridApi.setGridOption(
            "quickFilterText",
            document.getElementById("search").value,
        );
    }

    const clearFilter = () => {
        gridApi.setGridOption(
            "quickFilterText",
            "",
        );
    }

    const gridOptions = {
        rowData: rowData,
        columnDefs: [
            { field: "product_id", flex: 1, headerName: "ID" },
            { field: "product_name", flex: 1, headerName: "Product Name"  },
            { field: "price", flex: 1, headerName: "Price"  },
            { field: "stock", flex: 1, headerName: "Stock"  },
            { field: "product_id", headerName: "Actions", flex: 1, cellRenderer: (params) => actionButtons(params.value) }
        ],
        loading: false,
    };

    const myGridElement = document.querySelector('#myGrid');
    gridApi = agGrid.createGrid(myGridElement, gridOptions);

</script>