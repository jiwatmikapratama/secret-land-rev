{{-- Form Daftar Wisata Oleh User  --}}
<div class="g col-lg-12">
    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="row">
            <h3 class="text-center">DAFTAR WISATA YANG BELUM ADA</h3>
            <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                    required>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        {{-- <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
        </div> --}}
        <div class=""><button type="submit">Send Message</button></div>
        <p class="text-center">Desa Tempat Wisata Belum Terdaftar?<a href=""> Daftarkan
                Desa?</a></p>

    </form>
</div>
