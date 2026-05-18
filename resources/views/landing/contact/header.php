<section class="contact pt-6 pb-6">
    <div class="contact__container container">
        <div class="contact__container__info">
            <span class="contact__container__info__label label label--yellow">Get in Touch</span>
            <h1>Let's <span>Collaborate</span></h1>
            <p>Whether you're a pharmaceutical company, biotech startup, or academic research group — we'd love to explore how AI-driven drug design can accelerate your programs.</p>
            <div class="contact__container__info__details">
                <div class="contact__container__info__details--item">
                    <div class="contact__container__info__details--item-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="contact__container__info__details--item-text">
                        <h3>Email</h3>
                        <p>customercare@thothbiosimulations.ca</p>
                    </div>
                </div>
                <div class="contact__container__info__details--item">
                    <div class="contact__container__info__details--item-icon">
                        <i class="fa-regular fa-map-pin"></i>
                    </div>
                    <div class="contact__container__info__details--item-text">
                        <h3>Location</h3>
                        <p>Edmonton, Alberta & Remote</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact__container__form">
            <form action="/contact" method="POST">
                <div class="contact__container__form__row">
                    <div class="contact__container__form__row--group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" placeholder="Your name" required>
                    </div>
                    <div class="contact__container__form__row--group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="you@org.com" required>
                    </div>
                </div>
                <div class="contact__container__form__row">
                    <div class="contact__container__form__row--group">
                        <label for="organization">Organization</label>
                        <input type="text" id="organization" name="organization" placeholder="Company / University">
                    </div>
                    <div class="contact__container__form__row--group">
                        <label for="area">Research Area</label>
                        <input type="text" id="area" name="area" placeholder="e.g. Oncology">
                    </div>
                </div>
                <div class="contact__container__form__row--group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" placeholder="Tell us about your project or collaboration idea..." required></textarea>
                </div>
                <button type="submit" class="btn btn--yellow">
                    Send Message
                    <i class="fa-regular fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</section>
