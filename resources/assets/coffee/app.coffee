Chart.defaults.global.responsive = true;
Chart.defaults.global.showScale = false;

data = {
  showScale: false,
  labels: ["June 9", "June 10", "June 11", "Yesterday", "Today"],
  datasets: [
    {
      label: "Number of shipments",
      fillColor: "rgba(42, 205, 252,0)",
      strokeColor: "rgba(42, 205, 252,1)",
      pointColor: "rgba(42, 205, 252,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(42, 205, 252,1)",
      data: [45, 48, 52, 54, 58]
    }
  ]
};

# Statistics
ctx   = $('#chart').get(0).getContext '2d'
chart = new Chart(ctx).Line data

# Events
pusher  = new Pusher 'c0c48e95487a739c50df'
channel = pusher.subscribe 'notifications'

channel.bind 'App\\Events\\SampleNotification', (data) ->
  console.log data

  window.demo.items.pop()