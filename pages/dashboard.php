<div class="container-fluid py-4">
    <div class="row">
        <div class="col-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Products</p>
                                <h5 class="font-weight-bolder">
                                    <?php echo $crud->read_all("inventory") ? count($crud->read_all("inventory")) : 0; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end d-flex justify-content-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle"
                                style="position: relative; display: flex; justify-content: center; align-items: center;">
                                <svg class="w-40 h-40 text-white" style="opacity: 0.8;" fill="currentColor" viewBox="0 0 24.00 24.00" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tra#000000erCarrier" stroke-linecurrentcap="round" stroke-linejoin="round"></g><g id="SVGRepo_i#000000onCarrier"><path d="M20.929,1.628A1,1,0,0,0,20,1H4a1,1,0,0,0-.929.628l-2,5A1.012,1.012,0,0,0,1,7V22a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V7a1.012,1.012,0,0,0-.071-.372ZM4.677,3H19.323l1.2,3H3.477ZM3,21V8H21V21Zm8-3a1,1,0,0,1-1,1H6a1,1,0,0,1,0-2h4A1,1,0,0,1,11,18Z"></path></g></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                                <h5 class="font-weight-bolder">
                                    <?php echo $crud->read_all("users") ? count($crud->read_all("users")) : 0; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4 card p-4">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-2">
                <label for="timePeriod">Select Period:</label>
                <select id="timePeriod" class="form-select" style="width: 200px;">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <canvas id="auditLogChart"></canvas>
        </div>
        <?php
        $audit_log = $crud->read_all("audit_log") ?? [];

        // Prepare data for the graph
        $dataPoints = [];
        if ($audit_log) {
            foreach ($audit_log as $log) {
                $dataPoints[] = [
                    'datetime' => $log['datetime'],
                    'sales' => $log['price']
                ];
            }
        }
        ?>
        <script>
            const auditLogData = <?php echo json_encode($dataPoints); ?>;

            function groupDataByPeriod(data, period) {
                const groupedData = {};
                data.forEach(entry => {
                    const date = new Date(Date.parse(entry.datetime.replace(' ', 'T')));
                    let key;
                    switch (period) {
                        case 'daily':
                            key = date.toISOString().split('T')[0]; // YYYY-MM-DD
                            break;
                        case 'weekly':
                            const startOfWeek = new Date(date);
                            startOfWeek.setDate(date.getDate() - date.getDay());
                            key = startOfWeek.toISOString().split('T')[0];
                            break;
                        case 'monthly':
                            key = `${date.getFullYear()}-${('0' + (date.getMonth() + 1)).slice(-2)}`; // YYYY-MM
                            break;
                        case 'yearly':
                            key = date.getFullYear().toString(); // YYYY
                            break;
                    }
                    if (!groupedData[key]) {
                        groupedData[key] = { sales: 0 };
                    }
                    groupedData[key].sales += parseInt(entry.sales);
                });
                return groupedData;
            }


            function updateChart(period) {
                const groupedData = groupDataByPeriod(auditLogData, period);
                const labels = Object.keys(groupedData);
                const quantities = labels.map(label => groupedData[label].quantity);
                const sales = labels.map(label => groupedData[label].sales);

                chart.data.labels = labels;
                chart.data.datasets[0].data = sales;
                chart.update();
            }

            const ctx = document.getElementById('auditLogChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Sales',
                            data: [],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day'
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });

            document.getElementById('timePeriod').addEventListener('change', function() {
                updateChart(this.value);
            });

            // Initial load with 'daily' period
            updateChart('daily');
        </script>
    </div>
</div>