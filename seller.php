<?php
session_start();

if (!isset($_SESSION['seller_id'])) {
    header("Location: seller_login.html"); // Redirect if not logged in
    exit();
}

$business_name = $_SESSION['business_name'];
$email = $_SESSION['email'];
$initials = strtoupper(substr($business_name, 0, 1));
$secondInitial = strstr($business_name, ' ');
if ($secondInitial) {
    $initials .= strtoupper(substr($secondInitial, 1, 1));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDeals Pro - Seller Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style3.css">

</head>
<body>
    <!-- Left Sidebar Navigation -->
    <aside class="seller-sidebar">
        <div class="sidebar-header">
            <img src="image(quick deals).png" alt="QuickDeals Logo">
            <h1>Seller Center</h1>
        </div>
        
        <nav class="seller-nav">
            <ul>
                <li><a href="#" class="active" id="homeLink"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" id="addItemLink"><i class="fas fa-plus-circle"></i> <span>Add Item</span></a></li>
                <li><a href="#" id="listingsLink"><i class="fas fa-list"></i> <span>My Listings</span></a></li>
                <li><a href="#" id="statsLink"><i class="fas fa-chart-line"></i> <span>Statistics</span></a></li>
                
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-profile">
            <div class="user-avatar"><?= $initials ?></div>
<div class="user-info">
    <h4><?= htmlspecialchars($business_name) ?></h4>
    <p>Seller</p>
</div>

            </div>
            <a href="logout.php" class="sell-btn" style="color: white;padding: 10px;" ><i class="fas fa-sign-out-alt" style="color: white;padding: 10px;"></i > Logout</a>
            </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="seller-header">
            <h2 id="currentPageTitle">Dashboard</h2>
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
            </div>
        </header>

        <!-- Page Content -->
        <div class="seller-container">
            <!-- Home Page (Default View) -->
            <div id="homePage">
                <h1 class="page-title"><i class="fas fa-home"></i> Seller Dashboard</h1>
                
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon primary">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="stat-info">
                            <h3>₹25,480</h3>
                            <p>Total Earnings</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>42</h3>
                            <p>Completed Orders</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>8</h3>
                            <p>Pending Orders</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon danger">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>3</h3>
                            <p>Cancelled Orders</p>
                        </div>
                    </div>
                </div>
                
                <!-- Seller Profile -->
                <div class="profile-section">
                    <div class="profile-header">
                        <h2>Your Profile</h2>
                        <button class="edit-btn"><i class="fas fa-edit"></i> Edit Profile</button>
                    </div>
                    <div class="profile-content">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="profile-details">
                            <div class="detail-group">
                            <h4>Full Name</h4>
<p><?= htmlspecialchars($_SESSION['business_name']) ?></p>

                            </div>
                            <div class="detail-group">
                            <h4>Email</h4>
<p><?= htmlspecialchars($_SESSION['email']) ?></p>

<!-- Make sure you're storing 'phone' in session -->

                            </div>
                            <div class="detail-group">
                                <h4>Phone</h4>
                                <p>+91 6305401717</p>
                            </div>
                            <div class="detail-group">
                                <h4>Seller Since</h4>
                                <p>January 2022</p>
                            </div>
                            <div class="detail-group">
                                <h4>Address</h4>
                                <p>123 Market Street, Bangalore, Karnataka 560001</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- Recent Orders -->
                <div class="orders-section">
                    <div class="section-header">
                        <h2>Recent Orders</h2>
                        <a href="#" class="view-all">View all <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Customer</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="order-item">
                                        <img src="iphone.webp" alt="iPhone" class="order-img">
                                        <div class="order-info">
                                            <h4>iPhone 13 Pro Max</h4>
                                            <p>Mobile Phones</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Ankit Sharma</td>
                                <td>₹85,000</td>
                                <td><span class="order-status status-completed"><i class="fas fa-check-circle"></i> Completed</span></td>
                                <td>Today</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="order-item">
                                        <img src="watch.webp" alt="Watch" class="order-img">
                                        <div class="order-info">
                                            <h4>Samsung Galaxy Watch</h4>
                                            <p>Wearables</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Priya Patel</td>
                                <td>₹12,500</td>
                                <td><span class="order-status status-pending"><i class="fas fa-clock"></i> Pending</span></td>
                                <td>Yesterday</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="order-item">
                                        <img src="macbook.webp" alt="Laptop" class="order-img">
                                        <div class="order-info">
                                            <h4>MacBook Air M1</h4>
                                            <p>Laptops</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Rahul Verma</td>
                                <td>₹65,000</td>
                                <td><span class="order-status status-completed"><i class="fas fa-check-circle"></i> Completed</span></td>
                                <td>2 days ago</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="order-item">
                                        <img src="camera.webp" alt="Camera" class="order-img">
                                        <div class="order-info">
                                            <h4>Canon EOS R5</h4>
                                            <p>Cameras</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Neha Gupta</td>
                                <td>₹2,25,000</td>
                                <td><span class="order-status status-cancelled"><i class="fas fa-times-circle"></i> Cancelled</span></td>
                                <td>1 week ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Add Item Page (Hidden by default) -->
            <div id="addItemPage" style="display: none;">
                <h1 class="page-title"><i class="fas fa-plus-circle"></i> Add New Item</h1>
                
                <div class="add-item-section">
                    <form id="itemForm">
                        <div class="form-grid">
                            <div class="form-group required">
                                <label for="itemTitle">Item Title</label>
                                <input type="text" id="itemTitle" class="form-control" placeholder="e.g. iPhone 13 Pro Max 256GB" required>
                            </div>
                            
                            <div class="form-group required">
                                <label for="itemCategory">Category</label>
                                <select id="itemCategory" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <option>Mobile Phones</option>
                                    <option>Cars</option>
                                    <option>Electronics</option>
                                    <option>Property</option>
                                    <option>Fashion</option>
                                    <option>Furniture</option>
                                    <option>Pets</option>
                                    <option>Books</option>
                                    <option>Jobs</option>
                                    <option>Services</option>
                                </select>
                            </div>
                            
                            <div class="form-group required">
                                <label for="itemPrice">Price (₹)</label>
                                <input type="number" id="itemPrice" class="form-control" placeholder="e.g. 25000" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="itemBrand">Brand</label>
                                <input type="text" id="itemBrand" class="form-control" placeholder="e.g. Apple, Samsung">
                            </div>
                            
                            <div class="form-group">
                                <label for="itemCondition">Condition</label>
                                <select id="itemCondition" class="form-control">
                                    <option>New</option>
                                    <option>Used - Like New</option>
                                    <option>Used - Good</option>
                                    <option>Used - Fair</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="itemLocation">Location</label>
                                <input type="text" id="itemLocation" class="form-control" placeholder="e.g. Bangalore, Karnataka">
                            </div>
                            
                            <div class="form-group full-width">
                                <label for="itemDescription">Description</label>
                                <textarea id="itemDescription" class="form-control" rows="4" placeholder="Provide detailed description of your item"></textarea>
                            </div>
                            
                            <div class="form-group full-width">
                                <label>Images (Upload at least 1 image)</label>
                                <div class="image-upload" id="imageUpload">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drag & drop images here or click to browse</p>
                                    <small>JPEG or PNG, max 5MB each</small>
                                    <input type="file" id="fileInput" multiple accept="image/*" style="display: none;">
                                </div>
                                <div class="preview-images" id="previewImages"></div>
                            </div>
                            
                            <div class="form-group full-width">
                                <button type="submit" class="submit-btn">
                                    <i class="fas fa-plus"></i> Add Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- My Listings Page (Hidden by default) -->
            <div id="listingsPage" style="display: none;">
                <h1 class="page-title"><i class="fas fa-list"></i> My Listings</h1>
                
                <div class="listings-section">
                    <div class="listings-actions">
                        <div class="search-box">
                            <input type="text" placeholder="Search your listings...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        <button class="add-listing-btn" id="addNewListingBtn">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    
                    <div class="listings-grid" id="listingsGrid">
                        <!-- Listing cards will be added dynamically -->
                        <div class="listing-card">
                            <div class="listing-img-container">
                                <span class="listing-badge">Featured</span>
                                <div class="listing-actions">
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </div>
                                <img src="https://via.placeholder.com/300x200" alt="iPhone" class="listing-img">
                            </div>
                            <div class="listing-details">
                                <h3>iPhone 13 Pro Max 256GB Pacific Blue</h3>
                                <div class="listing-price">₹85,000</div>
                                <div class="listing-meta">
                                    <span><i class="fas fa-eye"></i> 245 views</span>
                                    <span><i class="fas fa-calendar-alt"></i> Today</span>
                                </div>
                                <div class="listing-footer">
                                    <span class="listing-status status-active">Active</span>
                                    <button class="view-btn">View</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="listing-card">
                            <div class="listing-img-container">
                                <div class="listing-actions">
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </div>
                                <img src="https://via.placeholder.com/300x200" alt="MacBook" class="listing-img">
                            </div>
                            <div class="listing-details">
                                <h3>MacBook Air M1 2020 8GB/256GB</h3>
                                <div class="listing-price">₹65,000</div>
                                <div class="listing-meta">
                                    <span><i class="fas fa-eye"></i> 189 views</span>
                                    <span><i class="fas fa-calendar-alt"></i> 2 days ago</span>
                                </div>
                                <div class="listing-footer">
                                    <span class="listing-status status-active">Active</span>
                                    <button class="view-btn">View</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="listing-card">
                            <div class="listing-img-container">
                                <span class="listing-badge">Verified</span>
                                <div class="listing-actions">
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </div>
                                <img src="https://via.placeholder.com/300x200" alt="Watch" class="listing-img">
                            </div>
                            <div class="listing-details">
                                <h3>Samsung Galaxy Watch 4 Classic 46mm</h3>
                                <div class="listing-price">₹12,500</div>
                                <div class="listing-meta">
                                    <span><i class="fas fa-eye"></i> 56 views</span>
                                    <span><i class="fas fa-calendar-alt"></i> 1 week ago</span>
                                </div>
                                <div class="listing-footer">
                                    <span class="listing-status status-pending">Pending</span>
                                    <button class="view-btn">View</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="listing-card">
                            <div class="listing-img-container">
                                <div class="listing-actions">
                                    <button class="action-btn"><i class="fas fa-redo"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </div>
                                <img src="https://via.placeholder.com/300x200" alt="Camera" class="listing-img">
                            </div>
                            <div class="listing-details">
                                <h3>Canon EOS R5 Mirrorless Camera</h3>
                                <div class="listing-price">₹2,25,000</div>
                                <div class="listing-meta">
                                    <span><i class="fas fa-eye"></i> 421 views</span>
                                    <span><i class="fas fa-calendar-alt"></i> 2 weeks ago</span>
                                </div>
                                <div class="listing-footer">
                                    <span class="listing-status status-sold">Sold</span>
                                    <button class="view-btn">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Page (Hidden by default) -->
            <div id="statsPage" style="display: none;">
                <h1 class="page-title"><i class="fas fa-chart-line"></i> Sales Statistics</h1>
                
                <div class="stats-section">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon primary">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="stat-info">
                                <h3>₹25,480</h3>
                                <p>Total Earnings</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-info">
                                <h3>42</h3>
                                <p>Items Sold</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon warning">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="stat-info">
                                <h3>1,245</h3>
                                <p>Total Views</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon danger">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="stat-info">
                                <h3>87</h3>
                                <p>Favorites</p>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </main>

    <script>
        // Navigation between pages
        const homeLink = document.getElementById('homeLink');
        const addItemLink = document.getElementById('addItemLink');
        const listingsLink = document.getElementById('listingsLink');
        const statsLink = document.getElementById('statsLink');
        
        const homePage = document.getElementById('homePage');
        const addItemPage = document.getElementById('addItemPage');
        const listingsPage = document.getElementById('listingsPage');
        const statsPage = document.getElementById('statsPage');
        
        const currentPageTitle = document.getElementById('currentPageTitle');
        
        const navLinks = [homeLink, addItemLink, listingsLink, statsLink];
        const pages = [homePage, addItemPage, listingsPage, statsPage];
        const pageTitles = ['Dashboard', 'Add Item', 'My Listings', 'Statistics'];
        
        function showPage(pageIndex) {
            // Hide all pages
            pages.forEach(page => page.style.display = 'none');
            // Remove active class from all nav links
            navLinks.forEach(link => link.classList.remove('active'));
            // Show selected page
            pages[pageIndex].style.display = 'block';
            // Add active class to selected nav link
            navLinks[pageIndex].classList.add('active');
            // Update page title
            currentPageTitle.textContent = pageTitles[pageIndex];
        }
        
        homeLink.addEventListener('click', (e) => {
            e.preventDefault();
            showPage(0);
        });
        
        addItemLink.addEventListener('click', (e) => {
            e.preventDefault();
            showPage(1);
        });
        
        listingsLink.addEventListener('click', (e) => {
            e.preventDefault();
            showPage(2);
        });
        
        statsLink.addEventListener('click', (e) => {
            e.preventDefault();
            showPage(3);
        });
        
        // Add new listing button
        const addNewListingBtn = document.getElementById('addNewListingBtn');
        addNewListingBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showPage(1);
        });
        
        // Image upload functionality
        const imageUpload = document.getElementById('imageUpload');
        const fileInput = document.getElementById('fileInput');
        const previewImages = document.getElementById('previewImages');
        
        imageUpload.addEventListener('click', () => {
            fileInput.click();
        });
        
        fileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            previewImages.innerHTML = '';
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (!file.type.match('image.*')) continue;
                
                const reader = new FileReader();
                reader.onload = (function(file) {
                    return function(e) {
                        const imgContainer = document.createElement('div');
                        imgContainer.style.position = 'relative';
                        imgContainer.style.display = 'inline-block';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'preview-image';
                        
                        const removeBtn = document.createElement('span');
                        removeBtn.className = 'remove-image';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.addEventListener('click', (e) => {
                            e.stopPropagation();
                            imgContainer.remove();
                        });
                        
                        imgContainer.appendChild(img);
                        imgContainer.appendChild(removeBtn);
                        previewImages.appendChild(imgContainer);
                    };
                })(file);
                
                reader.readAsDataURL(file);
            }
        });
        
        // Allow drag and drop
        imageUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageUpload.style.borderColor = 'var(--primary)';
        });
        
        imageUpload.addEventListener('dragleave', () => {
            imageUpload.style.borderColor = '#e2e8f0';
        });
        
        imageUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            imageUpload.style.borderColor = '#e2e8f0';
            fileInput.files = e.dataTransfer.files;
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        });
        
        // Form submission
        const itemForm = document.getElementById('itemForm');
        const listingsGrid = document.getElementById('listingsGrid');
        
        itemForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form values
            const title = document.getElementById('itemTitle').value;
            const category = document.getElementById('itemCategory').value;
            const price = document.getElementById('itemPrice').value;
            const brand = document.getElementById('itemBrand').value;
            const condition = document.getElementById('itemCondition').value;
            const location = document.getElementById('itemLocation').value;
            const description = document.getElementById('itemDescription').value;
            
            // Create new listing card
            const listingCard = document.createElement('div');
            listingCard.className = 'listing-card';
            listingCard.innerHTML = `
                <div class="listing-img-container">
                    <div class="listing-actions">
                        <button class="action-btn"><i class="fas fa-edit"></i></button>
                        <button class="action-btn"><i class="fas fa-trash"></i></button>
                    </div>
                    <img src="https://via.placeholder.com/300x200" alt="${title}" class="listing-img">
                </div>
                <div class="listing-details">
                    <h3>${title}</h3>
                    <div class="listing-price">₹${price}</div>
                    <div class="listing-meta">
                        <span><i class="fas fa-eye"></i> 0 views</span>
                        <span><i class="fas fa-calendar-alt"></i> Just now</span>
                    </div>
                    <div class="listing-footer">
                        <span class="listing-status status-pending">Pending</span>
                        <button class="view-btn">View</button>
                    </div>
                </div>
            `;
            
            // Add to the beginning of listings grid
            listingsGrid.insertBefore(listingCard, listingsGrid.firstChild);
            
            // Reset form
            itemForm.reset();
            previewImages.innerHTML = '';
            
            // Show success message
            alert('Item added successfully! It will appear in your listings after approval.');
            
            // Switch to listings page
            showPage(2);
        });
    </script>
</body>
</html>