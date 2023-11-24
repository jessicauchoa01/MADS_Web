<?php 

include 'includes/top.php';


?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Produtos Populares
                    </div>
                    <div class="card-body">
                        <div id="grafico"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    fetch('consulta.php')
        .then(response => response.json())
        .then(data => {
            console.log(data.data); // Exibe o array de valores
            console.log(data.nome);
            var options = {
                series: [{
                    data: data.data, 
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    zoom: {
                        enabled: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: data.nome,
                }
            };

            var chart = new ApexCharts(document.querySelector("#grafico"), options);
            chart.render();
        })
        .catch(error => {
            console.error('Erro ao obter os dados:', error);
        });
</script>
<?php include 'includes/bottom.php'; ?>