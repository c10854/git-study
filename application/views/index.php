<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>伏特加的CodeIgniter</title>
</head>
<body>
<div id="app-7">
    <ol>
        <!-- Now we provide each todo-item with the todo object    -->
        <!-- it's representing, so that its content can be dynamic -->
        <todo-item v-for="itemm in groceryList" v-bind:todo="itemm"></todo-item>
    </ol>
</div>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script>
    Vue.component('todo-item', {
        props: ['todo'],
        template: '<li>{{ todo.text }}</li>'
    })
    var app7 = new Vue({
        el: '#app-7',
        data: {
            groceryList: [
                { text: 'Vegetables' },
                { text: 'Cheese' },
                { text: 'Whatever else humans are supposed to eat' }
            ]
        }
    })
</script>
</body>
</html>