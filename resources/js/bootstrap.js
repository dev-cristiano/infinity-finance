import axios from "axios";
import setupCurrencyFormatter from "./formatters/decimal";
import setupDateFormatter from "./formatters/data";
import { confirmDelete } from './utils/deleteConfirm';

window.confirmDelete = confirmDelete;
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Initialize when the DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
    setupCurrencyFormatter();
    setupDateFormatter();
});
