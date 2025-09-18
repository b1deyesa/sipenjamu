import './bootstrap';
// import Alpine from 'alpinejs';
import $ from 'jquery';
import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels';

window.$ = window.jQuery = $;
// window.Alpine = Alpine;

// Alpine.start();
Chart.register(ChartDataLabels);

// Generate Chart
window.initChart = function(id, type, labels, datas, backgroundColor = []) {
    const legendPadding = 10
    const boxWidth = 30
    
    const defaultColors = [
        "rgba(255, 99, 132, 0.5)",
        "rgba(54, 162, 235, 0.5)",
        "rgba(255, 206, 86, 0.5)",
        "rgba(75, 192, 192, 0.5)",
        "rgba(153, 102, 255, 0.5)",
        "rgba(255, 159, 64, 0.5)"
    ];

    const defaultBorderColors = [
        "rgba(255, 99, 132, 1)",
        "rgba(54, 162, 235, 1)",
        "rgba(255, 206, 86, 1)",
        "rgba(75, 192, 192, 1)",
        "rgba(153, 102, 255, 1)",
        "rgba(255, 159, 64, 1)"
    ];

    const bgColors = (backgroundColor && backgroundColor.length > 0) ? backgroundColor : defaultColors;

    const borderColors = (backgroundColor && backgroundColor.length > 0)
        ? backgroundColor.map(color => {
            if (color.startsWith('rgba')) {
                return color.replace(/rgba\((\d+),\s*(\d+),\s*(\d+),\s*[\d.]+\)/, 'rgba($1, $2, $3, 1)');
            }
            return color;
        })
        : defaultBorderColors;

    const ctx = document.getElementById(id);
    if (ctx) {
        new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: "Dataset",
                    data: datas,
                    backgroundColor: bgColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        right: type === 'pie' ? legendPadding : 0,
                        left: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                plugins: {
                    legend: {
                        display: type !== 'bar',
                        position: type === 'pie' ? 'right' : 'top',
                        labels: {
                            padding: legendPadding,
                            boxWidth: boxWidth,
                        }
                    },
                    datalabels: {
                        display: type !== 'bar',
                        color: '#FFF',
                        anchor: 'end',
                        align: 'start',
                        offset: 10,
                        formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data;
                            const total = data.reduce((sum, val) => sum + val, 0);
                            const percent = ((value / total) * 100).toFixed(1); // 1 desimal
                            return `${percent}%`; 
                        }
                    }
                },
                scales: type !== 'pie' ? {
                    y: { beginAtZero: true }
                } : {}
            },
            plugins: [ChartDataLabels]
        });
    }
}

// Home Module Slide
document.addEventListener("DOMContentLoaded", function () {
    let $content = $(".list__content")
    if (!$content.length) {
        console.error(".list__content not found")
        return
    }

    let scrollSpeed = 1
    let autoSlide

    $content.append($content.html())

    function slideLoop() {
        $content.scrollLeft($content.scrollLeft() + scrollSpeed)
        if ($content.scrollLeft() >= $content[0].scrollWidth / 2) {
            $content.scrollLeft(0)
        }
    }

    function startAutoSlide() {
        autoSlide = setInterval(slideLoop, 20)
    }

    function stopAutoSlide() {
        clearInterval(autoSlide)
    }

    startAutoSlide()
    $content.hover(stopAutoSlide, startAutoSlide)

    $(".next").click(function() {
        $content.scrollLeft($content.scrollLeft() + 200)
    })

    $(".prev").click(function() {
        $content.scrollLeft($content.scrollLeft() - 200)
    })
})