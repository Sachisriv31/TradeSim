<!DOCTYPE html>
<html>
<head>
    <title>TradeSim</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topbar">
    <div class="logo">📈 TradeSim</div>
    <div>Market: <span class="open">OPEN</span> | Demo User</div>
</div>

<div class="tabs">
    <button class="active" onclick="switchTab('stocksTab',this)">Stocks</button>
    <button onclick="switchTab('ordersTab',this)">Orders</button>
    <button onclick="switchTab('tradesTab',this)">Trades</button>
    <button onclick="switchTab('portfolioTab',this)">Portfolio</button>
</div>

<div class="main">

<!-- STOCKS -->
<div id="stocksTab" class="tab-content active">
    <div class="panel">
        <h3>Instruments</h3>
        <input placeholder="Search stocks..." onkeyup="filterStocks(this.value)">
        <div id="stocks"></div>
    </div>
</div>

<!-- ORDERS -->
<div id="ordersTab" class="tab-content">
    <div class="panel"><h3>Orders</h3><div id="orders"></div></div>
</div>

<!-- TRADES -->
<div id="tradesTab" class="tab-content">
    <div class="panel"><h3>Trades</h3><div id="trades"></div></div>
</div>

<!-- PORTFOLIO -->
<div id="portfolioTab" class="tab-content">
    <div class="panel"><h3>Portfolio</h3><div id="portfolio"></div></div>
</div>

<!-- PLACE ORDER -->
<div class="panel">
    <h3>Place Order</h3>

    <div class="toggle">
        <button id="buyBtn" class="active" onclick="setSide('BUY')">BUY</button>
        <button id="sellBtn" onclick="setSide('SELL')">SELL</button>
    </div>

    <div class="toggle">
        <button id="marketBtn" class="active" onclick="setOrderType('MARKET')">Market</button>
        <button id="limitBtn" onclick="setOrderType('LIMIT')">Limit</button>
    </div>

    <label>Stock</label>
    <input id="selectedStock" disabled>

    <label>Price</label>
    <input id="price" disabled>

    <label>Quantity</label>
    <input id="qty" type="number" value="1">

    <label>Estimated Value</label>
    <input id="value" disabled>

    <button class="submit" onclick="placeOrder()">BUY</button>
</div>

</div>

<script src="script.js"></script>
</body>
</html>
