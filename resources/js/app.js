import "./bootstrap";
import ApexCharts from "apexcharts";
import { initCharts } from "./components/charts";
import "./sweetalert";
import "./utils/preventDefault";

document.addEventListener("DOMContentLoaded", function () {
    initCharts();
    preventDefault();
});

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
