<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <base href="{{asset('')}}">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout</title>
    <!-- Custom styles for this template -->
    <link href="{{('css/checkout.css')}}" rel="stylesheet">
    <link href="{{('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{('js/jquery.min.js')}}"></script>

    {{-- <script type="text/javascript" src="{{('js/checkout.js')}}"></script> --}}
</head>
<body>
<!-- Form Wrapper -->
<form action="{{ route('checkout')}}" method="post" id="form-wrapper">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div id="form-left-wrapper">
        <a href="{{ route('cart')}}"class="btn btn-outline-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
            </svg>
            Back
        </a>
        <div id="form-tab-menu">
            <div class="tab-menu-item current shipping-tab">Shipping</div>
        </div>
        <!-- Body of the Form -->
        <div id="form-body">
            <div id="shipping-body">
                <div id="contact-details">
                    <div class='form-input input-small'>
                        <label>Full Name:</label><br/>
                        <input type="text" name="full_name" placeholder='First Name' id='firstname-input' class='name-input' value="{{($address[0]->full_name)}}"/>
                    </div>
                    {{-- <div class='form-input input-small'>
                        <label>Last name</label><br/>
                        <input type="text" name='lastname' placeholder='Last Name' id='lastname-input' class='name-input'/>
                    </div> --}}
                    {{-- <div class='form-input input-small'>
                        <label>E-mail</label><br/>
                        <input type='email' name='email' placeholder='E-Mail Address' id='email-input' class='email-input'/>
                    </div> --}}
                </div>
                <div class='hr'></div>
                <div id="Address-details">
                    <div class='form-input input-small'>
                        <label>Phone</label><br/>
                        <input type='number' name="phone" placeholder='Contact Number' id='contact-input' class='number-input' value="{{($address[0]->phone)}}"/>
                    </div>
                    <div class='form-input input-medium'>
                        <label>Street Address</label><br/>
                        <input type="text" name="address" placeholder='Street Address' id='address-input' class='address-input' value="{{($address[0]->address_name)}}"/>
                    </div>
                    <!-- Line Break -->
                    <div class='form-input input-small'>
                        <label>Country</label><br/>
                        <input type="text" name="country" placeholder='Country' id='country-input' class='country-input'/>
                    </div>
                    <div class='form-input input-small'>
                        <label>City</label><br/>
                        <select class="city-input" name="city" onchange="citySet(this.value)">
                            <option selected>Chọn thành phố</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="Khác">Khác</option>
                        </select>
                        {{-- <input type="text" name='city' placeholder='City' id='city-input' class='city-input' onchange="citySet()"/> --}}
                    </div>
                    <div class='form-input input-small'>
                        <label>Note</label><br/>
                        <input type="text" name="note" placeholder='Note' id='postcode-input' class='postcode-input'/>
                    </div>
                    <div class='hr' style='margin-bottom: 5px;'></div>
                    <div class='form-input-checkbox'>
                        {{-- <input type="checkbox" id="shipping-checkbox"/> My shipping and billing information is the same. --}}
                    </div>
                </div>
                <div id="form-submit">
                    <input type='submit' value='Đặt hàng'/>
                </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Menu -->
    <div id="form-cart-menu">
        <input type="hidden" name="price" id="ship-input"value="0" />
        <input type="hidden" name="ship" id="price-input" value="{{($price_all)}}" />
        <input type="hidden" name="total" id="total-input" value="{{($price_all)}}" />

        <div class="shopping-cart-head">
            <h1>Shopping Cart</h1>
        </div>
        <table id="shopping-cart-menu">
            <tr class='shopping-cart-item'>
                <td class='cart-title'>Tạm tính</td>
                <td class='cart-price' id="price-class">
                    {{(number_format($price_all, 0, ',', '.'))}}
                </td>
            </tr>
            {{-- <tr class='shopping-cart-item'>
                <td class='cart-title'>Hộ trợ</td>
                <td class='cart-price'>0</td>
            </tr> --}}
            <tr class='shopping-cart-item'>
                <td class='cart-title'>Phí ship</td>
                <td class='cart-price' id="ship-class">
                    0
                </td>
            </tr>
            <tr class='shopping-cart-total'>
                <td class='cart-total'>Total</td>
                <td class='cart-price-total' id="total-class">
                    {{(number_format($price_all, 0, ',', '.'))}}
                </td>
            </tr>
        </table>
    </div>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="{{('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    let ADDRESS_HN = ['Hoàn Kiếm', 'Đống Đa', 'Ba Đình', 'Hai Bà Trưng',
    'Hoàng Mai', 'Thanh Xuân', 'Long Biên', 'Nam Từ Liêm',
    'Bắc Từ Liêm', 'Tây Hồ', 'Cầu Giấy', 'Hà Đông'];

    let ADDRESS_HCM = ['Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5',
                        'Quận 7', 'Quận 8', 'Quận 9', 'Quận 10', 'Quận 11', 'Quận 12'];

    citySet = (value)=>{
        let address = document.getElementById('address-input').value.trim();
        let city = value;
        let array = address.split(/[\-,\,]+/);

        let ship = 0;
        let total = parseInt(document.getElementById('price-input').value);

        if (city === 'Hà Nội') {
            if (checkcity(array, ADDRESS_HN)){
                ship = 10000;
            } else {
                ship = 25000;
            }
        } else if (city === 'Hồ Chí Minh') {
            if (checkcity(array, ADDRESS_HCM)){
                ship = 20000;
            } else {
                ship = 25000;
            }
        } else if(city === 'Khác'){
                ship = 30000;
        }
        if (ship !== 0) {
            total = (total + ship);
            ship = ship.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

            document.getElementById('ship-class').innerHTML = ship;
            document.getElementById('total-class').innerHTML = total.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
            document.getElementById('total-input').value = total;
        }

    }

    checkcity = (array, address) => {
        for (let i = 0; i < array.length; i++) {
            const test = address.find(e => e.indexOf(array[i]) > -1);
            if (test !== undefined) {
                return true;
            }
        }
    }
</script>

</body>
</html>
