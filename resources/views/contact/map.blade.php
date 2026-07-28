<section class="neo-section" style="background: white; border-bottom: none;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="neo-title" style="font-size: 2rem;">
                Lokasi <span style="color: var(--blue);">Kami</span>
            </h2>
        </div>
        <div class="neo-card" style="padding: 0; overflow: hidden; border: 4px solid var(--black); box-shadow: 8px 8px 0 var(--black);">
            <iframe 
                src="{{ $contact->map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456!2d107.612345!3d-6.912345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnNDQuMyJTIDEwN8KwMzYnNDQuMyJF!5e0!3m2!1sid!2sid!4v1234567890' }}" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>