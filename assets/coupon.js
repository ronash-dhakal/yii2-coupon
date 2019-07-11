$('#coupon-has_condition').on('click', function () {
    var ele = $(this);
    var conditionDiv = $('#conditions');
    if (ele.is(':checked')) {
        conditionDiv.show()
    } else {
        conditionDiv.hide()
    }
});
$('#coupon-use_type').on('change', function () {
    var ele = $(this);
    var useDiv = $('.field-coupon-total_use');
    if (this.value === '1') {
        useDiv.show();
    } else {
        useDiv.hide()
    }
});
$('input[type=radio]').on('click', function () {
    var ele = $(this);
    var priceDiv = $('.field-coupon-min_price,  .field-coupon-max_price');
    var productDiv = $('.field-coupon-products,#search-data');
    var value = ele.filter(":checked").val();
    switch (value) {
        case "price":
            priceDiv.show();
            productDiv.hide();
            break;

        case "product":
            priceDiv.hide();
            productDiv.show();
            break;

        default:
            priceDiv.hide();
            productDiv.hide();
            break;
    }
});
$('#product-search').on('keypress',function() {
    var value = $(this).val();
    var searchDiv = $('#search-data');
    if(value.length>= 3){
        ajax_search(searchDiv,value);
    }else{
        searchDiv.empty();
    }

});



function ajax_search(searchDiv,value){

    $.post('/coupon/default/products',{name:value},function(res){
        if(res !== null){
            data = $.parseJSON(res);
            searchDiv.empty();
          $.each(data,function(i,k){
              searchDiv.append('<div class="media">\n' +
                  '  <div class="media-left">\n' +
                  '    <img src="'+k.cover_image+'" class="media-object" style="width:60px">\n' +
                  '  </div>\n' +
                  '  <div class="media-body">\n' +
                  '    <h4 class="media-heading">ID: <code>'+k.id+'</code></h4>\n' +
                  '    <p>'+k.slug+'</p> \n' +
                  '  </div>\n' +
                  '</div>');
            });
          searchDiv.append('<hr><strong>To add above product(s), copy its ID and paste it on products below. For multiple products, add (,) after id.</strong>');
          searchDiv.append('<hr><strong>If you want to mention all products then keep it blank.</strong>');
            searchDiv.show();
        }
    })
//var n = new  Noty({type:'success',text:value}).show();
}

$('.product-checkbox').on('click',function(){
    alert(1);
    var ele = $(this);
    var value = ele.filter(":checked").val();
    var input = $('#coupon-products');

    let val = input;

    val +=", "+value;

    input.val(val);


});

$(document).ready(function(){
    $('input[type=radio]').filter(":checked").trigger("click");
    $('#coupon-use_type').trigger("change").trigger("click");
});
