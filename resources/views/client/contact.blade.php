@extends('layouts.app')
@section('content')
<!-- Google map -->
<section class="section-wrap pb-0">
  <div class="container">

    <!-- Breadcrumbs -->
    <ol class="breadcrumbs">
      <li>
        <a href="index.html">Home</a>
      </li>
      <li>
        <a href="index.html">Pages</a>
      </li>
      <li class="active">
        Catalog Grid
      </li>
    </ol>

    <div id="google-map" class="gmap" data-address="V Tytana St, Manila, Philippines">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6118690188!2d106.64087991471897!3d10.840985692277725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175299c9b1c99ed%3A0x54c483abb574e391!2zMTQgxJAuIMSQ4buXIFRow7pjIFThu4tuaCwgUGjGsOG7nW5nIDEyLCBHw7IgVuG6pXAsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1677224068350!5m2!1svi!2s"
        width="1270" height="428" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>
<!-- End Google map -->

<!-- Contact -->
<section class="section-wrap pb-40">
  <div class="container">
    <div class="row">

      <div class="col-lg-8">
        <h2 class="uppercase">drop us a line</h2>
        <p>Namira is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes
          store with this Theme is easy than you can imagine.</p>

        <!-- Contact Form -->
        <form id="contact-form" class="contact-form mt-30 mb-30" method="post" action="#">
          <div class="form-group contact-name">
            <label for="name">Name <abbr title="required" class="required">*</abbr></label>
            <input name="name" class="form-control" id="name" type="text">
          </div>
          <div class="form-group contact-email">
            <label for="email">Email <abbr title="required" class="required">*</abbr></label>
            <input name="email" class="form-control" id="email" type="email">
          </div>
          <div class="form-group contact-subject">
            <label for="email">Subject</label>
            <input name="subject" class="form-control" id="subject" type="text">
          </div>
          <div class="form-group contact-message">
            <label for="message">Message <abbr title="required" class="required">*</abbr></label>
            <textarea id="message" class="form-control" name="message" rows="7" required="required"></textarea>
          </div>

          <input type="submit" class="btn btn-lg btn-color btn-button" value="Gửi thông báo" id="submit-message">
          <div id="msg" class="message"></div>
        </form>
      </div> <!-- end col -->

      <div class="col-lg-4">
        <div class="contact-info">
          <ul>
            <li class="contact-info__item">
              <h4 class="contact-info__title uppercase">Address</h4>
              <h6 class="contact-info__store-title">Philippines Store</h6>
              <address class="address">Philippines, PO Box 620067, Talay st. 66, A-ha inc.</address>
              <h6 class="contact-info__store-title">Canada Store</h6>
              <address class="address">A-ha inc, 10-123 Main st. NW, Montreal QC, H3Z2Y7</address>
            </li>
            <li class="contact-info__item">
              <h4 class="contact-info__title uppercase">Contact Info</h4>
              <ul>
                <li><span>Phone: </span><a href="tel:+1-888-1554-456-123">+ 1-888-1554-456-123</a></li>
                <li><span>Email: </span><a href="mailto:themesupport@gmail.com">themesupport@gmail.com</a></li>
                <li><span>Skype: </span><a href="#">ahasupport</a></li>
              </ul>
            </li>
            <li class="contact-info__item">
              <h4 class="contact-info__title uppercase">Business Hours</h4>
              <ul>
                <li>Monday – Friday: 9am to 20 pm</li>
                <li>Saturday: 9am to 17 pm</li>
                <li>Sunday: closed</li>
              </ul>
            </li>
          </ul>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- End contact -->
@endsection