@extends('frontend.layout.app')

@section('title', 'Simpleshop-Contact')


@section('content')


    <div class="container">
      <h1>Contact Us</h1>
      <p class="mb-4">Have a question? Send us a message and we'll get back to you.</p>

      <form id="contactForm" method="POST" action="#">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>




@endsection