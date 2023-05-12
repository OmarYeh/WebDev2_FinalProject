<section>
<div class="allfoods">
<p>{{ $store->storeName }}</p>
<p>{{$store->getMenu}}</p>
<div class="AddFood">
    <form method="post" action="">
        <lable for="">Name</lable>
        <input type="text" name="name" placeholder="Ex:Pizza">
        <lable></lable>
        <input type="text" name="price">
        <lable></lable>
        <input type="text">
        <lable></lable>
        <input type="text">
        <select>
            <option value=""></option>
        </select>
        <select>
            <option value=""></option>
        </select>
        <select>
            <option value=""></option>
        </select>
    </form>
</div>
@foreach($store->getMenu->getFood as $obj)
    <p>{{$obj}}</p>
@endforeach
</div>
</section>