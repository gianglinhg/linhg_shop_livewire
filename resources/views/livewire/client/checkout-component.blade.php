<div>
  @push('styles')
  <style>
    .cartItem-flex {
      display: flex;
      align-items: center;
      gap: 17px;
    }
  </style>
  @endpush
  <!-- Page Title -->
  <section class="page-title text-center">
    <div class="container">
      <h1 class=" heading page-title__title">Thanh toán</h1>
    </div>
  </section> <!-- end page title -->


  <!-- Checkout -->
  <section class="section-wrap checkout">
    <div class="container relative">
      <div class="row">

        <div class="ecommerce col">
          @guest
          <div class="row mb-30">
            <div class="col-md-8">
              <p class="ecommerce-info">
                Đã có tài khoản
                <a href="{{route('login')}}" class="showlogin">Click để đăng nhập</a>
              </p>
            </div>
          </div>
          @endguest

          <form wire:submit.prevent='storeOrder' name="checkout" class="checkout ecommerce-checkout row">
            @csrf
            <div class="col-lg-7" id="customer_details">
              <div>
                <h2 class="uppercase mb-30">Chi tiết thanh toán</h2>

                <div class="row">
                  <div class="col-md-6">
                    <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field form-group"
                      id="billing_first_name_field">
                      <label for="billing_first_name">Tên
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="form-control" value name="billing_first_name" id="billing_first_name"
                        wire:model='first_name'>
                      @error('first_name')
                      <small style="color:red">{{$message}}</small>
                      @enderror
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field form-group"
                      id="billing_last_name_field">
                      <label for="billing_last_name">Họ và chữ lót
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text form-control" value name="billing_last_name"
                        id="billing_last_name" wire:model='last_name'>
                      @error('last_name')
                      <small style="color:red">{{$message}}</small>
                      @enderror
                    </p>
                  </div>
                </div> <!-- end name / last name -->

                <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field form-group"
                  id="billing_address_1_field">
                  <label for="billing_address_1">Địa chỉ
                    <abbr class="required" title="required">*</abbr>
                  </label>
                  <input type="text" class="input-text form-control" placeholder="Ví dụ: số 1, đường 2, kp 3" value
                    name="billing_address_1" id="billing_address_1" wire:model='address'>
                  @error('address')
                  <small style="color:red">{{$message}}</small>
                  @enderror
                </p>

                <p class="form-row form-row-wide address-field validate-required form-group" id="billing_city_field"
                  data-o_class="form-row form-row-wide address-field validate-required">
                  <label for="billing_city">Quận / Thị xã
                    <abbr class="required" title="required">*</abbr>
                  </label>
                  <input type="text" class="input-text form-control" value name="billing_city" id="billing_city"
                    wire:model='town'>
                  @error('town')
                  <small style="color:red">{{$message}}</small>
                  @enderror
                </p>

                <p class="form-row form-row-first address-field validate-state form-group" id="billing_state_field"
                  data-o_class="form-row form-row-first address-field validate-state">
                  <label for="billing_state">Tỉnh / Thành phố
                    <abbr class="required" title="required">*</abbr>
                  </label>
                  <input type="text" class="input-text form-control" placeholder value name="billing_state"
                    id="billing_state" wire:model='city'>
                  @error('city')
                  <small style="color:red">{{$message}}</small>
                  @enderror
                </p>

                <div class="row">
                  <div class="col-md-6">
                    <p class="form-row form-row-last validate-required validate-phone form-group"
                      id="billing_phone_field">
                      <label for="billing_phone">Số điện thoại
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text form-control" value name="billing_phone" id="billing_phone"
                        wire:model='phone'>
                      @error('phone')
                      <small style="color:red">{{$message}}</small>
                      @enderror
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p class="form-row form-row-first validate-required validate-email form-group"
                      id="billing_email_field">
                      <label for="billing_email">Email
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text form-control" value name="billing_email" id="billing_email"
                        wire:model='email'>
                      @error('email')
                      <small style="color:red">{{$message}}</small>
                      @enderror
                    </p>
                  </div>
                </div>

              </div>

              {{-- <p class="form-row form-row-wide create-account">
                <input type="checkbox" class="input-checkbox" id="createaccount" name="createaccount" value="1">
                <label for="createaccount" class="checkbox-label">Create an account?</label>
              </p> --}}

              <div>
                <p class="form-row notes ecommerce-validated form-group" id="order_comments_field">
                  <label for="order_comments">Ghi chú</label>
                  <textarea name="order_comments" class="input-text form-control" id="order_comments"
                    placeholder="Ghi chú của khách hàng về đơn hàng của mình" rows="2" cols="6"
                    wire:model='order_note'></textarea>
                </p>
              </div>

            </div> <!-- end col -->
            <!-- Your Order -->
            <div class="col-lg-5">
              <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                <h2 class="uppercase">Đơn hàng của bạn</h2>
                <table class="table shop_table ecommerce-checkout-review-order-table">
                  <tbody>
                    @foreach(Cart::instance('cart')->content() as $item)
                    <tr>
                      <th class='cartItem-flex'>
                        <div>
                          <p>{{$item->name}}</p>
                          <p> Màu: <b>{{$item->options->color}}</b></p>
                          <p> Size: <b>{{$item->options->size}}</b></p>
                        </div>
                        <span class="count"> x {{$item->qty}}</span>
                      </th>
                      <td>
                        <span class="amount">{{$item->subtotal()}}VNĐ</span>
                      </td>
                    </tr>
                    @endforeach
                    <tr class="cart-subtotal">
                      <th>Tổng tiền hàng</th>
                      <td>
                        <span class="amount">{{Cart::instance('cart')->subtotal()}}VNĐ</span>
                      </td>
                    </tr>
                    <tr class="shipping">
                      <th>Phí vận chuyển</th>
                      <td>
                        <span>Miễn phí</span>
                      </td>
                    </tr>
                    <tr class="order-total">
                      <th><strong>Tổng tiền</strong></th>
                      <td>
                        <strong><span class="amount">{{Cart::instance('cart')->total()}}VNĐ</span></strong>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div id="payment" class="ecommerce-checkout-payment">
                  <h2 class="uppercase">Phương thức thanh toán</h2>
                  <ul class="payment_methods methods">

                    <li class="payment_method_bacs">
                      <input id="payment_method_bacs" type="radio" class="input-radio" name="vnpay" value="bacs"
                        checked="checked">
                      <label for="payment_method_bacs">VN Pay</label>
                      <div class="payment_box payment_method_bacs">
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment
                          reference. Your order wont be shipped until the funds have cleared in our account.</p>
                      </div>
                    </li>


                    <li class="payment_method_paypal">
                      <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method"
                        value="paypal">
                      <label for="payment_method_paypal">Paypal</label>
                      <img src="img/shop/paypal.png" alt="">
                      <div class="payment_box payment_method_paypal">
                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                      </div>
                    </li>

                    <li class="payment_method_cheque">
                      <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                        value="cheque">
                      <label for="payment_method_cheque">Thanh toán khi nhận hàng</label>
                      <div class="payment_box payment_method_cheque">
                        <p>Bạn có thể nhận hàng sau đó thanh toán cho chúng tôi qua hình thức COD và dịch vụ thu hộ của
                          đơn vị vận chuyển.</p>
                      </div>
                    </li>

                  </ul>
                  <div class="form-row place-order">
                    <button type="submit" class="btn btn-lg btn-color btn-button" id="place_order"
                      style="background-color: #ec2424">Đặt hàng</button>
                  </div>
                </div>
              </div>
            </div> <!-- end order review -->
          </form>

        </div> <!-- end ecommerce -->

      </div> <!-- end row -->
    </div> <!-- end container -->
  </section> <!-- end checkout -->
</div>