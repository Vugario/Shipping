# Vue App
window.demo = new Vue(
  el: '#app'
  data:
    title: 'Lorum ipsum'
    items: items
)

# Events
pusher  = new Pusher 'c0c48e95487a739c50df'
channel = pusher.subscribe 'notifications'

channel.bind 'App\\Events\\SampleNotification', (data) ->
  console.log data

  window.demo.items.pop()