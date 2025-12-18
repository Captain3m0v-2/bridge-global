<?php
/**
 * Front Page Template for Bridge Global
 * 
 * @package BridgeGlobal
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Bridge Global</h1>
                <p class="lead fs-4 mb-4">Connecting your business to worldwide opportunities through supply chain, sourcing, and professional travel services.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#services" class="btn btn-light btn-lg px-4">Our Services</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg px-4">Contact Us</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="world-map-placeholder mt-4 mt-lg-0">
                    <div class="position-relative d-inline-block">
                        <i class="bi bi-globe-americas display-1 text-white opacity-50"></i>
                        <i class="bi bi-signpost-split display-3 text-white position-absolute top-50 start-50 translate-middle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Our Global Bridge Services</h2>
            <p class="lead text-muted">Comprehensive solutions for your international business needs</p>
        </div>
        
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4">
                    <div class="service-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h3 class="h4 mb-3">Supply Chain Solutions</h3>
                    <p class="text-muted">End-to-end logistics, warehousing, and distribution across continents with real-time tracking.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Global logistics network</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Customs clearance assistance</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Inventory management</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4">
                    <div class="service-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="h4 mb-3">Product Sourcing</h3>
                    <p class="text-muted">Find reliable manufacturers and suppliers worldwide with quality assurance and negotiation.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Supplier verification</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Sample procurement</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Quality inspection</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 p-4">
                    <div class="service-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h3 class="h4 mb-3">Global Tour Guide</h3>
                    <p class="text-muted">Professional business tours, cultural experiences, and logistics for international travelers.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Business networking tours</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Cultural immersion programs</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Logistics coordination</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="/services" class="btn btn-bridge btn-lg">View All Services</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="h2 mb-3">Ready to Expand Globally?</h3>
                <p class="lead mb-0">Let us be your bridge to international markets. Get a free consultation today.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="/contact" class="btn btn-bridge btn-lg px-5">Start Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-5" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h3 class="h2 mb-3">Stay Updated</h3>
                <p class="text-muted mb-4">Subscribe to our newsletter for global business insights, market trends, and service updates.</p>
                
                <form class="newsletter-form row g-2 justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" placeholder="Your email address" required>
                            <button class="btn btn-bridge" type="submit">Subscribe</button>
                        </div>
                        <div class="form-text mt-2">We respect your privacy. Unsubscribe anytime.</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>