<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <title>Document</title>
        <meta name = "csrf-token" content = "{{csrf_token()}}">
        <link rel= "stylesheet" href = "{{asset('css/app.css')}}">
        <style>
            .list-group{
                overflow-y:scroll;
                height:200px;
            }
            .typing{
                
                font-size:13px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" id = "app">
                <div class = "offset-4 col-4">
                    <li class="list-group-item active">Chat Room</li>
                    <ul class = "list-group" v-chat-scroll>
                        <message v-for = "(value, index) in chat.message" :key="index" :color = value.color :user = value.user.name>
                        @{{value.message}}
                        </message>
                       
                    </ul>
                    <p v-if = "typing" class = "typing text-muted">@{{userTyping}} is typing@{{dot}}</p>
                    <input type = "text" class="form-control" v-model= "message" placeholder = "Type your message here..."
                        @keyup.enter = 'send'>
                </div>
            </div>
        </div>
        <script src= "{{asset('js/app.js')}}"></script>
    </body>
</html>