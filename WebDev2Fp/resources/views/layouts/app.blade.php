<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
	<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/recoleta" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body{
            /*font-family: 'Gilroy','Helvetica','Arial','sans-serif';*/
            font-family: Satoshi;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color:#fdfdf7;
        }
        input, button, select, textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            margin: 0;
            font: inherit;
            font-weight: inherit;
            font-family: inherit;
            color: inherit;
        }
        /*HOME AND FOOD STYLES*/
        .homeheader {
        color:#e55;
        text-decoration:none;
        font-size:20px;
        position: relative;
        }
        .homeheader:hover{
            color:black;
        }
        .homeheader:hover:after {
        content: "";
        display: block;
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: black;
        transition: all 0.3s ease-in-out;
        }

        .foodheader {
        color:#e55;
        text-decoration:none;
        font-size:20px;
        margin-left:5px;
        position: relative;
        }
        .foodheader:hover{
            color:black;
        }
        .foodheader:hover:after {
        content: "";
        display: block;
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: black;
        transition: all 0.3s ease-in-out;
        }

        .cuisineheader {
        color:#e55;
        text-decoration:none;
        font-size:20px;
        margin-left:5px;
        position: relative;
        }
        .cuisineheader:hover{
            color:black;
        }
        .cuisineheader:hover:after {
        content: "";
        display: block;
        position: absolute;
        color:black;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background-color: black;
        transition: all 0.3s ease-in-out;
        }

        .titles {
        margin-left: 118%;
        gap: 28px;
        display: flex;
     
        }
        
        .supbot{
            border-radius:10px;
            width:380px;
            height:450px;
            display:none;
            justify-content:space-between;
            flex-direction: column;
            background:#f8f8ff;
            position:fixed;
            bottom:45px;
            right: 35px;
            border:2px solid lightgray;
  }
  #chat-history{
    padding:15px 10px;
    height:400px;
    width:380px;
    display:flex;
    flex-direction:column;
    gap:10px; 
    overflow: auto;
    
  }
  .titlesupc{
    border-radius:10px;
    background-color:#e55;
    color:white;
    padding-left:15px;
    display:flex;
    justify-content:space-between;
        flex-direction:row;
        align-items:center;
        cursor:pointer;
  }

  .user-message{
    align-self: flex-end;
    color:white;
    background-color:green;
    border-radius:17px;
    padding:10px;
    max-width:250px;
    min-width:75px;
    font-size:16px;
    height:fit-content;
  }
  
  .bot-message{
    align-self: flex-start;
    max-width:230px;
    color:white;
    background-color:#e55;
    border-radius:17px;
    float:left;
    font-size:16px;
    height:fit-content;
    padding:10px;
  }
  .bot-message a{
    color:white;
    text-decoration:none;
  }
  .bot-message a:hover{
    color:lightgray;
  }
  #input-form{
    margin-bottom:5px;
}
  #input-form button{
    padding:5px;
    outline:none;
    background:#e55;
    border:none;
    border-radius:8px;
    margin-left:5px;
    color:white;
    width:75px;
    height: 40px;
  }
  #input-form input{
    margin-left:10px;
    width: 250px;
    height: 40px;
    padding:9px; 
    font-family: "Gilroy", "Helvetica", "Arial", "sans-serif";
    font-weight: 500;
    font-size: 16px;
    line-height: 18px;
    border-style: hidden;

    border-radius: 8px;
    border: 1px solid rgb(184, 184, 184);
    cursor: text;
  }
  .supbtn{
    position: fixed;
    width:50px;
    height:50px;
    border-radius:50%;
    background-color:#e55;
    color:white;
    bottom:45px;
    right:35px;
    display:flex;
    justify-content:center;
    align-items:center;
    padding-left:10px;
    cursor:pointer;
  }
  #chat-history::-webkit-scrollbar {
  width: 0;
  height: 0;
}
    </style>
    @yield('css')

    <script type="text/javascript">


        //for first dishes row.
        document.addEventListener("DOMContentLoaded", function (event) {
            const btnleft = document.querySelectorAll(".left-button");
            if (btnleft) {
                btnleft.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow");
                        const scrollPosition = container[index].scrollLeft - 200;
                        console.log(scrollPosition);
                        container[index].scroll({ left: scrollPosition , behavior: "smooth" });
                        //container[index].scrollLeft = scrollPosition;
                    });
                });
            }
            const btnRigth = document.querySelectorAll(".right-button");
            if (btnRigth) {
                btnRigth.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow");
                        console.log(index, container, container[index]);
                        const scrollPosition = container[index].scrollLeft + 200;

                        container[index].scroll({ left: scrollPosition, behavior: "smooth" });

                    });
                });
            }
        });

        function scrollRight() {
            var container = document.getElementsByClassName(".dishesrow");
            container[0].scroll({ left: 200, behavior: "smooth" });
        }
    //for second dishes row
        document.addEventListener("DOMContentLoaded", function (event) {
            const btnleft = document.querySelectorAll(".left-button2");
            if (btnleft) {
                btnleft.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow2");
                        const scrollPosition = container[index].scrollLeft - 200;
                        console.log(scrollPosition);
                        container[index].scroll({ left: scrollPosition , behavior: "smooth" });
                        //container[index].scrollLeft = scrollPosition;
                    });
                });
            }
            const btnRigth = document.querySelectorAll(".right-button2");
            if (btnRigth) {
                btnRigth.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow2");
                        console.log(index, container, container[index]);
                        const scrollPosition = container[index].scrollLeft + 200;

                        container[index].scroll({ left: scrollPosition, behavior: "smooth" });

                    });
                });
            }
        });

        function scrollRight() {
            var container = document.getElementsByClassName(".dishesrow2");
            container[0].scroll({ left: 200, behavior: "smooth" });
        }

        //for third dishesrow
        document.addEventListener("DOMContentLoaded", function (event) {
            const btnleft = document.querySelectorAll(".left-button3");
            if (btnleft) {
                btnleft.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow3");
                        const scrollPosition = container[index].scrollLeft - 200;
                        console.log(scrollPosition);
                        container[index].scroll({ left: scrollPosition , behavior: "smooth" });
                        //container[index].scrollLeft = scrollPosition;
                    });
                });
            }
            const btnRigth = document.querySelectorAll(".right-button3");
            if (btnRigth) {
                btnRigth.forEach((ele, index) => {
                    ele.addEventListener('click', () => {
                        var container = document.querySelectorAll(".dishesrow3");
                        console.log(index, container, container[index]);
                        const scrollPosition = container[index].scrollLeft + 200;

                        container[index].scroll({ left: scrollPosition, behavior: "smooth" });

                    });
                });
            }
        });

        function scrollRight() {
            var container = document.getElementsByClassName(".dishesrow3");
            container[0].scroll({ left: 200, behavior: "smooth" });
        }
    </script>
</head>
<body>
<input type="hidden" id="auth-user" value="{{ auth()->id() }}" />

    <div id="app">
       
    @include('layouts.navigation')
        <main class="py" style="min-height: 79vh;">
            @yield('content')
        </main>
        <div class="supbot">
            <div class="titlesupc">
            <h1>Support</h1>
            <div class="close">
            <i class="material-icons">&#xe5c9;</i>
             </div>
            </div>
            <div id="chat-history">
            
            </div>
            <form id="input-form">
                <input id="userinput" type="text" placeholder="Type your message here...">
                <button type="submit" >send</button>
            </form>
            </div>
        <div class="supbtn">
        <i class="material-icons">&#xe0b7;</i>
        </div>
        <footer>
            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <p class="col-md-4 mb-0 text-body-secondary">© Foodies 2023 Company, Inc</p>
                    <img src="https://img.icons8.com/ios/50/null/kawaii-sushi.png" style="height:50px; width:50px;"/>
                    <ul class="nav col-md-4 justify-content-end">
                        <li class="nav-item"><a href="{{Route('home')}}" class="nav-link px-2 text-body-secondary" style="color:black;">Home</a></li>
                        <li class="nav-item"><a href="{{Route('searchFood')}}" class="nav-link px-2 text-body-secondary" style="color:black;">Food</a></li>
                        <li class="nav-item"><a href="{{Route('Allcusisnes')}}" class="nav-link px-2 text-body-secondary" style="color:black;">Cuisines</a></li>
                        <li class="nav-item"><a href="{{Route('RstoreInput')}}" class="nav-link px-2 text-body-secondary" style="color:black;">Add Store</a></li>
                        <li class="nav-item"><a href="{{Route('aboutUs')}}" class="nav-link px-2 text-body-secondary" style="color:black;">About Us</a></li>

                    </ul>
                </footer>
            </div>
        </footer>
    </div>
</body>
@yield('js')
<script>




$(document).ready(function() {
    displayBotMessage('Hello! How can I help you today?');
    $('.supbtn').click(function() {
  const sup = document.querySelector('.supbot');
  const btn = document.querySelector('.supbtn');
  console.log('clicked')
  sup.style.display = 'flex';
  btn.style.display = 'none';

});
$('.close').click(function() {
  const sup = document.querySelector('.supbot');
  const btn = document.querySelector('.supbtn');
  console.log('clicked')
  sup.style.display = 'none';
  btn.style.display = 'flex';
});
      
function handleUserMessage(userMessage) {
             function containsNumber(input) {
                return /\d/.test(input);
             }
           
            if (userMessage.includes('orderID')) {
    const orderId = userMessage.split(':')[1].trim();
    const authUserId = $('#auth-user').val();
    console.log(authUserId);
        if(!authUserId){
            displayBotMessage('Please log in to access you\'re orders');
        }else{
    const url = '/orders/' + authUserId +'/'+orderId;
    $.ajax({
        type: 'post',
        url: url,
        headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
        success: function(result) {
            const orderStatus = result.status;

            let message = '';
            switch (orderStatus) {
                case 'pending':
                    message = 'Your order is still pending approval. Please wait for further updates.';
                    break;
                case 'delivered':
                    message = 'Your order has been delivered. Enjoy your food!';
                    break;
                case 'delivering':
                    message = 'Your order is currently being delivered. Please wait for your food to arrive.';
                    break;
                case 'approved':
                    message = 'Your order is approved and is begin prepared.';
                    break;
                case 'canceled':
                    message = 'Your order has been canceled. We apologize for any inconvenience.';
                    break;
                case 'rejected':
                    message = 'Your order has been rejected. Please contact customer support for more information.';
                    break;
                default:
                    message = 'I\'m sorry, I could not retrieve the status of your order. Please try again later.';
            }
 
            displayBotMessage(message);
        },
        error: function(error) {
            displayBotMessage('I\'m sorry, an error occurred while retrieving the status of your order. Please try again later.');
        }
    });
}
}
            else if(userMessage.includes('help')|| userMessage.includes('commands')){
                let message = '1-orderID: - your order\'s id<br>2-offers - to display the offers<br>3-cuisine [name] - to display cuisine<br>4-Greater than [num] - to display stores with greater than [num]$ items<br>5-Lesser than [num] - to display stores with less than [num]$ items';
              displayBotMessage(message);
            }
            else if(userMessage === 'hi'  || userMessage === 'hello' || userMessage ===' Hello' || userMessage ===' Hey' || userMessage ===' howdie' ){
                displayBotMessage('Hello! How can I help you today?');
            }
            else if(userMessage === 'hru'  || userMessage === 'how are you ?' || userMessage ===' how\'re you?' || userMessage ==='How are you ?' ||userMessage.includes('how are you') || userMessage.includes('How are you')){
                displayBotMessage('I am Good! thank you ! how may i assist you ?');
            }
            else if(userMessage.includes('offers') || userMessage.includes('discounts')){

               
                $.ajax({
            type: 'get',
            url: '/chatoffers',
        
            success: function(result) {
                console.log(result.offers);
                         const offers = result.offers;
                        let offerList = '';
                        for(let i=0; i<offers.length; i++){
                            let offer = offers[i];
                            offerList += `<a href="/food/${offer.id}">${offer.name} ${offer.store} new:${offer.price} old:${offer.oldprice}</a> <br>`;
                            console.log(i);
                        }
                        if(offerList === ''){
                        displayBotMessage('There are no offers at the moment. Check again later.');
                        } else {
                        displayBotMessage(offerList);
                        }
                    
      },
      error: function(error) {
        console.log(error);
      }
    });
        }
        else if(userMessage.includes('cuisine')|| userMessage.includes('Cuisine')){
    $.ajax({
        type: 'get',
        url:'/chatoffers',
        success: function(result){
            
            for(let c in result.cuisines){
                
                if(userMessage.includes(result.cuisines[c].name) || userMessage.includes(result.cuisines[c].name.toLowerCase())){
                    let cuisine = '';
                    cuisine +=`<p>You can look more at this cuisine</p><a href="/cuisine/${result.cuisines[c].id}">${result.cuisines[c].name}</a>`;
                    displayBotMessage(cuisine);
                }
                else{
                    displayBotMessage('Sorry but such cuisine does not exist')
                }
            }
        }
    });
}
      else if(containsNumber(userMessage) && userMessage.includes('greater') || userMessage.includes('Greater')){
         const price = parseInt(userMessage.match(/\d+/)[0], 10);
         $.ajax({
            type:'get',
            url:'/chatoffers',
            success: function(result) {
    console.log(result.menuAverage);
    console.log(price);
    let store = `<p>Here's 3 recommended restaurants based on your choice:</p>`; // Initialize store outside the loop
    let i = 0;

    for (let av in result.menuAverage) {
        console.log(result.menuAverage[av].average);
        if (price < result.menuAverage[av].average) {
            i++;
            if (i < 4) {
                store += `<a href="/store/${result.menuAverage[av].store.id}">${i} ${result.menuAverage[av].store.storeName}</a><br>`;
            }
        }
    }

    displayBotMessage(store); // Display the store chat message
}

         });
      }
      else if(containsNumber(userMessage) && userMessage.includes('lesser') || userMessage.includes('Lesser') || userMessage.includes('Lower') || userMessage.includes('lower') || userMessage.includes('under')){
         const price = parseInt(userMessage.match(/\d+/)[0], 10);
         $.ajax({
            type:'get',
            url:'/chatoffers',
            success: function(result) {
    console.log(result.menuAverage);
    console.log(price);
    let store = `<p>Here's 3 recommended restaurants based on your choice:</p>`; // Initialize store outside the loop
    let i = 0;

    for (let av in result.menuAverage) {
        console.log(result.menuAverage[av].average);
        if (price > result.menuAverage[av].average) {
            i++;
            if (i < 4) {
                store += `<a href="/store/${result.menuAverage[av].store.id}">${i} ${result.menuAverage[av].store.storeName}</a><br>`;
            }
        }
    }

    displayBotMessage(store); // Display the store chat message
}

         });
      }
            else {
                
                displayBotMessage('I\'m sorry, I could not understand your request. If you want help type \"help\" or \"commands\"\.');
            }
        }

     
function displayUserMessage(message) {
  const chatHistory = document.getElementById('chat-history');
  const userMessage = document.createElement('div');
  userMessage.classList.add('user-message');
  userMessage.innerHTML = message;
  chatHistory.appendChild(userMessage);
}

$('#input-form').submit(function(event) {
event.preventDefault(); 
const userInput = document.getElementById('userinput');
const userMessage = userInput.value;
userInput.value = '';
displayUserMessage(userMessage);
handleUserMessage(userMessage);
const chatHistory = document.getElementById('chat-history');
chatHistory.scrollTop = chatHistory.scrollHeight;

});
  });
  function displayBotMessage(message) {
          const chatHistory = document.getElementById('chat-history');
          const botMessage = document.createElement('div');
          botMessage.classList.add('bot-message');
          botMessage.innerHTML = message;
          chatHistory.appendChild(botMessage);
         
        chatHistory.scrollTop = chatHistory.scrollHeight;
      }
 
    </script>
</html>
