import ApexCharts from "apexcharts";

export function initCharts() {
    // Dados simulados
    const data = {
        receitas: [
            3200, 2800, 3500, 4200, 3800, 4100, 3900, 4300, 4500, 4700, 4900,
            5200,
        ],
        despesas: [
            2200, 2400, 2600, 2800, 2500, 2700, 2900, 3100, 3300, 3500, 3700,
            3900,
        ],
    };

    // Configurações comuns
    const commonOptions = {
        chart: {
            type: "bar",
            height: "100%",
            toolbar: {
                show: false,
                tools: {
                    download: true,
                    selection: false,
                    zoom: false,
                    zoomin: false,
                    zoomout: false,
                    pan: false,
                },
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: "top",
                },
            },
        },
        dataLabels: {
            enabled: true,
            formatter: (val) => `R$ ${val.toLocaleString("pt-BR")}`,
            offsetY: -20,
            style: {
                fontSize: "12px",
                colors: ["#304758"],
            },
        },
        xaxis: {
            categories: [
                "Jan",
                "Fev",
                "Mar",
                "Abr",
                "Mai",
                "Jun",
                "Jul",
                "Ago",
                "Set",
                "Out",
                "Nov",
                "Dez",
            ],
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        yaxis: {
            labels: {
                formatter: (val) => `R$ ${val.toLocaleString("pt-BR")}`,
            },
        },
        tooltip: {
            y: {
                formatter: (val) => `R$ ${val.toLocaleString("pt-BR")}`,
            },
        },
    };

    // Opções específicas
    const receitasOptions = {
        ...commonOptions,
        series: [
            {
                name: "Receitas",
                data: data.receitas,
            },
        ],
        colors: ["#15a349"],
    };

    const despesasOptions = {
        ...commonOptions,
        series: [
            {
                name: "Despesas",
                data: data.despesas,
            },
        ],
        colors: ["#db2525"],
        yaxis: {
            labels: {
                show: false,
            },
        },
    };

    // Função para renderizar com timeout (garante que o DOM esteja pronto)
    const renderWithTimeout = (selector, options) => {
        setTimeout(() => {
            const element = document.querySelector(selector);
            if (element) {
                new ApexCharts(element, options).render();
            }
        }, 100);
    };

    // Renderiza os gráficos
    renderWithTimeout("#chart-receitas", receitasOptions);
    renderWithTimeout("#chart-despesas", despesasOptions);
}
