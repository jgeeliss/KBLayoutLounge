@extends('layouts.app')

@section('content')
<div>
    <h1>Contact Us</h1>
    <p>Have a question or feedback? Send us a message and we'll get back to you as soon as possible.</p>

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <div>
            <label for="name">
                Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                placeholder="Enter your name">
        </div>

        <div>
            <label for="email">
                Email <span>*</span>
            </label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
                placeholder="Enter your email">
        </div>

        <div>
            <label for="message">
                Message <span>*</span>
            </label>
            <textarea
                name="message"
                id="message"
                rows="8"
                required
                placeholder="Enter your message">{{ old('message') }}</textarea>
        </div>

        <div>
            <button type="submit">
                Send Message
            </button>
        </div>
    </form>
</div>
@endsection
