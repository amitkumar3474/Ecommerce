@extends('layouts.website')

@section('section_data')

<div class="container">
    <div class="contact-page">
        <div class="part-left">
            <h2>CONTACT US</h2>
            <p>Have a question comment? use the below to send us a message or contact us by mail at:</p>
            <form action="">
                <label for="">Your Name</label>
                <input type="text" name="name" palceholder="Name"><br>

                <label for="">Your Number</label>
                <input type="tel" name="number" palceholder="Number"><br>

                <label for="">Your Email</label>
                <input type="email" name="email" palceholder="Email"><br>

                <label for="">Your Comment</label>
                <textarea name="" id="" palceholder="Email"></textarea>

                <input type="submit" name="submit" value="Submit Contaact" id="submit">
            </form>
        </div>
        <div class="part-right">
            <h3>PLEASE DO GET IN TOUCH</h3>
            <p>We'd love to herar from you-please use the form to send us your message or ideas or simpelypop in for a
                cup of fresh tea and a cookie</p>
            <p><a href="">Email:naresh@gmail.com</a></p>
            <p>Tol-free: 833-PAR-FUMS(727-3867)</p>
        </div>
    </div>
</div>

@endsection