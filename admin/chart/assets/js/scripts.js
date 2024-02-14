// Load the Google Charts library
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Callback function to draw the column chart
function drawChart() {
    var data = google.visualization.arrayToDataTable(chartData);

    var options = {
        title: 'BCA Quiz Admin Dashboard',
        vAxis: {title: 'Value'},
        hAxis: {title: 'Total Numbers'},
        bars: 'horizontal', // Display vertical bars for a column chart
        colors: ['#FF5733', '#FFC300', '#33FF8D'] // Array of colors for each category
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
    chart.draw(data, options);
}
