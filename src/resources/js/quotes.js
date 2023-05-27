import $ from 'jquery';
window.jQuery = $;

$(document).ready(function() {
    const quotesData = JSON.parse($('#quotes-data').attr('data-quotes'));

    const dates = quotesData.map(quote => quote.date);
    const openPrices = quotesData.map(quote => quote.open);
    const closePrices = quotesData.map(quote => quote.close);

    const canvas = $('#chart').get(0);
    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [
                {
                    label: 'Open Price',
                    data: openPrices,
                    borderColor: 'blue',
                    fill: false
                },
                {
                    label: 'Close Price',
                    data: closePrices,
                    borderColor: 'green',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
