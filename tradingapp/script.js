let instruments = [];
let selected = null;
let side = "BUY";
let orderType = "MARKET";

window.onload = () => {
    fetch("api/instruments.php")
        .then(r => r.json())
        .then(d => { instruments = d; renderStocks(d); });
};

function renderStocks(list) {
    stocks.innerHTML = "";
    list.forEach(s => {
        let div = document.createElement("div");
        div.className = "stock";
        div.innerHTML = `<b>${s.symbol}</b> (${s.exchange})<br>₹${s.price}`;
        div.onclick = () => selectStock(s, div);
        stocks.appendChild(div);
    });
}

function selectStock(stock, el) {
    document.querySelectorAll(".stock").forEach(x => x.classList.remove("active"));
    el.classList.add("active");
    selected = stock;
    selectedStock.value = stock.symbol;
    price.value = stock.price;
    updateValue();
    updateSubmit();
}

function updateValue() {
    if (!selected) return;
    value.value = "₹" + (qty.value * price.value).toFixed(2);
}

qty.oninput = () => { updateValue(); updateSubmit(); };

function setSide(s) {
    side = s;
    buyBtn.classList.toggle("active", s === "BUY");
    sellBtn.classList.toggle("active", s === "SELL");
    updateSubmit();
}

function setOrderType(t) {
    orderType = t;
    marketBtn.classList.toggle("active", t === "MARKET");
    limitBtn.classList.toggle("active", t === "LIMIT");
}

function updateSubmit() {
    if (!selected) return;
    document.querySelector(".submit").innerText =
        `${side} ${qty.value} ${selected.symbol}`;
}

function placeOrder() {
    if (!selected || qty.value <= 0) return alert("Invalid order");

    let fd = new FormData();
    fd.append("symbol", selected.symbol);
    fd.append("side", side);
    fd.append("type", orderType);
    fd.append("quantity", qty.value);

    fetch("api/place_order.php", { method: "POST", body: fd })
        .then(r => r.text())
        .then(msg => {
            alert(msg);
            loadOrders(); loadTrades(); loadPortfolio();
        });
}

function switchTab(tab, btn) {
    document.querySelectorAll(".tab-content").forEach(t => t.classList.remove("active"));
    document.querySelectorAll(".tabs button").forEach(b => b.classList.remove("active"));
    document.getElementById(tab).classList.add("active");
    btn.classList.add("active");
    if (tab === "ordersTab") loadOrders();
    if (tab === "tradesTab") loadTrades();
    if (tab === "portfolioTab") loadPortfolio();
}

function filterStocks(q) {
    renderStocks(instruments.filter(i => i.symbol.includes(q.toUpperCase())));
}

function loadOrders() { fetch("api/orders.php").then(r=>r.text()).then(d=>orders.innerHTML=d); }
function loadTrades() { fetch("api/trades.php").then(r=>r.text()).then(d=>trades.innerHTML=d); }
function loadPortfolio(){ fetch("api/portfolio.php").then(r=>r.text()).then(d=>portfolio.innerHTML=d); }