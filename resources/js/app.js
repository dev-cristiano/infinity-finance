import "./bootstrap";
import ApexCharts from "apexcharts";
import { initCharts } from "./components/charts";
import "./sweetalert";

document.addEventListener("DOMContentLoaded", function () {
    initCharts();
});

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
