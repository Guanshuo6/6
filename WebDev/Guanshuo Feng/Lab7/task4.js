function countDays() {  
    // 获取当前日期  
    var today = new Date();  
    // 设置圣诞节日期，2023年12月25日  
    var christmas = new Date(2023, 11, 25);  
    // 计算距离圣诞节的天数  
    var days = (christmas - today) / (1000 * 60 * 60 * 24);  
    // 将结果显示在页面上  
    document.getElementById("days").innerHTML = "Days till Christmas: " + Math.ceil(days);  
}