<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];
$initials = strtoupper(substr($full_name, 0, 1) . substr(strstr($full_name, ' '), 1, 1));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDeals Pro - Customer Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="image(quick deals).png" alt="QuickDeals Logo">
            <h1>QuickDeals Pro</h1>
        </div>
        
        <div class="user-actions">
            <a href="#" data-section="settings"><i class="fas fa-cog"></i> Settings</a>
            <a href="logout.php" class="sell-btn" style="color: white; padding: 10px;">
                <i class="fas fa-sign-out-alt" style="padding-right: 5px;"></i> Logout
            </a>
        </div>
    </header>

    <div class="dashboard-container">
        <aside class="sidebar">
        <div class="user-profile">
            <div class="user-avatar"><?php echo $initials; ?></div>
            <h3 style="margin-top: 1rem;"><?php echo htmlspecialchars($full_name); ?></h3>
            <p style="color: var(--gray); font-size: 0.875rem;"><?php echo htmlspecialchars($email); ?></p>
        </div>

            
            <ul class="sidebar-menu">
                <li><a href="#" class="active" data-section="dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#" data-section="purchases"><i class="fas fa-shopping-bag"></i> My Purchases</a></li>
                <li><a href="#" data-section="wishlist"><i class="fas fa-heart"></i> Wishlist</a></li>
                <li><a href="#" data-section="reviews"><i class="fas fa-star"></i> Reviews</a></li>
                <li><a href="#" data-section="settings"><i class="fas fa-cog"></i> Account Settings</a></li>
            </ul>
        </aside>
        
        <main class="main-content">
            <!-- Dashboard Section -->
            <section id="dashboard" class="dashboard-section active">
                <div class="welcome-banner">
                    <div class="welcome-text">
                    <h2><?php echo "Welcome back, $full_name"; ?></h2>
                        <p>Here's what's happening with your account today</p>
                    </div>
                    <div class="user-avatar"><?php echo $initials; ?></div>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="total-purchases">0</h3>
                            <p>Total Purchases</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon" style="color: var(--accent);">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="orders-transit">0</h3>
                            <p>Orders in Transit</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon" style="color: #10b981;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="completed-orders">0</h3>
                            <p>Completed Orders</p>
                        </div>
                    </div>
                </div>
                
                <h2 class="section-title"><i class="fas fa-shopping-bag"></i> Recent Purchases</h2>
                
                <div class="purchases-list" id="recent-purchases">
                    <!-- Recent purchases will be added here dynamically -->
                </div>

                <h2 class="section-title"><i class="fas fa-bolt"></i> Recommended For You</h2>
                
                <div class="products-grid" id="recommended-products">
                    <!-- Recommended products will be added here dynamically -->
                </div>
            </section>

            <!-- Purchases Section -->
            <section id="purchases" class="dashboard-section">
                <h2 class="section-title"><i class="fas fa-shopping-bag"></i> My Purchases</h2>
                
                <div class="filter-bar">
                    <div class="filter-options">
                        <button class="btn btn-sm filter-btn active" data-filter="all">All</button>
                        <button class="btn btn-sm filter-btn" data-filter="pending">Pending</button>
                        <button class="btn btn-sm filter-btn" data-filter="shipped">Shipped</button>
                        <button class="btn btn-sm filter-btn" data-filter="delivered">Delivered</button>
                    </div>
                </div>
                
                <div class="purchases-list" id="all-purchases">
                    <!-- All purchases will be added here dynamically -->
                </div>
            </section>

            <!-- Checkout Section -->
            <section id="checkout" class="dashboard-section">
                <a href="#" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                <h2 class="section-title"><i class="fas fa-shopping-cart"></i> Checkout</h2>
                
                <div class="checkout-form">
                    <h3 style="margin-bottom: 1.5rem;">Delivery Information</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="first-name" placeholder="firstname" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="last-name" placeholder="lastname" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" id="phone" placeholder="phonenumber" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea id="address" rows="3" required>123 Main Street, Mumbai, Maharashtra 400001</textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" id="city" value="Mumbai" required>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" id="state" value="Maharashtra" required>
                        </div>
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" id="zip" value="400001" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Delivery Instructions (Optional)</label>
                        <textarea id="instructions" rows="2" placeholder="Any special delivery instructions?"></textarea>
                    </div>
                    
                    <div style="margin-top: 2rem; border-top: 1px solid #e2e8f0; padding-top: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                            <span>Subtotal:</span>
                            <span id="checkout-subtotal">₹0</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                            <span>Shipping:</span>
                            <span>₹99</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-weight: 700; font-size: 1.125rem;">
                            <span>Total:</span>
                            <span id="checkout-total">₹99</span>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary" id="place-order-btn" style="margin-top: 2rem; width: 100%;">
                        <i class="fas fa-lock"></i> Place Order
                    </button>
                </div>
            </section>

            <!-- Order Confirmation Section -->
            <section id="order-confirmation" class="dashboard-section">
                <div class="order-confirmation">
                    <i class="fas fa-check-circle"></i>
                    <h2>Order Confirmed!</h2>
                    <p>Your order has been placed successfully. We've sent a confirmation email with your order details.</p>
                    <p>Order ID: <strong id="confirmed-order-id">ORD-12345</strong></p>
                    <button class="btn btn-primary" id="view-orders-btn"><i class="fas fa-shopping-bag"></i> View My Orders</button>
                </div>
            </section>

            <!-- Tracking Section -->
            <section id="tracking" class="dashboard-section">
                <a href="#" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Purchases</a>
                <h2 class="section-title"><i class="fas fa-truck"></i> Order Tracking</h2>
                
                <div class="tracking-container">
                    <h3 style="margin-bottom: 1rem;" id="tracking-order-title">Order #ORD-2023-12345</h3>
                    <p style="color: var(--gray); margin-bottom: 1.5rem;" id="tracking-product-name">Product Name</p>
                    
                    <div class="tracking-steps">
                        <div class="tracking-step">
                            <div class="step-icon completed">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="step-label completed">Order Placed</span>
                        </div>
                        <div class="tracking-step">
                            <div class="step-icon" id="processing-step">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="step-label" id="processing-label">Processing</span>
                        </div>
                        <div class="tracking-step">
                            <div class="step-icon" id="shipped-step">
                                <i class="fas fa-truck"></i>
                            </div>
                            <span class="step-label" id="shipped-label">Shipped</span>
                        </div>
                        <div class="tracking-step">
                            <div class="step-icon" id="delivered-step">
                                <i class="fas fa-home"></i>
                            </div>
                            <span class="step-label" id="delivered-label">Delivered</span>
                        </div>
                    </div>
                    
                    <div class="tracking-details">
                        <div class="tracking-info">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="tracking-text">
                                <h4>Current Location</h4>
                                <p id="current-location">Processing at our warehouse</p>
                            </div>
                        </div>
                        <div class="tracking-info">
                            <i class="fas fa-clock"></i>
                            <div class="tracking-text">
                                <h4>Estimated Delivery</h4>
                                <p id="estimated-delivery">Estimated delivery: 3-5 business days</p>
                            </div>
                        </div>
                        <div class="tracking-info">
                            <i class="fas fa-info-circle"></i>
                            <div class="tracking-text">
                                <h4>Tracking Number</h4>
                                <p id="tracking-number">SHIP-1234-5678-9012</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Wishlist Section -->
            <section id="wishlist" class="dashboard-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <h2 class="section-title"><i class="fas fa-heart"></i> My Wishlist</h2>
                    <button class="btn btn-primary" id="browse-more-btn"><i class="fas fa-search"></i> Browse More Items</button>
                </div>
                
                <div class="products-grid" id="wishlist-items">
                    <!-- Wishlist items will be added here dynamically -->
                </div>
            </section>

            <!-- Reviews Section -->
            <section id="reviews" class="dashboard-section">
                <h2 class="section-title"><i class="fas fa-star"></i> My Reviews</h2>
                
                <div class="purchases-list" id="review-items">
                    <!-- Review items will be added here dynamically -->
                </div>
            </section>

            <!-- Account Settings Section -->
            <section id="settings" class="dashboard-section">
                <h2 class="section-title"><i class="fas fa-cog"></i> Account Settings</h2>
                
                <div class="checkout-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" value="<?= htmlspecialchars($full_name) ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" value="<?= htmlspecialchars($full_name) ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" value="<?= htmlspecialchars($email) ?>">

                    </div>
                    
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" value="6305401717">
                    </div>
                    
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" value="2006-06-07">
                    </div>
                    
                    <div class="form-group">
                        <label>Gender</label>
                        <select>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                            <option>Prefer not to say</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea rows="3">123 Main Street, Mumbai, Maharashtra 400001</textarea>
                    </div>
                    
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </section>
        </main>
    </div>

    <footer>
        <div class="footer-bottom">
            <div class="copyright">© 2023 QuickDeals Pro. All Rights Reserved.</div>
            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Help</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data storage for products, purchases, and wishlist
            const products = [
                {
                    id: 1,
                    name: "Professional Binoculars 10x42",
                    price: 5999,
                    image: "https://m.media-amazon.com/images/I/71S4sIPFvBL._SL1500_.jpg",
                    description: "High-powered binoculars with 10x magnification and 42mm objective lens for clear viewing."
                },
                {
                    id: 2,
                    name: "DSLR Camera with 18-55mm Lens",
                    price: 32999,
                    image: "https://m.media-amazon.com/images/I/61lJ3xlQX1L._SL1500_.jpg",
                    description: "Professional DSLR camera with kit lens for stunning photography."
                },
                {
                    id: 3,
                    name: "Smart Watch with Fitness Tracker",
                    price: 2499,
                    image: "https://m.media-amazon.com/images/I/71zny7BTRlL._SL1500_.jpg",
                    description: "Feature-rich smartwatch with health monitoring and notifications."
                },
                {
                    id: 4,
                    name: "Wireless Noise Cancelling Headphones",
                    price: 3999,
                    image: "https://m.media-amazon.com/images/I/61L1ItFgFHL._SL1500_.jpg",
                    description: "Premium headphones with active noise cancellation and long battery life."
                },
                {
                    id: 5,
                    name: "Bluetooth Speaker with Bass",
                    price: 1999,
                    image: "https://m.media-amazon.com/images/I/61+Q6Rh5KVL._SL1500_.jpg",
                    description: "Portable speaker with deep bass and 12-hour battery life."
                },
                {
                    id: 6,
                    name: "4K Ultra HD Smart TV 55-inch",
                    price: 45999,
                    image: "https://m.media-amazon.com/images/I/81QY+4XGJbL._SL1500_.jpg",
                    description: "Immersive viewing experience with smart features and Dolby Vision."
                },
                {
                    id: 7,
                    name: "Gaming Laptop with RTX 3060",
                    price: 89999,
                    image: "https://m.media-amazon.com/images/I/71--0vvRMeL._SL1500_.jpg",
                    description: "Powerful gaming laptop with high-refresh display and RGB keyboard."
                },
                {
                    id: 8,
                    name: "Wireless Charging Pad",
                    price: 999,
                    image: "https://m.media-amazon.com/images/I/61+5m2wXJVL._SL1500_.jpg",
                    description: "Fast wireless charger compatible with all Qi-enabled devices."
                },
                {
                    id: 9,
                    name: "Electric Toothbrush with 4 Modes",
                    price: 1499,
                    image: "https://m.media-amazon.com/images/I/61o6H0k5QIL._SL1500_.jpg",
                    description: "Professional oral care with multiple brushing modes and timer."
                },
                {
                    id: 10,
                    name: "Air Fryer with Digital Display",
                    price: 3499,
                    image: "https://m.media-amazon.com/images/I/61aT2X6h5hL._SL1500_.jpg",
                    description: "Healthy cooking with 85% less fat using rapid air technology."
                },
                {
                    id: 11,
                    name: "Robot Vacuum Cleaner",
                    price: 19999,
                    image: "https://m.media-amazon.com/images/I/61DdY2bKPAL._SL1500_.jpg",
                    description: "Smart cleaning with app control and automatic dirt disposal."
                },
                {
                    id: 12,
                    name: "Fitness Smart Band",
                    price: 1299,
                    image: "https://m.media-amazon.com/images/I/61TDvCbQOJL._SL1500_.jpg",
                    description: "Track your workouts, heart rate, and sleep patterns."
                },
                {
                    id: 13,
                    name: "Portable SSD 1TB",
                    price: 6999,
                    image: "https://m.media-amazon.com/images/I/71+r1+5qP5L._SL1500_.jpg",
                    description: "Ultra-fast data transfer speeds in a compact, durable design."
                },
                {
                    id: 14,
                    name: "Ergonomic Office Chair",
                    price: 8999,
                    image: "https://m.media-amazon.com/images/I/61y5D4Z5WoL._SL1500_.jpg",
                    description: "Comfortable chair with lumbar support and adjustable height."
                },
                {
                    id: 15,
                    name: "Electric Kettle 1.5L",
                    price: 1299,
                    image: "https://m.media-amazon.com/images/I/71h8+5qQ0VL._SL1500_.jpg",
                    description: "Fast boiling with auto shut-off and boil-dry protection."
                }
            ];

            let purchases = [];
            let wishlist = [];
            let currentProduct = null;
            let orderCounter = 1000;

            // DOM elements
            const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
            const dashboardSections = document.querySelectorAll('.dashboard-section');
            const recentPurchasesList = document.getElementById('recent-purchases');
            const allPurchasesList = document.getElementById('all-purchases');
            const wishlistItems = document.getElementById('wishlist-items');
            const reviewItems = document.getElementById('review-items');
            const recommendedProducts = document.getElementById('recommended-products');
            const totalPurchasesEl = document.getElementById('total-purchases');
            const ordersInTransitEl = document.getElementById('orders-transit');
            const completedOrdersEl = document.getElementById('completed-orders');

            // Initialize the dashboard
            function initDashboard() {
                updateStats();
                renderRecommendedProducts();
                renderRecentPurchases();
                renderAllPurchases();
                renderWishlist();
                renderReviews();
            }

            // Update stats counters
            function updateStats() {
                totalPurchasesEl.textContent = purchases.length;
                ordersInTransitEl.textContent = purchases.filter(p => p.status === 'shipped').length;
                completedOrdersEl.textContent = purchases.filter(p => p.status === 'delivered').length;
            }

            // Render recommended products (first 4)
            function renderRecommendedProducts() {
                recommendedProducts.innerHTML = '';
                products.slice(0, 4).forEach(product => {
                    const isInWishlist = wishlist.some(item => item.id === product.id);
                    const productCard = `
                        <div class="product-card" data-product-id="${product.id}">
                            <img src="${product.image}" alt="${product.name}" class="product-img">
                            <div class="product-details">
                                <h3>${product.name}</h3>
                                <div class="product-price">₹${product.price.toLocaleString()}</div>
                                <div class="product-actions">
                                    <button class="btn btn-primary btn-sm buy-btn"><i class="fas fa-shopping-cart"></i> Buy Now</button>
                                    <button class="btn btn-secondary btn-sm wishlist-btn ${isInWishlist ? 'active' : ''}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    recommendedProducts.insertAdjacentHTML('beforeend', productCard);
                });
            }

            // Render recent purchases (last 2)
            function renderRecentPurchases() {
                recentPurchasesList.innerHTML = '';
                const recent = purchases.slice(0, 2);
                
                if (recent.length === 0) {
                    recentPurchasesList.innerHTML = '<p style="padding: 1.5rem; text-align: center; color: var(--gray);">No recent purchases</p>';
                    return;
                }

                recent.forEach(purchase => {
                    const purchaseItem = createPurchaseItem(purchase);
                    recentPurchasesList.insertAdjacentHTML('beforeend', purchaseItem);
                });
            }

            // Render all purchases
            function renderAllPurchases() {
                allPurchasesList.innerHTML = '';
                
                if (purchases.length === 0) {
                    allPurchasesList.innerHTML = '<p style="padding: 1.5rem; text-align: center; color: var(--gray);">No purchases yet</p>';
                    return;
                }

                purchases.forEach(purchase => {
                    const purchaseItem = createPurchaseItem(purchase);
                    allPurchasesList.insertAdjacentHTML('beforeend', purchaseItem);
                });
            }

            // Create purchase item HTML
            function createPurchaseItem(purchase) {
                const statusClass = `status-${purchase.status}`;
                const statusText = purchase.status.charAt(0).toUpperCase() + purchase.status.slice(1);
                const date = new Date(purchase.date).toLocaleDateString('en-IN', { 
                    day: 'numeric', 
                    month: 'short', 
                    year: 'numeric' 
                });

                let reviewSection = '';
                if (purchase.review) {
                    const stars = Array(5).fill().map((_, i) => 
                        i < purchase.review.rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>'
                    ).join('');

                    reviewSection = `
                        <div class="review-posted">
                            <div class="rating">
                                ${stars}
                            </div>
                            <p class="review-text">${purchase.review.text}</p>
                            <div class="review-time">Posted on: ${new Date(purchase.review.date).toLocaleDateString('en-IN', { 
                                day: 'numeric', 
                                month: 'short', 
                                year: 'numeric' 
                            })}</div>
                        </div>
                    `;
                }

                return `
                    <div class="purchase-item" data-order-id="${purchase.orderId}">
                        <img src="${purchase.image}" alt="${purchase.name}" class="purchase-img">
                        <div class="purchase-details">
                            <h3 class="purchase-title">${purchase.name}</h3>
                            <div class="purchase-price">₹${purchase.price.toLocaleString()}</div>
                            <div class="purchase-date">
                                <i class="far fa-calendar-alt"></i> Purchased on: ${date}
                            </div>
                            <span class="purchase-status ${statusClass}">${statusText}</span>
                            ${reviewSection}
                            <div class="purchase-actions">
                                ${purchase.status !== 'delivered' ? `
                                    <button class="btn btn-primary btn-sm track-btn"><i class="fas fa-box-open"></i> Track Package</button>
                                ` : ''}
                                ${purchase.status === 'delivered' && !purchase.review ? `
                                    <button class="btn btn-secondary btn-sm review-btn"><i class="fas fa-star"></i> Leave Review</button>
                                ` : ''}
                                ${purchase.status === 'delivered' && purchase.review ? `
                                    <button class="btn btn-secondary btn-sm edit-review-btn"><i class="fas fa-edit"></i> Edit Review</button>
                                ` : ''}
                                <button class="btn btn-danger btn-sm cancel-btn"><i class="fas fa-times"></i> Cancel Order</button>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Render wishlist items
            function renderWishlist() {
                wishlistItems.innerHTML = '';
                
                if (wishlist.length === 0) {
                    wishlistItems.innerHTML = '<p style="padding: 1.5rem; text-align: center; color: var(--gray);">Your wishlist is empty</p>';
                    return;
                }

                wishlist.forEach(item => {
                    const product = products.find(p => p.id === item.id);
                    if (product) {
                        const productCard = `
                            <div class="product-card" data-product-id="${product.id}">
                                <img src="${product.image}" alt="${product.name}" class="product-img">
                                <div class="product-details">
                                    <h3>${product.name}</h3>
                                    <div class="product-price">₹${product.price.toLocaleString()}</div>
                                    <div class="product-actions">
                                        <button class="btn btn-primary btn-sm buy-btn"><i class="fas fa-shopping-cart"></i> Buy Now</button>
                                        <button class="btn btn-danger btn-sm remove-wishlist-btn"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        `;
                        wishlistItems.insertAdjacentHTML('beforeend', productCard);
                    }
                });
            }

            // Render reviews
            function renderReviews() {
                reviewItems.innerHTML = '';
                
                const reviewedPurchases = purchases.filter(p => p.review);
                if (reviewedPurchases.length === 0) {
                    reviewItems.innerHTML = '<p style="padding: 1.5rem; text-align: center; color: var(--gray);">No reviews yet</p>';
                    return;
                }

                reviewedPurchases.forEach(purchase => {
                    const date = new Date(purchase.review.date).toLocaleDateString('en-IN', { 
                        day: 'numeric', 
                        month: 'short', 
                        year: 'numeric' 
                    });

                    const stars = Array(5).fill().map((_, i) => 
                        i < purchase.review.rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>'
                    ).join('');

                    const reviewItem = `
                        <div class="purchase-item">
                            <img src="${purchase.image}" alt="${purchase.name}" class="purchase-img">
                            <div class="purchase-details">
                                <h3 class="purchase-title">${purchase.name}</h3>
                                <div class="purchase-price">₹${purchase.price.toLocaleString()}</div>
                                <div class="purchase-date">
                                    <i class="far fa-calendar-alt"></i> Purchased on: ${new Date(purchase.date).toLocaleDateString('en-IN', { 
                                        day: 'numeric', 
                                        month: 'short', 
                                        year: 'numeric' 
                                    })}
                                </div>
                                
                                <div class="review-posted">
                                    <div class="rating">
                                        ${stars}
                                    </div>
                                    <p class="review-text">${purchase.review.text}</p>
                                    <div class="review-time">Posted on: ${date}</div>
                                    <button class="btn btn-secondary edit-review-btn" data-order-id="${purchase.orderId}" style="margin-top: 1rem;">
                                        <i class="fas fa-edit"></i> Edit Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    reviewItems.insertAdjacentHTML('beforeend', reviewItem);
                });
            }

            // Function to switch between sections
            function switchSection(sectionId) {
                // Hide all sections
                dashboardSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show the selected section
                document.getElementById(sectionId).classList.add('active');
                
                // Update active state in sidebar
                sidebarLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('data-section') === sectionId) {
                        link.classList.add('active');
                    }
                });
            }
            
            // Add click event listeners to sidebar links
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sectionId = this.getAttribute('data-section');
                    switchSection(sectionId);
                });
            });

            // Settings link in header
            document.querySelector('.user-actions a[data-section="settings"]').addEventListener('click', function(e) {
                e.preventDefault();
                switchSection('settings');
            });

            // Browse more items button
            document.getElementById('browse-more-btn').addEventListener('click', function() {
                switchSection('dashboard');
            });

            // View orders button in confirmation
            document.getElementById('view-orders-btn').addEventListener('click', function() {
                switchSection('purchases');
            });

            // Filter purchases
            document.querySelectorAll('#purchases .filter-btn').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('#purchases .filter-btn').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    document.querySelectorAll('#all-purchases .purchase-item').forEach(item => {
                        const status = item.querySelector('.purchase-status').textContent.toLowerCase();
                        if (filter === 'all' || status === filter) {
                            item.style.display = 'flex';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Buy Now button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('buy-btn') || e.target.closest('.buy-btn')) {
                    const btn = e.target.classList.contains('buy-btn') ? e.target : e.target.closest('.buy-btn');
                    const productId = parseInt(btn.closest('.product-card').getAttribute('data-product-id'));
                    currentProduct = products.find(p => p.id === productId);
                    
                    // Update checkout form with product details
                    document.getElementById('checkout-subtotal').textContent = `₹${currentProduct.price.toLocaleString()}`;
                    document.getElementById('checkout-total').textContent = `₹${(currentProduct.price + 99).toLocaleString()}`;
                    
                    switchSection('checkout');
                }
            });

            // Place Order button functionality
            document.getElementById('place-order-btn').addEventListener('click', function() {
                if (!currentProduct) return;
                
                // Create new order
                const orderId = `ORD-${++orderCounter}`;
                const newPurchase = {
                    orderId,
                    id: currentProduct.id,
                    name: currentProduct.name,
                    price: currentProduct.price,
                    image: currentProduct.image,
                    date: new Date().toISOString(),
                    status: 'pending',
                    review: null
                };
                
                purchases.unshift(newPurchase);
                
                // Update confirmation page
                document.getElementById('confirmed-order-id').textContent = orderId;
                
                // Update stats and render lists
                updateStats();
                renderRecentPurchases();
                renderAllPurchases();
                renderReviews();
                
                // Show confirmation
                switchSection('order-confirmation');
                
                // Simulate processing after 2 seconds
                setTimeout(() => {
                    const purchaseIndex = purchases.findIndex(p => p.orderId === orderId);
                    if (purchaseIndex !== -1) {
                        purchases[purchaseIndex].status = 'processing';
                        updateStats();
                        renderRecentPurchases();
                        renderAllPurchases();
                    }
                }, 2000);
                
                // Simulate shipping after 5 seconds
                setTimeout(() => {
                    const purchaseIndex = purchases.findIndex(p => p.orderId === orderId);
                    if (purchaseIndex !== -1) {
                        purchases[purchaseIndex].status = 'shipped';
                        updateStats();
                        renderRecentPurchases();
                        renderAllPurchases();
                    }
                }, 5000);
                
                // Simulate delivery after 10 seconds
                setTimeout(() => {
                    const purchaseIndex = purchases.findIndex(p => p.orderId === orderId);
                    if (purchaseIndex !== -1) {
                        purchases[purchaseIndex].status = 'delivered';
                        updateStats();
                        renderRecentPurchases();
                        renderAllPurchases();
                        renderReviews();
                    }
                }, 10000);
            });

            // Track Package button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('track-btn') || e.target.closest('.track-btn')) {
                    const btn = e.target.classList.contains('track-btn') ? e.target : e.target.closest('.track-btn');
                    const orderId = btn.closest('.purchase-item').getAttribute('data-order-id');
                    const purchase = purchases.find(p => p.orderId === orderId);
                    
                    if (purchase) {
                        // Update tracking page
                        document.getElementById('tracking-order-title').textContent = `Order #${orderId}`;
                        document.getElementById('tracking-product-name').textContent = purchase.name;
                        
                        // Update tracking status based on purchase status
                        if (purchase.status === 'processing') {
                            document.getElementById('processing-step').classList.add('completed');
                            document.getElementById('processing-label').classList.add('completed');
                            document.getElementById('shipped-step').classList.remove('completed', 'active');
                            document.getElementById('shipped-label').classList.remove('completed', 'active');
                            document.getElementById('delivered-step').classList.remove('completed', 'active');
                            document.getElementById('delivered-label').classList.remove('completed', 'active');
                            document.getElementById('current-location').textContent = 'Processing at our warehouse';
                            document.getElementById('estimated-delivery').textContent = 'Estimated delivery: 3-5 business days';
                        } else if (purchase.status === 'shipped') {
                            document.getElementById('processing-step').classList.add('completed');
                            document.getElementById('processing-label').classList.add('completed');
                            document.getElementById('shipped-step').classList.add('completed');
                            document.getElementById('shipped-label').classList.add('completed');
                            document.getElementById('delivered-step').classList.remove('completed', 'active');
                            document.getElementById('delivered-label').classList.remove('completed', 'active');
                            document.getElementById('current-location').textContent = 'Mumbai Sorting Center, Maharashtra';
                            document.getElementById('estimated-delivery').textContent = 'Monday, October 23, 2023 by 8:00 PM';
                        } else if (purchase.status === 'delivered') {
                            document.getElementById('processing-step').classList.add('completed');
                            document.getElementById('processing-label').classList.add('completed');
                            document.getElementById('shipped-step').classList.add('completed');
                            document.getElementById('shipped-label').classList.add('completed');
                            document.getElementById('delivered-step').classList.add('completed');
                            document.getElementById('delivered-label').classList.add('completed');
                            document.getElementById('current-location').textContent = 'Delivered to your address';
                            document.getElementById('estimated-delivery').textContent = 'Delivered on: ' + 
                                new Date(purchase.date).toLocaleDateString('en-IN', { 
                                    weekday: 'long', 
                                    day: 'numeric', 
                                    month: 'long', 
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                        } else {
                            document.getElementById('processing-step').classList.remove('completed', 'active');
                            document.getElementById('processing-label').classList.remove('completed', 'active');
                            document.getElementById('shipped-step').classList.remove('completed', 'active');
                            document.getElementById('shipped-label').classList.remove('completed', 'active');
                            document.getElementById('delivered-step').classList.remove('completed', 'active');
                            document.getElementById('delivered-label').classList.remove('completed', 'active');
                            document.getElementById('current-location').textContent = 'Order received, processing soon';
                            document.getElementById('estimated-delivery').textContent = 'Estimated delivery: 5-7 business days';
                        }
                        
                        // Generate tracking number
                        document.getElementById('tracking-number').textContent = `SHIP-${Math.floor(1000 + Math.random() * 9000)}-${Math.floor(1000 + Math.random() * 9000)}`;
                        
                        switchSection('tracking');
                    }
                }
            });

            // Cancel Order button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('cancel-btn') || e.target.closest('.cancel-btn')) {
                    const btn = e.target.classList.contains('cancel-btn') ? e.target : e.target.closest('.cancel-btn');
                    const orderId = btn.closest('.purchase-item').getAttribute('data-order-id');
                    
                    if (confirm('Are you sure you want to cancel this order?')) {
                        purchases = purchases.filter(p => p.orderId !== orderId);
                        updateStats();
                        renderRecentPurchases();
                        renderAllPurchases();
                        renderReviews();
                    }
                }
            });

            // Add to wishlist button functionality with glow effect
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('wishlist-btn') || e.target.closest('.wishlist-btn')) {
                    const btn = e.target.classList.contains('wishlist-btn') ? e.target : e.target.closest('.wishlist-btn');
                    const productId = parseInt(btn.closest('.product-card').getAttribute('data-product-id'));
                    const product = products.find(p => p.id === productId);
                    
                    const existingIndex = wishlist.findIndex(item => item.id === productId);
                    if (existingIndex !== -1) {
                        wishlist.splice(existingIndex, 1);
                        btn.classList.remove('active');
                    } else {
                        wishlist.push({ id: productId, date: new Date().toISOString() });
                        btn.classList.add('active');
                    }
                    
                    renderWishlist();
                }
            });

            // Remove from wishlist button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-wishlist-btn') || e.target.closest('.remove-wishlist-btn')) {
                    const btn = e.target.classList.contains('remove-wishlist-btn') ? e.target : e.target.closest('.remove-wishlist-btn');
                    const productId = parseInt(btn.closest('.product-card').getAttribute('data-product-id'));
                    
                    wishlist = wishlist.filter(item => item.id !== productId);
                    renderWishlist();
                    renderRecommendedProducts();
                }
            });

            // Leave Review button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('review-btn') || e.target.closest('.review-btn')) {
                    const btn = e.target.classList.contains('review-btn') ? e.target : e.target.closest('.review-btn');
                    const orderId = btn.closest('.purchase-item').getAttribute('data-order-id');
                    const purchase = purchases.find(p => p.orderId === orderId);
                    
                    if (purchase) {
                        // Create review form
                        const reviewForm = `
                            <div class="review-form">
                                <h4>Leave a Review</h4>
                                <div class="rating" id="rating-stars">
                                    <i class="far fa-star" data-rating="1"></i>
                                    <i class="far fa-star" data-rating="2"></i>
                                    <i class="far fa-star" data-rating="3"></i>
                                    <i class="far fa-star" data-rating="4"></i>
                                    <i class="far fa-star" data-rating="5"></i>
                                </div>
                                <textarea class="form-control" id="review-text" rows="3" placeholder="Share your experience with this product..."></textarea>
                                <button class="btn btn-primary" id="submit-review-btn" style="margin-top: 1rem;">Submit Review</button>
                            </div>
                        `;
                        
                        // Insert review form
                        const purchaseDetails = btn.closest('.purchase-details');
                        purchaseDetails.insertAdjacentHTML('beforeend', reviewForm);
                        
                        // Remove the review button
                        btn.remove();
                        
                        // Rating stars interaction
                        const stars = purchaseDetails.querySelectorAll('#rating-stars i');
                        let selectedRating = 0;
                        
                        stars.forEach(star => {
                            star.addEventListener('mouseover', function() {
                                const rating = parseInt(this.getAttribute('data-rating'));
                                highlightStars(rating);
                            });
                            
                            star.addEventListener('click', function() {
                                selectedRating = parseInt(this.getAttribute('data-rating'));
                                highlightStars(selectedRating);
                            });
                        });
                        
                        function highlightStars(rating) {
                            stars.forEach((star, index) => {
                                if (index < rating) {
                                    star.classList.remove('far');
                                    star.classList.add('fas', 'active');
                                } else {
                                    star.classList.remove('fas', 'active');
                                    star.classList.add('far');
                                }
                            });
                        }
                        
                        // Submit review
                        purchaseDetails.querySelector('#submit-review-btn').addEventListener('click', function() {
                            const reviewText = purchaseDetails.querySelector('#review-text').value.trim();
                            if (selectedRating === 0) {
                                alert('Please select a rating');
                                return;
                            }
                            if (reviewText === '') {
                                alert('Please write your review');
                                return;
                            }
                            
                            purchase.review = {
                                rating: selectedRating,
                                text: reviewText,
                                date: new Date().toISOString()
                            };
                            
                            // Remove the review form
                            purchaseDetails.querySelector('.review-form').remove();
                            
                            // Update the UI
                            renderReviews();
                            renderAllPurchases();
                            renderRecentPurchases();
                        });
                    }
                }
            });

            // Edit Review button functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('edit-review-btn') || e.target.closest('.edit-review-btn')) {
                    const btn = e.target.classList.contains('edit-review-btn') ? e.target : e.target.closest('.edit-review-btn');
                    const orderId = btn.getAttribute('data-order-id');
                    const purchase = purchases.find(p => p.orderId === orderId);
                    
                    if (purchase && purchase.review) {
                        // Create edit review form
                        const reviewForm = `
                            <div class="review-form">
                                <h4>Edit Your Review</h4>
                                <div class="rating" id="edit-rating-stars">
                                    <i class="${purchase.review.rating >= 1 ? 'fas active' : 'far'}" data-rating="1"></i>
                                    <i class="${purchase.review.rating >= 2 ? 'fas active' : 'far'}" data-rating="2"></i>
                                    <i class="${purchase.review.rating >= 3 ? 'fas active' : 'far'}" data-rating="3"></i>
                                    <i class="${purchase.review.rating >= 4 ? 'fas active' : 'far'}" data-rating="4"></i>
                                    <i class="${purchase.review.rating >= 5 ? 'fas active' : 'far'}" data-rating="5"></i>
                                </div>
                                <textarea class="form-control" id="edit-review-text" rows="3">${purchase.review.text}</textarea>
                                <div style="display: flex; gap: 0.5rem; margin-top: 1rem;">
                                    <button class="btn btn-primary" id="update-review-btn">Update Review</button>
                                    <button class="btn btn-danger" id="cancel-edit-btn">Cancel</button>
                                </div>
                            </div>
                        `;
                        
                        // Hide the existing review and show edit form
                        const reviewPosted = btn.closest('.review-posted');
                        reviewPosted.style.display = 'none';
                        reviewPosted.insertAdjacentHTML('afterend', reviewForm);
                        
                        // Rating stars interaction
                        const stars = document.querySelectorAll('#edit-rating-stars i');
                        let selectedRating = purchase.review.rating;
                        
                        stars.forEach(star => {
                            star.addEventListener('mouseover', function() {
                                const rating = parseInt(this.getAttribute('data-rating'));
                                highlightStars(rating);
                            });
                            
                            star.addEventListener('click', function() {
                                selectedRating = parseInt(this.getAttribute('data-rating'));
                                highlightStars(selectedRating);
                            });
                        });
                        
                        function highlightStars(rating) {
                            stars.forEach((star, index) => {
                                if (index < rating) {
                                    star.classList.remove('far');
                                    star.classList.add('fas', 'active');
                                } else {
                                    star.classList.remove('fas', 'active');
                                    star.classList.add('far');
                                }
                            });
                        }
                        
                        // Update review
                        document.getElementById('update-review-btn').addEventListener('click', function() {
                            const reviewText = document.getElementById('edit-review-text').value.trim();
                            if (selectedRating === 0) {
                                alert('Please select a rating');
                                return;
                            }
                            if (reviewText === '') {
                                alert('Please write your review');
                                return;
                            }
                            
                            purchase.review = {
                                rating: selectedRating,
                                text: reviewText,
                                date: new Date().toISOString()
                            };
                            
                            // Remove the edit form and show updated review
                            document.querySelector('.review-form').remove();
                            reviewPosted.style.display = 'block';
                            
                            // Update the UI
                            renderReviews();
                            renderAllPurchases();
                            renderRecentPurchases();
                        });
                        
                        // Cancel edit
                        document.getElementById('cancel-edit-btn').addEventListener('click', function() {
                            document.querySelector('.review-form').remove();
                            reviewPosted.style.display = 'block';
                        });
                    }
                }
            });

            // Back buttons functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('back-btn') || e.target.closest('.back-btn')) {
                    e.preventDefault();
                    const btn = e.target.classList.contains('back-btn') ? e.target : e.target.closest('.back-btn');
                    const currentSection = btn.closest('.dashboard-section').id;
                    
                    let previousSection = 'dashboard';
                    if (currentSection === 'tracking') previousSection = 'purchases';
                    else if (currentSection === 'checkout') previousSection = 'dashboard';
                    
                    switchSection(previousSection);
                }
            });

            // Initialize the dashboard
            initDashboard();
        });
    </script>
</body>
</html>