<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowCare. | Perawatan Wajah & Skincare</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #f2a2b8;
            --deep-burgundy: #4a1525;
            --soft-bg: #fff5f7;
            --accent-pink: #d9658b;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: #fdfbfb; color: #333; }

        .top-bar { background: var(--deep-burgundy); color: white; text-align: center; padding: 8px; font-size: 12px; letter-spacing: 1px; text-transform: uppercase; }

        .navbar { display: flex; justify-content: space-between; align-items: center; padding: 18px 5%; background: white; border-bottom: 1px solid #f0e6e8; position: sticky; top: 0; z-index: 100; }
        .logo { font-size: 32px; font-weight: 800; color: var(--accent-pink); text-decoration: none; letter-spacing: -1px; }
        .nav-menu { display: flex; gap: 20px; list-style: none; }
        .nav-menu a { text-decoration: none; color: #444; font-weight: 600; font-size: 14px; transition: 0.3s; cursor: pointer; padding: 6px 12px; border-radius: 15px; }
        .nav-menu a.active, .nav-menu a:hover { background: var(--soft-bg); color: var(--accent-pink); }
        .user-actions { display: flex; align-items: center; gap: 15px; }
        .btn-auth { text-decoration: none; padding: 8px 16px; border-radius: 20px; font-size: 13px; font-weight: 600; border: 1px solid var(--deep-burgundy); color: var(--deep-burgundy); transition: 0.3s; }
        .btn-auth:hover { background: var(--deep-burgundy); color: white; }
        .cart-icon { position: relative; cursor: pointer; font-size: 20px; background: #fff0f3; padding: 8px 12px; border-radius: 50%; }

        .hero { background: linear-gradient(135deg, #f7abbf 0%, #e87b9b 100%); min-height: 380px; display: flex; align-items: center; padding: 0 8%; position: relative; overflow: hidden; color: white; }
        .hero-text { max-width: 500px; z-index: 2; }
        .hero-text h1 { font-size: 40px; font-weight: 800; line-height: 1.1; margin-bottom: 15px; color: var(--deep-burgundy); }
        .hero-text p { font-size: 15px; margin-bottom: 25px; color: #5a1d2e; }
        .btn-shop { display: inline-block; background: var(--deep-burgundy); color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 700; font-size: 14px; transition: 0.3s; }
        .btn-shop:hover { background: #2f0b17; transform: translateY(-2px); }
        .hero-brand-title { position: absolute; bottom: -30px; right: 5%; font-size: 140px; font-weight: 900; color: rgba(255, 255, 255, 0.3); pointer-events: none; }

        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        .section-title { text-align: center; font-size: 28px; color: var(--deep-burgundy); margin-bottom: 8px; font-weight: 700; }
        .section-subtitle { text-align: center; color: #777; font-size: 14px; margin-bottom: 30px; }

        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); gap: 25px; }
        .product-card { background: white; border-radius: 18px; overflow: hidden; border: 1px solid #f0e6e8; transition: 0.3s; text-align: center; padding-bottom: 20px; display: flex; flex-direction: column; justify-content: space-between; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.06); }
        .product-card img { width: 100%; height: 210px; object-fit: cover; }
        .product-card h4 { font-size: 16px; margin: 12px 0 4px; color: #222; }
        .product-card .brand { font-size: 11px; color: #888; text-transform: uppercase; letter-spacing: 1px; }
        .product-card .price { font-size: 16px; font-weight: 700; color: var(--accent-pink); margin: 6px 0 12px; }
        
        .action-btns { display: flex; justify-content: center; gap: 8px; padding: 0 15px; }
        .btn-buy { background: var(--deep-burgundy); color: white; border: none; padding: 8px 14px; border-radius: 20px; font-weight: 600; cursor: pointer; font-size: 12px; transition: 0.3s; flex: 1; }
        .btn-buy:hover { background: var(--accent-pink); }
        .btn-cart { background: #fff0f3; color: var(--deep-burgundy); border: 1px solid var(--primary-pink); padding: 8px 12px; border-radius: 20px; font-weight: 600; cursor: pointer; font-size: 12px; transition: 0.3s; }
        .btn-cart:hover { background: var(--primary-pink); color: white; }

        .consultation-section { background: white; padding: 40px; border-radius: 20px; border: 1px solid #f0e6e8; margin-top: 60px; box-shadow: 0 5px 25px rgba(0,0,0,0.02); }

        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); justify-content: center; align-items: center; z-index: 1000; }
        .modal-content { background: white; padding: 30px; border-radius: 20px; width: 90%; max-width: 500px; max-height: 90vh; overflow-y: auto; }
        .payment-methods { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin: 15px 0; }
        .payment-btn { border: 1px solid #ddd; padding: 10px; border-radius: 10px; text-align: center; cursor: pointer; font-weight: 600; font-size: 12px; transition: 0.2s; }
        .payment-btn input { display: none; }
        .payment-btn:has(input:checked) { border-color: var(--accent-pink); background: #fff0f3; color: var(--accent-pink); }
        
        .payment-detail-box { background: #fff0f3; border: 1px dashed var(--accent-pink); border-radius: 12px; padding: 15px; margin: 15px 0; text-align: center; }
        .qris-img { width: 180px; height: 180px; object-fit: contain; margin: 10px auto; display: block; border-radius: 8px; background: white; padding: 5px; border: 1px solid #ddd; }
        .account-number { font-size: 18px; font-weight: 800; color: var(--deep-burgundy); letter-spacing: 1px; margin: 5px 0; }

        .cart-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; font-size: 13px; }
        .form-group { margin-bottom: 12px; text-align: left; }
        .form-group label { display: block; font-size: 12px; font-weight: 600; margin-bottom: 4px; color: var(--deep-burgundy); }
        .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 13px; }

        .receipt-card { border: 2px dashed var(--accent-pink); background: #fffdfd; padding: 25px; border-radius: 15px; font-size: 13px; text-align: left; }
        .receipt-header { text-align: center; border-bottom: 1px solid #ddd; padding-bottom: 12px; margin-bottom: 15px; }
        .receipt-row { display: flex; justify-content: space-between; margin-bottom: 8px; }
        .receipt-total { border-top: 1px solid #ddd; padding-top: 10px; margin-top: 10px; font-weight: bold; font-size: 15px; color: var(--deep-burgundy); }

        .cam-btn-group { display: flex; flex-direction: column; gap: 10px; margin-bottom: 15px; }

        @media print {
            body * { visibility: hidden; }
            #receiptPrintArea, #receiptPrintArea * { visibility: visible; }
            #receiptPrintArea { position: absolute; left: 0; top: 0; width: 100%; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body>

    <div class="top-bar">OWN THE GLOW: GRATIS ONGKIR SELURUH INDONESIA DENGAN MIN. BELANJA RP 150K</div>

    <nav class="navbar">
        <a href="/" class="logo">GlowCare.</a>
        
        <ul class="nav-menu">
            <li><a onclick="filterCategory('all', this)" class="active">Semua Produk</a></li>
            <li><a onclick="filterCategory('cleanser', this)">Pembersih Wajah</a></li>
            <li><a onclick="filterCategory('moisturizer', this)">Pelembab</a></li>
            <li><a onclick="filterCategory('serum', this)">Serum</a></li>
            <li><a href="#konsultasi">Konsultasi & Scan AI</a></li>
        </ul>

        <div class="user-actions">
            <?php if (auth()->check()): ?>
                <?php if (auth()->user()->role === 'admin'): ?>
                    <a href="<?php echo route('admin.dashboard'); ?>" class="btn-auth" style="background: var(--deep-burgundy); color: white;">👑 Panel Admin</a>
                <?php else: ?>
                    <span style="font-size: 13px; color: var(--deep-burgundy);">Halo, <strong><?php echo auth()->user()->name; ?></strong></span>
                <?php endif; ?>
                <form action="<?php echo route('logout'); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-auth" style="background: transparent; cursor: pointer;">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?php echo route('register'); ?>" class="btn-auth">Daftar Akun Baru</a>
                <a href="<?php echo route('login'); ?>" class="btn-auth" style="background: var(--deep-burgundy); color: white;">Login</a>
            <?php endif; ?>

            <div class="cart-icon" onclick="openCartModal()" title="Lihat Keranjang">
                🛒 <span id="cartCount" style="background: var(--accent-pink); color: white; border-radius: 50%; padding: 2px 7px; font-size: 11px; font-weight: bold;">0</span>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h1>Perawatan Wajah & Skincare Terbaik.</h1>
            <p>Solusi lengkap perawatan kulit wajah alami untuk hasil sehat, bersih, dan glowing bercahaya setiap hari.</p>
            <a href="#katalog" class="btn-shop">Belanja Sekarang</a>
        </div>
        <div class="hero-brand-title">GlowCare.</div>
    </section>

    <div class="container">
        <?php if (session('success')): ?>
            <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                <?php echo session('success'); ?>
            </div>
        <?php endif; ?>

        <section id="katalog">
            <h2 class="section-title">Koleksi Perawatan Wajah</h2>
            <p class="section-subtitle">Temukan produk skincare pilihan yang dirancang khusus untuk kebutuhan kulitmu</p>

            <div class="grid" id="productGrid">
                <?php if (isset($products) && count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <?php 
                            $nameLower = strtolower($product->name);
                            $categoryClass = 'other';

                            $cleanserKeywords = ['wash', 'cleanser', 'pembersih', 'face'];
                            $moisturizerKeywords = ['moisturizer', 'pelembab', 'cica', 'cream'];
                            $serumKeywords = ['serum', 'bright'];

                            foreach ($cleanserKeywords as $kw) {
                                if (str_contains($nameLower, $kw)) { $categoryClass = 'cleanser'; break; }
                            }
                            if ($categoryClass === 'other') {
                                foreach ($moisturizerKeywords as $kw) {
                                    if (str_contains($nameLower, $kw)) { $categoryClass = 'moisturizer'; break; }
                                }
                            }
                            if ($categoryClass === 'other') {
                                foreach ($serumKeywords as $kw) {
                                    if (str_contains($nameLower, $kw)) { $categoryClass = 'serum'; break; }
                                }
                            }
                        ?>
                        <div class="product-card item-card" data-category="<?php echo $categoryClass; ?>">
                            <div>
                                <img src="<?php echo asset('storage/' . $product->image); ?>" alt="<?php echo $product->name; ?>">
                                <div class="brand"><?php echo $product->brand ?? 'GLOWCARE SKIN'; ?></div>
                                <h4><?php echo $product->name; ?></h4>
                                <div class="price">Rp <?php echo number_format($product->price, 0, ',', '.'); ?></div>
                            </div>
                            
                            <div class="action-btns">
                                <?php if (auth()->check() && auth()->user()->role !== 'admin'): ?>
                                    <button class="btn-buy" onclick="openCheckoutModal('<?php echo $product->name; ?>', '<?php echo$product->price; ?>')">🛍️ Beli</button>
                                    <button class="btn-cart" onclick="addToCart('<?php echo $product->name; ?>', '<?php echo$product->price; ?>')">+ 🛒</button>
                                <?php elseif (auth()->check() && auth()->user()->role === 'admin'): ?>
                                    <span style="font-size: 11px; color: #888; padding: 6px;">Mode Admin</span>
                                <?php else: ?>
                                    <a href="<?php echo route('register'); ?>" class="btn-buy" style="text-decoration: none;">Daftar untuk Membeli</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; grid-column: 1/-1; color: #999;">Belum ada produk yang ditampilkan.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Bagian Konsultasi & Scan Wajah AI -->
        <section id="konsultasi" class="consultation-section">
            <h2 class="section-title">AI Skin Analysis & Konsultasi</h2>
            <p class="section-subtitle">Fitur khusus pelanggan untuk memindai kondisi wajah dan berkonsultasi langsung dengan tim GlowCare.</p>

            <?php if (auth()->check() && auth()->user()->role !== 'admin'): ?>
                <form onsubmit="sendConsultationToWA(event)">
                    <div class="form-group">
                        <label>Pilih Produk yang Ingin Ditanyakan / Dikonsultasikan:</label>
                        <select id="consultProductSelect" required>
                            <?php if (isset($products) && count($products) > 0): ?>
                                <?php foreach ($products as$product): ?>
                                    <option value="<?php echo $product->name; ?>"><?php echo $product->name; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="Umum">Konsultasi Umum Skincare</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Ambil Foto Wajah (Scan AI Kamera):</label>
                        <div class="cam-btn-group">
                            <!-- Tombol Native Kamera HP (iOS/Android 100% Work lewat HTTP/Lokal) -->
                            <label for="nativeCamInput" class="btn-shop" style="text-align: center; background: var(--accent-pink); cursor: pointer;">
                                📸 Buka Kamera HP Langsung (Rekomendasi HP)
                            </label>
                            <input type="file" id="nativeCamInput" accept="image/*" capture="user" style="display: none;" onchange="handleNativePhoto(this)">

                            <!-- Tombol Webcam Komputer/Laptop -->
                            <button type="button" class="btn-shop" onclick="startCamera()" style="background: var(--deep-burgundy); border: none; cursor: pointer;">
                                💻 Buka Kamera Web Live (Laptop/PC)
                            </button>
                        </div>
                    </div>

                    <div id="cameraArea" style="display: none; text-align: center; margin-bottom: 20px;">
                        <video id="webcam" autoplay playsinline style="width: 100%; max-height: 280px; border-radius: 12px; background: #000;"></video>
                        <button type="button" onclick="takeSnapshotAndAnalyze()" style="margin-top: 10px; background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 20px; font-weight: bold; cursor: pointer; width: 100%;">
                            📸 Ambil Foto & Analisis Kulit Sekarang
                        </button>
                        <canvas id="canvas" style="display: none;"></canvas>
                    </div>

                    <div id="previewArea" style="display: none; text-align: center; margin-bottom: 20px;">
                        <img id="photoPreview" style="max-width: 100%; max-height: 250px; border-radius: 12px; border: 2px solid var(--accent-pink);">
                    </div>

                    <div id="analysisResult" style="display: none; background: #fff0f3; border: 1px solid var(--primary-pink); padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                        <h4 style="color: var(--deep-burgundy); margin-bottom: 5px;">✨ Hasil Deteksi Wajah AI:</h4>
                        <p style="font-size: 14px;">Kondisi Kulit: <strong id="detectedSkinText" style="color: var(--accent-pink);">-</strong></p>
                        <p style="font-size: 13px; color: #555; margin-top: 5px;" id="recommendationText">-</p>
                    </div>

                    <div class="form-group">
                        <label>Tipe Kulit:</label>
                        <select id="skinTypeSelect" required>
                            <option value="Berminyak">Berminyak</option>
                            <option value="Beruntusan / Sensitif">Beruntusan / Sensitif</option>
                            <option value="Kering">Kering</option>
                            <option value="Normal / Kombinasi">Normal / Kombinasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keluhan Utama / Catatan Kulit:</label>
                        <textarea id="complaintInput" rows="3" required placeholder="Jelaskan kondisi kulitmu saat ini..."></textarea>
                    </div>

                    <button type="submit" class="btn-shop" style="width: 100%; border: none; cursor: pointer;">💬 Kirim Konsultasi ke WA Admin</button>
                </form>
            <?php elseif (auth()->check() && auth()->user()->role === 'admin'): ?>
                <div style="text-align: center; padding: 25px; background: #fff0f3; border-radius: 12px; border: 1px dashed var(--accent-pink);">
                    <h3 style="color: var(--deep-burgundy); margin-bottom: 8px;">👑 Panel Akses Admin</h3>
                    <p style="font-size: 13px; color: #666; margin-bottom: 15px;">Fitur Konsultasi & AI Scan hanya diperuntukkan bagi Pengguna/Pelanggan. Silakan gunakan Panel Admin untuk mengelola produk & pesanan.</p>
                    <a href="<?php echo route('admin.dashboard'); ?>" class="btn-shop">Buka Panel Admin</a>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 25px; background: #fff0f3; border-radius: 12px; border: 1px dashed var(--accent-pink);">
                    <h3 style="color: var(--deep-burgundy); margin-bottom: 8px;">Daftar Akun Pengguna Terlebih Dahulu</h3>
                    <p style="font-size: 13px; color: #666; margin-bottom: 15px;">Kamu harus mendaftar dan memiliki akun pelanggan untuk dapat mengakses fitur Analisis Kamera & Konsultasi Wajah.</p>
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <a href="<?php echo route('register'); ?>" class="btn-shop">Daftar Akun Baru</a>
                        <a href="<?php echo route('login'); ?>" class="btn-auth" style="padding: 10px 20px;">Sudah Punya Akun? Login</a>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <!-- Modal Keranjang Belanja -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <h3 style="color: var(--deep-burgundy); margin-bottom: 15px;">🛒 Keranjang Belanja Kamu</h3>
            <div id="cartItemsList">
                <p style="color: #888; text-align: center;">Keranjang belanja masih kosong.</p>
            </div>
            <div style="margin-top: 15px; text-align: right; font-weight: bold; font-size: 15px; color: var(--accent-pink);" id="cartTotalText">
                Total: Rp 0
            </div>
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="button" class="btn-shop" style="flex: 1; border: none; cursor: pointer;" onclick="checkoutFromCart()">Checkout Keranjang</button>
                <button type="button" onclick="closeCartModal()" style="background: #ccc; color: #333; border: none; padding: 10px 15px; border-radius: 20px; cursor: pointer;">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Checkout Pembayaran -->
    <div id="checkoutModal" class="modal">
        <div class="modal-content">
            <h3 style="color: var(--deep-burgundy); margin-bottom: 10px;">Checkout Pembayaran</h3>
            <p style="font-size: 13px; color: #666; margin-bottom: 15px;">Pilih metode pembayaran yang kamu inginkan.</p>

            <form id="checkoutForm" onsubmit="generateReceipt(event)">
                <div class="form-group">
                    <label>Nama Pemesan:</label>
                    <input type="text" id="payCustomerName" value="<?php echo auth()->check() ? auth()->user()->name : ''; ?>" required placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label>Produk / Pesanan:</label>
                    <input type="text" id="payProductName" readonly style="background: #f8f9fa;">
                </div>
                <div class="form-group">
                    <label>Total Pembayaran:</label>
                    <input type="text" id="payProductPrice" readonly style="background: #f8f9fa; font-weight: bold; color: var(--accent-pink);">
                </div>

                <div class="form-group">
                    <label>Pilih Metode Pembayaran:</label>
                    <div class="payment-methods">
                        <label class="payment-btn">
                            <input type="radio" name="payment_method" value="QRIS" checked onclick="switchPaymentMethod('QRIS')">
                            📱 QRIS All Payment
                        </label>
                        <label class="payment-btn">
                            <input type="radio" name="payment_method" value="DANA" onclick="switchPaymentMethod('DANA')">
                            💙 DANA
                        </label>
                        <label class="payment-btn">
                            <input type="radio" name="payment_method" value="ShopeePay" onclick="switchPaymentMethod('ShopeePay')">
                            🧡 ShopeePay
                        </label>
                        <label class="payment-btn">
                            <input type="radio" name="payment_method" value="Transfer Bank" onclick="switchPaymentMethod('Bank')">
                            🏦 Transfer Bank (BCA)
                        </label>
                    </div>
                </div>

                <div class="payment-detail-box" id="paymentInstructionBox">
                    <div id="methodQris">
                        <p style="font-size: 13px; font-weight: 600; color: var(--deep-burgundy);">Scan Barcode QRIS di bawah ini:</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=GlowCareSkinCarePayment" alt="Barcode QRIS Pembayaran" class="qris-img">
                        <p style="font-size: 11px; color: #666;">Dapat di-scan dengan DANA, OVO, GoPay, ShopeePay, BCA, dll.</p>
                    </div>

                    <div id="methodDana" style="display: none;">
                        <p style="font-size: 12px; color: #666;">Transfer DANA ke Nomor berikut:</p>
                        <div class="account-number">0896-7435-9829</div>
                        <p style="font-size: 12px; font-weight: 600;">a.n. GlowCare Official</p>
                    </div>

                    <div id="methodShopee" style="display: none;">
                        <p style="font-size: 12px; color: #666;">Transfer ShopeePay ke Nomor berikut:</p>
                        <div class="account-number">0896-7435-9829</div>
                        <p style="font-size: 12px; font-weight: 600;">a.n. GlowCare Official</p>
                    </div>

                    <div id="methodBank" style="display: none;">
                        <p style="font-size: 12px; color: #666;">Transfer ke Rekening Bank BCA:</p>
                        <div class="account-number">8210-9876-5432</div>
                        <p style="font-size: 12px; font-weight: 600;">a.n. PT GlowCare Indonesia</p>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Pengiriman Lengkap:</label>
                    <textarea id="payAddress" rows="2" required placeholder="Tuliskan alamat pengiriman kamu..."></textarea>
                </div>

                <div class="form-group">
                    <label>Unggah Struk / Bukti Transfer Pembayaran:</label>
                    <input type="file" id="payReceipt" accept="image/*" required>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn-shop" style="flex: 1; border: none; cursor: pointer;">Selesaikan & Buat Struk</button>
                    <button type="button" onclick="closeCheckoutModal()" style="background: #ccc; color: #333; border: none; padding: 10px 15px; border-radius: 20px; cursor: pointer;">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tampilan Struk Pembayaran -->
    <div id="receiptModal" class="modal">
        <div class="modal-content">
            <div id="receiptPrintArea">
                <div class="receipt-card">
                    <div class="receipt-header">
                        <h2 style="color: var(--accent-pink);">GlowCare.</h2>
                        <p style="font-size: 11px; color: #777;">Bukti Pembayaran / Struk Transaksi Resmi</p>
                    </div>

                    <div class="receipt-row">
                        <span style="color: #666;">No. Transaksi:</span>
                        <strong id="rInvoiceNo">-</strong>
                    </div>
                    <div class="receipt-row">
                        <span style="color: #666;">Tanggal:</span>
                        <span id="rDate">-</span>
                    </div>
                    <div class="receipt-row">
                        <span style="color: #666;">Nama Pemesan:</span>
                        <strong id="rCustomerName">-</strong>
                    </div>
                    <div class="receipt-row">
                        <span style="color: #666;">Metode Pembayaran:</span>
                        <span id="rPaymentMethod">-</span>
                    </div>
                    <div class="receipt-row">
                        <span style="color: #666;">Status:</span>
                        <span style="color: #28a745; font-weight: bold;">Lunas (Bukti Terlampir)</span>
                    </div>

                    <hr style="border: 0; border-top: 1px dashed #ddd; margin: 12px 0;">

                    <div style="margin-bottom: 8px; font-weight: 600; color: var(--deep-burgundy);">Detail Produk:</div>
                    <div id="rProductDetails" style="font-size: 12px; color: #444; line-height: 1.5;"></div>

                    <hr style="border: 0; border-top: 1px dashed #ddd; margin: 12px 0;">

                    <div class="receipt-row">
                        <span style="color: #666;">Alamat Pengiriman:</span>
                    </div>
                    <p style="font-size: 11px; color: #555; background: #f8f9fa; padding: 8px; border-radius: 6px; margin-bottom: 10px;" id="rAddress">-</p>

                    <div class="receipt-row receipt-total">
                        <span>Total Pembayaran</span>
                        <span id="rTotalAmount" style="color: var(--accent-pink);">Rp 0</span>
                    </div>

                    <p style="text-align: center; font-size: 10px; color: #999; margin-top: 15px;">Terima kasih telah berbelanja di GlowCare. Simpan struk ini sebagai bukti pembayaran sah.</p>
                </div>
            </div>

            <div class="no-print" style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="button" class="btn-shop" style="flex: 1; border: none; cursor: pointer;" onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
                <button type="button" onclick="closeReceiptModal()" style="background: #ccc; color: #333; border: none; padding: 10px 15px; border-radius: 20px; cursor: pointer;">Tutup</button>
            </div>
        </div>
    </div>

<script>
    let cart = [];

    function filterCategory(category, element) {
        document.querySelectorAll('.nav-menu a').forEach(el => el.classList.remove('active'));
        if(element) element.classList.add('active');

        let cards = document.querySelectorAll('.item-card');
        cards.forEach(card => {
            let cardCategory = card.getAttribute('data-category');
            if (category === 'all' || cardCategory === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function addToCart(name, price) {
        let numericPrice = parseInt(price);
        let existing = cart.find(item => item.name === name);
        if (existing) {
            existing.qty += 1;
        } else {
            cart.push({ name: name, price: numericPrice, qty: 1 });
        }
        updateCartBadge();
        alert(`'${name}' berhasil ditambahkan ke keranjang belanja!`);
    }

    function updateCartBadge() {
        let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
        document.getElementById('cartCount').innerText = totalCount;
    }

    function openCartModal() {
        let listContainer = document.getElementById('cartItemsList');
        if (cart.length === 0) {
            listContainer.innerHTML = '<p style="color: #888; text-align: center; padding: 20px 0;">Keranjang belanja masih kosong.</p>';
            document.getElementById('cartTotalText').innerText = 'Total: Rp 0';
        } else {
            let html = '';
            let total = 0;
            cart.forEach((item) => {
                let subtotal = item.price * item.qty;
                total += subtotal;
                html += `
                    <div class="cart-item">
                        <div>
                            <strong>${item.name}</strong><br>
                            <small>${item.qty} x Rp ${item.price.toLocaleString('id-ID')}</small>
                        </div>
                        <div style="font-weight: bold; color: var(--accent-pink);">
                            Rp ${subtotal.toLocaleString('id-ID')}
                        </div>
                    </div>
                `;
            });
            listContainer.innerHTML = html;
            document.getElementById('cartTotalText').innerText = 'Total: Rp ' + total.toLocaleString('id-ID');
        }
        document.getElementById('cartModal').style.display = 'flex';
    }

    function closeCartModal() {
        document.getElementById('cartModal').style.display = 'none';
    }

    function checkoutFromCart() {
        if (cart.length === 0) {
            alert('Keranjang kamu masih kosong!');
            return;
        }
        let total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        let names = cart.map(item => `${item.name} (${item.qty}x)`).join(', ');
        
        closeCartModal();
        openCheckoutModal(names, total);
    }

    function switchPaymentMethod(method) {
        document.getElementById('methodQris').style.display = 'none';
        document.getElementById('methodDana').style.display = 'none';
        document.getElementById('methodShopee').style.display = 'none';
        document.getElementById('methodBank').style.display = 'none';

        if (method === 'QRIS') {
            document.getElementById('methodQris').style.display = 'block';
        } else if (method === 'DANA') {
            document.getElementById('methodDana').style.display = 'block';
        } else if (method === 'ShopeePay') {
            document.getElementById('methodShopee').style.display = 'block';
        } else if (method === 'Bank') {
            document.getElementById('methodBank').style.display = 'block';
        }
    }

    // Kamera & AI Analisis
    let video = document.getElementById('webcam');
    let canvas = document.getElementById('canvas');
    let stream = null;

    function startCamera() {
        document.getElementById('cameraArea').style.display = 'block';
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(s => { stream = s; video.srcObject = s; })
            .catch(err => {
                alert('Sistem keamanan browser memblokir kamera live. Gunakan tombol "Buka Kamera HP Langsung" di atas.');
            });
    }

    function stopCamera() {
        if (stream) stream.getTracks().forEach(t => t.stop());
        document.getElementById('cameraArea').style.display = 'none';
    }

    // Pengolahan Kamera Native HP (Android & iPhone)
    function handleNativePhoto(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = new Image();
                img.onload = function() {
                    let context = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    context.drawImage(img, 0, 0);

                    document.getElementById('photoPreview').src = e.target.result;
                    document.getElementById('previewArea').style.display = 'block';

                    analyzeSkin();
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function takeSnapshotAndAnalyze() {
        let context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        document.getElementById('photoPreview').src = canvas.toDataURL('image/jpeg');
        document.getElementById('previewArea').style.display = 'block';

        analyzeSkin();
        stopCamera();
    }

    function analyzeSkin() {
        let context = canvas.getContext('2d');
        let imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        let pixels = imageData.data;
        let totalBrightness = 0, rednessCount = 0, sampleCount = 0;

        for (let i = 0; i < pixels.length; i += 16) {
            let r = pixels[i], g = pixels[i+1], b = pixels[i+2];
            totalBrightness += (r + g + b) / 3;
            if (r > g + 25 && r > b + 25) rednessCount++;
            sampleCount++;
        }

        let avgBrightness = totalBrightness / sampleCount;
        let redRatio = rednessCount / sampleCount;
        let condition = "Normal / Kombinasi", skinType = "Normal / Kombinasi";

        if (redRatio > 0.07) {
            condition = "Beruntusan & Kemerahan"; skinType = "Beruntusan / Sensitif";
        } else if (avgBrightness > 135) {
            condition = "Berminyak & Mengkilap"; skinType = "Berminyak";
        } else if (avgBrightness < 85) {
            condition = "Kering & Kusam"; skinType = "Kering";
        }

        document.getElementById('analysisResult').style.display = 'block';
        document.getElementById('detectedSkinText').innerText = condition;
        document.getElementById('skinTypeSelect').value = skinType;
        document.getElementById('recommendationText').innerText = `💡 Tipe kulit terdeteksi '${condition}'.`;
        document.getElementById('complaintInput').value = `[Hasil Scan AI Camera]: Kondisi terdeteksi '${condition}'. Mohon saran pemakaian.`;
    }

    function openCheckoutModal(name, price) {
        document.getElementById('payProductName').value = name;
        document.getElementById('payProductPrice').value = typeof price === 'number' ? 'Rp ' + price.toLocaleString('id-ID') : 'Rp ' + parseInt(price).toLocaleString('id-ID');
        document.getElementById('checkoutModal').style.display = 'flex';
    }

    function closeCheckoutModal() {
        document.getElementById('checkoutModal').style.display = 'none';
    }

    function generateReceipt(e) {
        e.preventDefault();
        
        let customerName = document.getElementById('payCustomerName').value;
        let productName = document.getElementById('payProductName').value;
        let price = document.getElementById('payProductPrice').value;
        let method = document.querySelector('input[name="payment_method"]:checked').value;
        let address = document.getElementById('payAddress').value;

        let invoiceNo = 'GC-' + Math.floor(100000 + Math.random() * 900000);
        let currentDate = new Date().toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });

        document.getElementById('rInvoiceNo').innerText = invoiceNo;
        document.getElementById('rDate').innerText = currentDate;
        document.getElementById('rCustomerName').innerText = customerName;
        document.getElementById('rPaymentMethod').innerText = method;
        document.getElementById('rProductDetails').innerText = productName;
        document.getElementById('rAddress').innerText = address;
        document.getElementById('rTotalAmount').innerText = price;

        closeCheckoutModal();
        document.getElementById('receiptModal').style.display = 'flex';

        cart = [];
        updateCartBadge();
    }

    function closeReceiptModal() {
        document.getElementById('receiptModal').style.display = 'none';
    }

    function sendConsultationToWA(e) {
        e.preventDefault();
        let product = document.getElementById('consultProductSelect').value;
        let skinType = document.getElementById('skinTypeSelect').value;
        let complaint = document.getElementById('complaintInput').value;

        let nomorWa = '6289674359829';
        let pesan = `Halo Admin GlowCare., saya ingin berkonsultasi mengenai kulit:\n\n🧴 *Produk Ditanyakan:* ${product}\n👤 *Tipe Kulit:* ${skinType}\n💬 *Keluhan / Catatan:* ${complaint}\n\nMohon rekomendasi & saran pemakaian. Terima kasih!`;

        window.open(`https://wa.me/${nomorWa}?text=${encodeURIComponent(pesan)}`, '_blank');
    }
</script>
</body>
</html><?php /**PATH C:\Users\User\skincare\resources\views/products/index.blade.php ENDPATH**/ ?>