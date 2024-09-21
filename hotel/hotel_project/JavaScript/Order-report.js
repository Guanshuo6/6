/*
 * Project        : Hotel webpage
 * Page Name      : Guest Stays Report
 * Student ID 1   : C00280203 (Zihan Wang)
 * Student ID 2   : C00282942 (Edward Zheng)
 * Student ID 3   : C00288344 (Filip Melka)
 * Student ID 4   : C00278723 (Guanshuo Feng)
 * Date    		  : 26/02/2024
 */


// 将 PHP 中的数据转换为 JavaScript 对象数组并调整属性名称
data = JSON.parse(data).map(row => {
    return {
        orderId: row.orderId,
        Date: new Date(row.orderDate).getTime(),
        supplierName: row.surName + ", " + row.firstName, // 修正属性名称
        totalCost: row.cost
    }
});

const table = document.getElementById('table-content');
const printInfo = document.getElementById('print-info');
const columns = ['orderId', 'Date', 'supplierName', 'totalCost']; // 确保列名与对象中的键匹配
const btns = [
    document.getElementById('sort-date-btn'),
    document.getElementById('sort-supplier-btn'),
    document.getElementById('sort-cost-btn'),
];

function displayData(btn) {
    printInfo.innerHTML = 'Sorted by ' + btn.innerText;
    table.innerHTML = '';
    btns.forEach(btn => btn.disabled = false);
    btn.disabled = true;

    // 根据点击的按钮排序
    data.sort((a, b) => {
        switch (btn.innerText) {
            case 'Date':
                return b.Date - a.Date; // 按日期排序
            case 'Supplier':
                return a.supplierName.localeCompare(b.supplierName); // 按供应商名称排序
            case 'Cost':
                return b.totalCost - a.totalCost; // 按总成本排序
            default:
                return 0;
        }
    });
	
    // 将数据格式化为日期和添加货币符号
    const formattedData = data.map(item => {
        return {
            orderId: item.orderId,
            Date: new Date(item.Date).toLocaleDateString(),
            supplierName: item.supplierName,
            totalCost: '€ ' + item.totalCost
        }
    });

    // 在表格中显示数据
    formattedData.forEach(item => {
        const row = document.createElement('div');
        row.className = 'row';

        columns.forEach(col => {
            const column = document.createElement('span');
            column.innerHTML = item[col];
            column.style.marginTop = '10px';
            row.appendChild(column);
        });

        table.appendChild(row);
    });
}

// 为排序按钮添加事件监听器
//btns.forEach(btn => btn.addEventListener('click', () => displayData(btn)));

displayData(btns[0])