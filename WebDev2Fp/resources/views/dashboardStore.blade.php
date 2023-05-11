<!Doctype html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<title>Store Dashboard</title>
<html>
    <head>
    </head>

    <body>
        <div class="left-nav">
            <div class="sd"><p>Analytic</p></div>
            <div class="sd"><p>Menu</p></div>
            <div class="sd"><p>offers</p></div>
            <div class="sd"><p>Plat de jour</p></div>
            <div class="sd"><p>Orders</p></div>
            <div class="sd"><p>Delvery</p></div>
        </div>
        <div class="rigth-Conatiner">
            
        </div>    
</body>
<script>
    
    $(function () {
    
    $('.sd').on('click', function () {
        var text = $(this).text();
        const url = '/Store/Dashboard/' + text.toString();
        $.ajax({
            url: url,
            type: 'get',
            success: function (result) {
                $('.rigth-Conatiner').html(result);
            }
        });
    });
});

</script>
</html>