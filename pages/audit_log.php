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

<?php
    include "./components/modals/scan_product.php";
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <!-- Naglagay aq Add button and search bar here, yung spacing ba e aayusin na din or sa styling na yon? -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex gap-2 m-1 form-control align-items-center" style="width: 300px;">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecurrentcap="round" stroke-linejoin="round"></path> </g></svg>
                        <input oninput="onFilterTextBoxChanged(); document.getElementById('clear').style.display = this.value != '' ? 'block' : 'none';" type="text" id="search" placeholder="Search..." aria-label="Search" style="all: unset; flex: 1;">
                        <button id="clear" onclick="clearFilter(); document.getElementById('search').value = null; this.style.display = 'none'" class="w-5 h-5" style="all: unset; cursor: pointer; display: none;">
                            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracurrentColorerCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_icurrentColoronCarrier"> <title>currentColorancurrentColorel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-currentColorase" fill="currentColor" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg>
                        </button>
                    </div>
                    <button class="btn btn-neutral scanBtn" style="background-color: #bbb; color: white;" data-toggle="modal" data-target="#scanModal">Scan</button>
                </div>
                <div class="card-body pt-0">
                    <div id="myGrid" class="ag-theme-quartz" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let barcode = '';
    let lastInputTime = Date.now();
    let scannedCodes = [];
    const products = <?php echo json_encode($crud->search("inventory", !isset($_GET['tab']) ? 0 : 1, ["archived"]) ?? []) ?>;
    console.log(products)

    document.addEventListener('keydown', function (event) {
        const currentTime = Date.now();
        
        if (currentTime - lastInputTime > 100) {
            barcode = '';
        }
        
        lastInputTime = currentTime;

        if (barcode.length === 0) {
            document.getElementById('barcodeInput').removeAttribute('readonly');
        }

        if (event.key === 'Enter') {
            if (barcode.length > 0) {
                let data = products.filter(data => data.product_id == barcode);
                console.log(barcode)
                if (data.length > 0) {
                    if (scannedCodes.includes(barcode)) {
                        document.getElementById(`qty${barcode}`).value++;
                        updateProdPrice(data[0].product_id, data[0].price);
                        updateTotal();
                    } else {
                        scannedCodes.push(barcode);
                        createCard(data[0]);
                    }
                } else {
                    alert("Product is not yet added to the inventory.");
                }
            }

            barcode = '';
            document.getElementById('barcodeInput').setAttribute('readonly', 'readonly');
            return;
        }

        if (event.key.length === 1 && !event.ctrlKey && !event.altKey) {
            barcode += event.key;
        }
    });

    document.getElementById('barcodeInput').addEventListener('focus', () => {
        document.getElementById('barcodeInput').setAttribute('readonly', 'readonly');
    });

    const createCard = (data) => {
        document.getElementById("no-prod").style.display = "none";
        document.getElementById("add-btn").disabled = false;
        const containerDiv = document.createElement('div');
        containerDiv.style.display = 'flex';
        containerDiv.style.justifyContent = 'space-between';
        containerDiv.style.alignItems = 'center';
        containerDiv.style.padding = '2em';
        containerDiv.style.borderRadius = '10px';
        containerDiv.style.background = '#e8f5ff';

        const leftDiv = document.createElement('div');
        leftDiv.style.display = 'flex';
        leftDiv.style.gap = '20px';
        leftDiv.style.alignItems = 'center';

        const productName = document.createElement('p');
        productName.style.fontSize = 'large';
        productName.style.margin = '0';
        productName.textContent = data.product_name;
        leftDiv.appendChild(productName);

        const productPrice = document.createElement('p');
        productPrice.style.fontSize = 'small';
        productPrice.style.margin = '0';
        productPrice.innerHTML = `₱<span class="product-price" id="price${data.product_id}">${data.price}</span>.00`;
        leftDiv.appendChild(productPrice);

        containerDiv.appendChild(leftDiv);

        const rightDiv = document.createElement('div');
        rightDiv.classList.add('d-flex', 'align-items-center');
        rightDiv.style.outline = '1px solid black';
        rightDiv.style.borderRadius = '5px';
        rightDiv.style.overflow = 'hidden';

        const minusButton = document.createElement('button');
        minusButton.type = 'button';
        minusButton.textContent = '-';
        minusButton.style.background = 'white';
        minusButton.style.width = '30px';
        minusButton.style.height = '100%';
        minusButton.style.marginBottom = '0';
        minusButton.style.border = '0';
        minusButton.onclick = function() {
            const qtyInput = document.getElementById(`qty${data.product_id}`);
            if (qtyInput.value > 1) qtyInput.value--;
            updateProdPrice(data.product_id, data.price);
            updateTotal();
        };
        rightDiv.appendChild(minusButton);

        const inputWrapper = document.createElement('div');
        inputWrapper.style.position = 'relative';

        const inputOverlay = document.createElement('div');
        inputOverlay.style.position = 'absolute';
        inputOverlay.style.top = '0';
        inputOverlay.style.left = '0';
        inputOverlay.style.width = '100%';
        inputOverlay.style.height = '100%';
        inputWrapper.appendChild(inputOverlay);

        const qtyInput = document.createElement('input');
        qtyInput.name = 'qty[]';
        qtyInput.id = `qty${data.product_id}`;
        qtyInput.style.width = '50px';
        qtyInput.style.border = '0';
        qtyInput.style.outline = '1px solid black';
        qtyInput.style.textAlign = 'center';
        qtyInput.classList.add('disabled');
        qtyInput.readOnly = true;
        qtyInput.value = '1';
        qtyInput.type = 'number';
        qtyInput.min = '1';
        qtyInput.oninput = function() {
            if (this.value <= 0) this.value = 1;
            else this.value = Math.abs(this.value);
        };
        inputWrapper.appendChild(qtyInput);
        rightDiv.appendChild(inputWrapper);

        const plusButton = document.createElement('button');
        plusButton.type = 'button';
        plusButton.textContent = '+';
        plusButton.style.background = 'white';
        plusButton.style.width = '30px';
        plusButton.style.height = '100%';
        plusButton.style.marginBottom = '0';
        plusButton.style.border = '0';
        plusButton.onclick = function() {
            qtyInput.value++;
            updateProdPrice(data.product_id, data.price);
            updateTotal();
        };
        rightDiv.appendChild(plusButton);

        const rightSide = document.createElement('div');
        rightSide.style.display = "flex";
        rightSide.style.alignItems = "center";
        rightSide.style.gap = "10px";

        rightSide.appendChild(rightDiv);

        const deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.textContent = '🗑';
        deleteButton.style.color = 'white';
        deleteButton.style.fontWeight = '500';
        deleteButton.style.background = '#ff1919';
        deleteButton.style.width = '30px';
        deleteButton.style.borderRadius = '10px';
        deleteButton.style.height = '100%';
        deleteButton.style.marginBottom = '0';
        deleteButton.style.border = '0';
        deleteButton.onclick = function() {
            containerDiv.remove();
            scannedCodes.pop(data.product_id);
            updateTotal();
            if (document.getElementById("card-container").childElementCount == 1) {
                document.getElementById("no-prod").style.display = "flex";
                document.getElementById("add-btn").disabled = true;
            }
        };
        rightSide.appendChild(deleteButton);

        const priceInput = document.createElement("input");
        priceInput.type = "hidden";
        priceInput.name = "prodInitPrice[]";
        priceInput.id = `prodInitPrice${data.product_id}`;
        priceInput.value = data.price;
        containerDiv.appendChild(priceInput);

        const recordID = document.createElement("input");
        recordID.type = "hidden";
        recordID.name = "recordID[]";
        recordID.value = data.id;
        containerDiv.appendChild(recordID);
        containerDiv.appendChild(rightSide);
        document.getElementById("card-container").appendChild(containerDiv);
        updateTotal();
    }

    
    document.querySelector(".scanBtn").addEventListener("click", () => {
        setTimeout(() => {
            document.getElementById('barcodeInput').focus();
        }, 100);
    })

    document.getElementById("scanModal").addEventListener("click", () => {
        document.getElementById('barcodeInput').focus();
    })

    document.getElementById('barcodeInput').addEventListener('focus', () => {
        document.getElementById('barcodeInput').setAttribute('readonly', 'readonly');
    });

    
    let gridApi;
    const rowData = <?php echo json_encode($crud->read_all("audit_log")); ?>;

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

    const productName = (id) => {
        const inventory = <?php echo json_encode($crud->read_all("inventory")); ?>;
        let name = "";
        inventory.forEach(element => {
            if (id == element['id']) {
                name = `<div>${element['product_name']}</div>`;
            }
        });
        return name;
    }

    const productID = (id) => {
        const inventory = <?php echo json_encode($crud->read_all("inventory")); ?>;
        let newId = "";
        inventory.forEach(element => {
            if (id == element['id']) {
                newId = `<div>${element['product_id']}</div>`;
            }
        });
        return newId;
    }

    const gridOptions = {
        rowData: rowData,
        columnDefs: [
            { field: "product_id", flex: 1, headerName: "ID", cellRenderer: (params) => productID(params.value) },
            { field: "product_id", headerName: "Product Name", flex: 1, cellRenderer: (params) => productName(params.value) },
            { field: "quantity", flex: 1, headerName: "Quantity"  },
            { field: "price", flex: 1, headerName: "Price"  },
            { field: "datetime", flex: 1, headerName: "Date"  },
        ],
        loading: false,
    };

    const myGridElement = document.querySelector('#myGrid');
    gridApi = agGrid.createGrid(myGridElement, gridOptions);

    // Placeholder ng edit and delete buttons
    function editRecord(id) {
        alert(`Edit record with ID: ${id}`);
    }

    function deleteRecord(id) {
        alert(`Delete record with ID: ${id}`);
    }
</script>